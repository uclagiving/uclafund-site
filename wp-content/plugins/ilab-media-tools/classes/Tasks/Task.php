<?php

// Copyright (c) 2016 Interfacelab LLC. All rights reserved.
//
// Released under the GPLv3 license
// http://www.gnu.org/licenses/gpl-3.0.html
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

namespace ILAB\MediaCloud\Tasks;

use ILAB\MediaCloud\Model\Model;
use ILAB\MediaCloud\Utilities\Misc\Carbon\Carbon;
use function ILAB\MediaCloud\Utilities\gen_uuid;
use ILAB\MediaCloud\Utilities\Logging\Logger;
use function ILAB\MediaCloud\Utilities\phpMemoryLimit;
use ILAB\MediaCloud\Utilities\Tracker;


/**
 * Represents a background or other task
 *
 * @property int $state
 * @property-read string $stateName
 * @property string $tuid
 * @property bool $cli
 * @property int $totalItems
 * @property int $currentItem
 * @property float $startTime
 * @property float $endTime
 * @property float $lastRun
 * @property float $duration
 * @property float $timePer
 * @property float $memoryPer
 * @property string $memoryPerString
 * @property float $lastTime
 * @property string $currentItemID
 * @property string $currentTitle
 * @property string $currentFile
 * @property string $currentThumb
 * @property bool $isIcon
 * @property string|null $errorMessage
 * @property array $options
 */
abstract class Task extends Model implements \JsonSerializable {
	//region Constants

	const TASK_ALREADY_RUNNING = 0;
	const TASK_CHUNK_COMPLETE = 1;
	const TASK_TIME_LIMIT = 2;

	const TASK_COMPLETE = 100;
	const TASK_ERROR = 101;
	const TASK_CANCELLED = 102;

	const STATE_WAITING = 0;
	const STATE_RUNNING = 1;
	const STATE_COMPLETE = 100;
	const STATE_ERROR = 101;
	const STATE_CANCELLED = 102;
	const STATE_PREPARING = 200;

	//endregion

	//region Fields

	/**
	 * The time this task started working
	 * @var int
	 */
	protected $taskStartTime = null;

	/**
	 * The current state of the task
	 * @var int
	 */
	protected $state = self::STATE_WAITING;

	/**
	 * The unique id of the schedule that created this task
	 * @var string
	 */
	protected $tuid = null;

	/**
	 * The current state of the task
	 * @var int
	 */
	protected $type = null;

	/**
	 * Determines if this task is running from the CLI or not
	 * @var float
	 */
	protected $cli = false;

	/**
	 * The total number of items to process
	 * @var int
	 */
	protected $totalItems = 0;

	/**
	 * The current index of the item being processed
	 * @var int
	 */
	protected $currentItem = 0;

	/**
	 * The start time in microseconds
	 * @var float
	 */
	protected $startTime = null;

	/**
	 * The end time in microseconds
	 * @var float
	 */
	protected $endTime = null;

	/**
	 * The time the task was last ran
	 * @var float
	 */
	protected $lastRun = null;


	/**
	 * The end time in microseconds
	 * @var float
	 */
	protected $duration = 0;

	/**
	 * The average amount of time used on a each task iteration
	 * @var float
	 */
	protected $timePer = 0;

	/**
	 * The amount of memory used on each task iteration
	 * @var float
	 */
	protected $memoryPer = 0;

	/**
	 * The amount of time the last unit of work lasted
	 * @var float
	 */
	protected $lastTime = 0;

	/**
	 * The current ID of the item being processed
	 * @var string|int
	 */
	protected $currentItemID = null;

	/**
	 * Title of the current item being processed
	 * @var string
	 */
	protected $currentTitle = null;

	/**
	 * File path of the current item being processed
	 * @var string|null
	 */
	protected $currentFile = null;

	/**
	 * Current thumbnail of the current item being processed
	 * @var string|null
	 */
	protected $currentThumb = null;

	/**
	 * Flag to determine if the thumbnail is a default icon image or an actual thumbnail.
	 * @var bool
	 */
	protected $isIcon = false;

	/**
	 * Error message
	 * @var null|string
	 */
	protected $errorMessage = null;

