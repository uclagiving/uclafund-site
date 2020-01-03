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

if (!defined('ABSPATH')) { header('Location: /'); die; }

return [
	"id" => "batch-processing",
	"name" => "Batch Processing",
	"description" => "Manage batch processing settings.",
	"class" => "ILAB\\MediaCloud\\Tools\\BatchProcessing\\BatchProcessingTool",
	"exclude" => true,
	"dependencies" => [],
	"env" => "ILAB_MEDIA_BATCH_PROCESSING_ENABLED",  // this is always enabled btw
	"settings" => [
		"jump-links" => false,
		"options-page" => "media-tools-batch-processing",
		"options-group" => "ilab-media-batch-processing",
		"groups" => [
			"ilab-media-cloud-batch-settings" => [
				"title" => "Batch Processing Settings",
				"dynamic" => true,
				"description" => "The following options control how tasks like importer, thumbnail regeneration and Rekognition work.  You should only change these settings if you are having issues or if the <a href='".admin_url('admin.php?page=media-tools-troubleshooter')."' target='_blank'>system compatibility tool</a> directed you to.",
				"options" => [
					"mcloud-tasks-http-client" => [
						"title" => "HTTP Client",
						"description" => "Controls which HTTP client to use for background processing.",
						"type" => "select",
						"default" => "wordpress",
						"options" => [
							"wordpress" => "WordPress HTTP Client",
							"guzzle" => "Guzzle HTTP Client",
						]
					],
					"mcloud-tasks-verify-ssl" => [
						"title" => "Verify SSL",
						"description" => "Determines if SSL is verified when making the remote connection for the background process.",
						"type" => "select",
						"default" => "no",
						"options" => [
							"default" => "System Default",
							"yes" => "Yes",
							"no" => "No",
						]
					],
					"mcloud-tasks-connect-timeout" => [
						"title" => "Connection Timeout",
						"description" => "The number of seconds to wait for a connection to occur. If you are having issues with the batch importer process, or the system compatibility tool is complaining about <code>cURL error 2x</code>, try setting this to 5 to 10 seconds.",
						"type" => "number",
						"default" => 0.01,
						"increment" => 0.01,
						"min" => 0.01,
						"max" => 300
					],
					"mcloud-tasks-timeout" => [
						"title" => "Timeout",
						"description" => "The number of seconds to wait for a response before the request times out. If you are having issues with the batch importer process, or the system compatibility tool is complaining about <code>cURL error 2x</code>, try setting this to 0.1 or even 10.",
						"type" => "number",
						"default" => 0.01,
						"increment" => 0.01,
						"min" => 0.01,
						"max" => 30
					],
					"mcloud-tasks-skip-dns" => [
						"title" => "Skip DNS",
						"description" => "When this is selected, the background process request will connect to localhost, passing in the host name in an HTTP header.  Some managed hosting/VPS providers have DNS issues, turning this off might help.",
						"type" => "checkbox",
						"default" => false
					],
					"mcloud-tasks-skip-dns-host" => [
						"title" => "Host IP Address",
						"description" => "When skipping DNS, select the IP address to use to resolve to.",
						"type" => "select",
						"default" => "ip",
						"options" => [
							"ip" => getHostByName(getHostName()),
							'local' => '127.0.0.1',
						]
					],
				]
			],
			"ilab-media-cloud-batch-heartbeat-settings" => [
				"title" => "Heartbeat Settings",
				"dynamic" => true,
				"description" => "The following settings control the task manager's heartbeat settings.  When browsing the admin pages, javascript will execute periodically to insure that the task queue is processed and any background tasks are being run.  We use this instead of the WordPress heartbeat API for reliability reasons.  You can completely disable this, however make sure that you have WordPress CRON configured and running reliably otherwise you may have issues processing background tasks.",
				"options" => [
					"mcloud-tasks-heartbeat-enabled" => [
						"title" => "Enable Heartbeat",
						"description" => "When this is enabled, browsing WordPress admin pages will execute an ajax method every few seconds to insure that the background tasks are being processed.  If disabled, please insure that WordPress CRON is running reliably.",
						"type" => "checkbox",
						"default" => true
					],
					"mcloud-tasks-heartbeat-frequency" => [
						"title" => "Heartbeat Frequency",
						"description" => "The number of seconds between heartbeats.",
						"type" => "number",
						"default" => 15,
						"increment" => 1,
						"min" => 2,
						"max" => 60
					],
				]
			],
		]
	]
];