	/**
	 * Any task specific options
	 * @var array
	 */
	protected $options = [];

	/**
	 * Associated task data
	 * @var TaskData[]
	 */
	protected $data = [];

	/**
	 * Total number of data associated with this task
	 * @var int
	 */
	protected $totalDataCount = 0;

	/**
	 * The current data chunk
	 * @var TaskData|null
	 */
	protected $currentData = null;

	/**
	 * Output handler
	 * @var callable|null
	 */
	protected $outputHandler = null;

	/**
	 * Error handler
	 * @var callable|null
	 */
	protected $errorHandler = null;


	/**
	 * Names of stat properties
	 * @var array
	 */
	protected $modelProperties = [
		'state' => '%d',
		'type' => '%s',
		'cli' => '%d',
		'tuid' => '%s',
		'totalItems' => '%d',
		'currentItem' => '%d',
		'startTime' => '%f',
		'endTime' => '%f',
		'lastRun' => '%f',
		'duration' => '%f',
		'timePer' => '%f',
		'memoryPer' => '%d',
		'lastTime' => '%f',
		'currentItemID' => '%s',
		'currentTitle' => '%s',
		'currentFile' => '%s',
		'currentThumb' => '%s',
		'isIcon' => '%d',
		'errorMessage' => '%s',
		'options' => '%s'
	];

	protected $serializedProperties = ['options'];

	//endregion

	//region Static Methods
	/**
	 * The identifier for the task.  Must be overridden.  Default implementation throws exception.
	 * @return string
	 * @throws \Exception
	 */
	public static function identifier() {
		throw new \Exception("Not implemented.");
	}

	/**
	 * The title for the task.  Must be overridden.  Default implementation throws exception.
	 * @return string
	 * @throws \Exception
	 */
	public static function title() {
		throw new \Exception("Not implemented.");
	}

	/**
	 * View containing instructions for the task
	 * @return string|null
	 */
	public static function instructionView() {
		return null;
	}

	/**
	 * The menu title for the task.
	 * @return string
	 * @throws \Exception
	 */
	public static function menuTitle() {
		return static::title();
	}

	/**
	 * The title of the menu item in the bulk actions drop down.  Return null for no bulk action.
	 *
	 * @return string|null
	 */
	public static function bulkActionTitle() {
		return null;
	}

	/**
	 * Determines if this a user task or not.  User tasks are displayed in the admin menu.
	 *
	 * @return false
	 */
	public static function userTask() {
		return false;
	}

	/**
	 * Controls if this task stops on an error.
	 *
	 * @return bool
	 */
	public static function stopOnError() {
		return true;
	}

	/**
	 * Controls if this task can be run from task manager.
	 *
	 * @return bool
	 */
	public static function runFromTaskManager() {
		return true;
	}

	/**
	 * The available options when running a task.
	 * @return array
	 */
	public static function taskOptions() {
		return [];
	}

	/**
	 * The identifier for analytics
	 * @return string
	 */
	public static function analyticsId() {
		return null;
	}
	//endregion

	//region Model Related

	/**
	 * Database table this model uses.
	 * @return string
	 */
	public static function table() {
		global $wpdb;
		return "{$wpdb->base_prefix}mcloud_task";
	}

	//endregion

	//region Init

	public function __construct($data = null) {
		parent::__construct($data);
		$this->type = static::identifier();

		if ($this->id != null) {
			$this->totalDataCount = TaskData::dataCountForTask($this);
			$this->data = TaskData::dataForTask($this, 10);
		}
	}

	//endregion

	//region Task Data
	public function loadNextData() {
		$this->data = TaskData::dataForTask($this, 10);
	}

	public function dumpExisting() {
		$this->data = [];
		gc_collect_cycles();
	}
	//endregion

	//region Saving/Deleting

	public function save() {
		if ($this->tuid == null) {
			$this->tuid = gen_uuid(12);
		}

		return parent::save();
	}

	/**
	 * Clean up the current task
	 *
	 * @return bool|void
	 * @throws \Exception
	 */
	public function delete() {
		if (parent::delete()) {
			TaskData::deleteDataForTask($this);

			return true;
		}

		return false;
	}

	public function cleanUp() {
		TaskData::deleteDataForTask($this);
	}

	//endregion

	//region Execution

	/**
	 * Runs the task.
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function run() {
		if ($this->locked()) {
			Logger::info("Already running ...");
			return self::TASK_ALREADY_RUNNING;
		}


		$this->lock();

		$this->taskStartTime = time();

		if ($this->state == self::STATE_WAITING) {
			$this->startTime = time();
			$this->state = self::STATE_RUNNING;

			$this->save();


			if (!empty(static::analyticsId())) {
				Tracker::trackView(static::title(), static::analyticsId().'/start');
			}

		}

		Logger::info("Grabbing first chunk.");

		/** @var TaskData $chunk */
		$chunk = $this->nextChunk();
		if (empty($chunk)) {
			Logger::info("Chunk is empty!");

			$this->state = self::STATE_COMPLETE;
			$this->updateTiming();
			$this->save();

			$this->unlock();


			if (!empty(static::analyticsId())) {
				Tracker::trackView(static::title(), static::analyticsId().'/finish');
			}


			$this->complete();


			return self::TASK_COMPLETE;
		}

		$firstTime = true;
		$result = self::TASK_TIME_LIMIT;
		$this->willStart();
		while ($this->canWork($firstTime)) {
			$this->lock();

			$firstTime = false;

			if ($this->isCancelled()) {
				$this->info("Task was cancelled.  Exiting.", true);

				Logger::info("Task was cancelled.  Exiting.");
				$this->state = self::STATE_CANCELLED;

				$this->updateTiming();

				$this->save();


				$this->unlock();


				if (!empty(static::analyticsId())) {
					Tracker::trackView(static::title(), static::analyticsId().'/cancel');
				}


				$this->complete();


				return self::TASK_CANCELLED;
			}

			$nextItem = $chunk->nextItem();
			if (empty($nextItem)) {

				$this->updateTiming();

				$this->save();


				$result = self::TASK_CHUNK_COMPLETE;
				break;
			}

			try {
				$time = microtime(true);
				$memory = memory_get_usage(true);
				$this->currentItem++;
				$this->info("[{$this->currentItem} of {$this->totalItems}] Processing ... ", false);

				$result = $this->performTask($nextItem);

				$this->info("{$this->currentFile} ... Done.", true);

				$this->lastTime = microtime(true) - $time;

				if ($this->memoryPer == 0) {
					$this->memoryPer = memory_get_usage(true) - $memory;
				} else {
					$this->memoryPer = ($this->memoryPer + (memory_get_usage(true) - $memory)) / 2;
				}


				$this->lastRun = time();
				$this->updateTiming();

				$this->save();


				if (empty($result) || is_wp_error($result)) {
					$result = self::TASK_ERROR;


					$this->endTime = time();
					$this->updateTiming();

					$this->state = self::STATE_ERROR;

					if (is_wp_error($result)) {
						$this->errorMessage = $result->get_error_message();
					} else {
						$this->errorMessage = "Unknown error.";
					}

					$this->info("{$this->currentFile} ... Error.", true);
					$this->error($this->errorMessage);


					$this->save();



					if (!empty(static::analyticsId())) {
						Tracker::trackView(static::title(), static::analyticsId().'/error');
					}


					$this->complete();

					break;
				}
			} catch (\Exception $ex) {

				$this->state = self::STATE_ERROR;
				$this->endTime = time();
				$this->errorMessage = $ex->getMessage();
				$this->updateTiming();

				$this->save();


				$this->info("{$this->currentFile} ... Error.", true);
				$this->error($this->errorMessage);


				if (!empty(static::analyticsId())) {
					Tracker::trackView(static::title(), static::analyticsId().'/error');
				}


				$this->complete();

				break;
			}
		}

		Logger::info("Unlocking ...");
		$this->didFinish();
		$this->unlock();


		return $result;
	}

	/**
	 * Performs the actual task
	 *
	 * @param $item
	 *
	 * @return bool
	 */
	public abstract function performTask($item);

	/**
	 * Called when a task is about to start processing for a cycle
	 */
	public function willStart() {
	}

	/**
	 * Called when the task has finished processing for a cycle
	 */
	public function didFinish() {
	}

	/**
	 * Called when the task completed
	 */
	public function complete() {
	}

	/**
	 * Determines if the task can do unit of work.
	 *
	 * @return bool
	 */
	public function canWork($firstTime) {

		$maxTime = null;

		if (function_exists('ini_get')) {
			$maxTime = ini_get('max_execution_time');
		}

		if (empty($maxTime)) {
			$maxTime = 60;
		}

		$maxTime = apply_filters('media-cloud/batch/max-time', $maxTime);

		if (time() > $this->taskStartTime + $maxTime) {
			Logger::info("Time is up!");

			return false;
		}

		if (empty($this->cli)) {
			$memory = memory_get_usage(true);
			$limit = phpMemoryLimit('32M') * 0.9;

			if (!$firstTime) {
				$limit -= $this->memoryPer;
			}
			if ($memory >= $limit) {
				Logger::info("Out of memory!");

				return false;
			}
		}



		return true;
	}


	public function nextChunk() {
		if (count($this->data) == 0) {
			Logger::info("Data is empty!");
			return false;
		}


		/** @var TaskData $data */
		$data = $this->data[0];
		if ($data->complete()) {
			Logger::info("Data is complete!");

			$data->delete();
			array_shift($this->data);

			$this->totalDataCount--;
			Logger::info("Data chunks remaining: ".$this->totalDataCount);

			if (count($this->data) === 0) {
				gc_collect_cycles();
				$this->data = TaskData::dataForTask($this, 10);
				Logger::info("Loaded ".count($this->data)." additional chunks.");
			}


			Logger::info("Returning next chunk!");

			return $this->nextChunk();
		}


		return $data;
	}

	//endregion

	//region Properties

	public function __get($name) {
		if ($name == 'stateName') {
			if ($this->state == self::STATE_WAITING) {
				$state = 'waiting';
			} else if ($this->state == self::STATE_RUNNING) {
				$state = 'running';
			} else if ($this->state == self::STATE_COMPLETE) {
				$state = 'complete';
			} else if ($this->state == self::STATE_ERROR) {
				$state = 'error';
			} else if ($this->state == self::STATE_CANCELLED) {
				$state = 'cancelled';
			} else {
				$state = 'unknown';
			}

			return $state;
		} else if ($name == 'memoryPerString') {
			$size = size_format($this->memoryPer, 1);
			return empty($size) ? '0 MB' : $size;
		}


		return parent::__get($name);
	}

	public function updateTiming() {
		if ($this->state >= self::STATE_COMPLETE) {
			if ($this->endTime == null) {
				$this->endTime = time();
				$this->duration = floatval($this->endTime - $this->startTime);
			}
		} else {
			$this->duration = floatval(time() - $this->startTime);
		}

		$this->timePer = (($this->duration > 0) && ($this->currentItem > 0)) ? ($this->duration / floatval($this->currentItem)) : 0;
	}

	/**
	 * @param callable $outputHandler
	 * @param callable $errorHandler
	 */
	public function setHandlers($outputHandler, $errorHandler) {
		$this->outputHandler = $outputHandler;
		$this->errorHandler = $errorHandler;
	}

	//endregion

	//region Handlers

	protected function info($message, $newLine = false) {
		if (!empty($this->outputHandler)) {
			call_user_func($this->outputHandler, $message, $newLine);
		}
	}


	protected function error($message) {
		if (!empty($this->errorHandler)) {
			call_user_func($this->errorHandler, $message);
		}
	}
	//endregion

	//region Locks

	/**
	 * Creates a lock to prevent other instances of the task from running
	 */
	public function lock() {
		if (($this->id == null) || ($this->modelState == self::MODEL_DELETED)) {
			return;
		}


		$maxTime = 60;

		if ($this->lastTime > 0) {
			$maxTime = max(30, $this->lastTime * 2);
		}

		$maxTime = apply_filters('media-cloud/batch/lock-expiration', $maxTime);

		Logger::info("Locking for $maxTime seconds.");

		global $wpdb;
		$wpdb->update(static::table(), ['locked' => time() + $maxTime], ['id' => $this->id], ['%f']);


	}

	/**
	 * Unlocks the task
	 */
	public function unlock() {
		if (($this->id == null) || ($this->modelState == self::MODEL_DELETED)) {
			return;
		}


		global $wpdb;
		$wpdb->update(static::table(), ['locked' => null], ['id' => $this->id]);


	}

	/**
	 * Determins if the task is locked
	 * @return bool
	 * @throws \Exception
	 */
	public function locked() {
		if (($this->id == null) || ($this->modelState == self::MODEL_DELETED)) {
			Logger::info("Missing ID or model is deleted.");
			return true;
		}

		global $wpdb;
		$table = static::table();
		$query = $wpdb->prepare("select locked from {$table} where id = %d", [$this->id]);
		$locked = $wpdb->get_var($query);
		if (empty($locked)) {
			Logger::info("Lock is empty.");
			return false;
		}

		$left = $locked - time();
		Logger::info("Lock ($locked) expires in $left seconds.");

		return (time() < $locked);
	}

	//endregion

	//region Cancelling

	public function cancel() {
		if (empty($this->id) || ($this->modelState == self::MODEL_DELETED)) {
			return;
		}

		global $wpdb;
		$wpdb->update(static::table(), ['shouldCancel' => 1], ['id' => $this->id]);
	}

	public function isCancelled() {
		if (empty($this->id)) {
			return false;
		}

		if ($this->modelState == self::MODEL_DELETED) {
			return true;
		}

		global $wpdb;
		$table = static::table();
		return ($wpdb->get_var("select shouldCancel from {$table} where id = {$this->id}") == 1);
	}

	//endregion

	//region Data

	/**
	 * Prepares a new task with data.
	 *
	 * @param array $options
	 * @param array $selectedItems
	 *
	 * @return bool
	 */
	abstract public function prepare($options = [], $selectedItems = []);

	/**
	 * Performs any clean up after prepare()
	 * @throws \Exception
	 */
	public function wait() {
		$this->state = TASK::STATE_WAITING;
		$this->save();

		if (!empty($this->currentData)) {
			$this->currentData->save();
		}
	}


	/**
	 * @param $item
	 *
	 * @throws \Exception
	 */
	public function addItem($item) {
		if (($this->currentData == null) || $this->currentData->full()) {
			if ($this->id === null) {
				$this->state = Task::STATE_PREPARING;
				$this->save();
			}

			if (!empty($this->currentData)) {
				$this->currentData->save();
			}

			$this->totalDataCount++;

			$memory = memory_get_usage(true);
			Logger::info("Added {$this->totalDataCount} data chunks, memory: $memory.");
			$this->currentData = new TaskData($this, null);
		}

		$this->currentData->addItem($item);
		$this->totalItems++;
	}

	//endregion

	//region JSON

	public function jsonSerialize() {
		if ($this->state >= self::STATE_COMPLETE) {
			$remaining = 0;
		} else {
			$remaining = ($this->timePer * $this->totalItems) - $this->duration;
		}

		if (!empty($this->startTime)) {
			$now = Carbon::instance(\DateTime::createFromFormat('U.u', number_format($this->startTime, 6, '.', '')));
			$startTimeFormat = $now->toIso8601ZuluString();
		} else {
			$startTimeFormat = null;
		}

		if (!empty($this->endTime)) {
			$now = Carbon::instance(\DateTime::createFromFormat('U.u', number_format($this->endTime, 6, '.', '')));
			$endTimeFormat = $now->toIso8601ZuluString();
		} else {
			$endTimeFormat = null;
		}

		$data = [
			'id' => $this->id,
			'title' => $this::title(),
			'identifier' => $this::identifier(),
			'stateName' => $this->stateName,
			'startTimeFormat' => $startTimeFormat,
			'endTimeFormat' => $endTimeFormat,
			'memoryPerString' => $this->memoryPerString,
		];

		foreach($this->modelProperties as $prop => $format) {
			if (!in_array($prop, $this->serializedProperties)) {
				if ($format == '%d') {
					$data[$prop] = intval($this->{$prop});
				} else if ($format == '%f') {
					$data[$prop] = floatval($this->{$prop});
				} else {
					$data[$prop] = $this->{$prop};
				}
			}
		}

		$data['remaining'] = $remaining;

		return $data;
	}

	//endregion

	//region Queries
	/**
	 * Returns a task with the given ID
	 *
	 * @param $id
	 *
	 * @return Task|null
	 * @throws \Exception
	 */
	public static function instance($id) {
		global $wpdb;

		$table = static::table();
		$rows = $wpdb->get_results($wpdb->prepare("select * from {$table} where id = %d", $id));

		foreach($rows as $row) {
			$taskClass = TaskManager::taskClass($row->type);
			if (!empty($taskClass)) {
				return new $taskClass($row);
			}
		}

		return null;
	}

	public static function scheduledTaskIsRunning($tuid) {
		global $wpdb;

		$table = static::table();
		$query = $wpdb->prepare("select id from {$table} where tuid = %s and state < 100 limit 1", $tuid);
		$id = $wpdb->get_var($query);

		return (!empty($id));
	}

	/**
	 * The currently running tasks
	 *
	 * @return Task[]
	 * @throws \Exception
	 */
	public static function runningTasks() {
		global $wpdb;

		$results = [];

		$table = static::table();
		$state = self::STATE_COMPLETE;
		$rows = $wpdb->get_results("select * from {$table} where state < {$state} order by id desc");
		foreach($rows as $row) {
			$taskClass = TaskManager::taskClass($row->type);
			if (!empty($taskClass)) {
				$results[] = new $taskClass($row);
			}
		}

		return $results;
	}

	/**
	 * The currently running task (most recent)
	 *
	 * @param string $identifier
	 * @return Task|null
	 * @throws \Exception
	 */
	public static function currentRunningTask($identifier) {
		global $wpdb;

		$table = static::table();
		$state = self::STATE_COMPLETE;
		$sql = $wpdb->prepare("select * from {$table} where state < %d and type=%s order by id desc limit 1", $state, $identifier);
		$rows = $wpdb->get_results($sql);

		foreach($rows as $row) {
			$taskClass = TaskManager::taskClass($row->type);
			if (!empty($taskClass)) {
				return new $taskClass($row);
			}
		}

		return null;
	}

	/**
	 * The completed tasks
	 *
	 * @return Task[]
	 * @throws \Exception
	 */
	public static function completeTasks() {
		global $wpdb;

		$results = [];

		$table = static::table();
		$state = self::STATE_COMPLETE;
		$rows = $wpdb->get_results("select * from {$table} where state >= {$state} order by endTime desc, id desc limit 20");
		foreach($rows as $row) {
			$taskClass = TaskManager::taskClass($row->type);
			if (!empty($taskClass)) {
				$results[] = new $taskClass($row);
			}
		}

		return $results;
	}

	//endregion

	//region Scheduling

	/**
	 * Schedule this task type to run on a recurring schedule.
	 *
	 * @param array $options
	 * @param array $selection
	 *
	 * @return RecurringTaskScheduler
	 * @throws \Exception
	 */
	public static function scheduleRecurring($options = [], $selection = []) {
		return new RecurringTaskScheduler(static::identifier(), $options, $selection);
	}

	/**
	 * Schedules this task type to run once sometime in the future
	 * @param int|string $time
	 * @param array $options
	 * @param array $selection
	 * @return TaskSchedule
	 * @throws \Exception
	 */
	public static function schedule($time, $options = [], $selection = []) {
		if (is_string($time)) {
			$dt = new \DateTime($time);
			$time = $dt->getTimestamp();
		}

		$schedule = new TaskSchedule();
		$schedule->taskType = static::identifier();
		$schedule->recurring = false;
		$schedule->nextRun = $time;
		$schedule->options = $options;
		$schedule->selection = $selection;
		$schedule->save();

		return $schedule;
	}

	/**
	 * Schedules this task type to run once in a number of minutes in the future
	 * @param int $minutes
	 * @param array $options
	 * @param array $selection
	 * @return TaskSchedule
	 * @throws \Exception
	 */
	public static function scheduleIn($minutes, $options = [], $selection = []) {
		return static::schedule(time() + ($minutes * 60), $options, $selection);
	}
	//endregion
}