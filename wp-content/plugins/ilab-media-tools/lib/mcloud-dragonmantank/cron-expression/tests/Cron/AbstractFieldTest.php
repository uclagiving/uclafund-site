<?php

declare(strict_types=1);

namespace MediaCloud\Vendor\Cron\Tests;
use MediaCloud\Vendor\Cron\DayOfWeekField;
use MediaCloud\Vendor\Cron\HoursField;
use MediaCloud\Vendor\Cron\MinutesField;
use MediaCloud\Vendor\Cron\MonthField;
use PHPUnit\Framework\TestCase;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class AbstractFieldTest extends TestCase
{
    /**
     * @covers \MediaCloud\Vendor\Cron\AbstractField::isRange
     */
    public function testTestsIfRange(): void
    {
        $f = new DayOfWeekField();
        $this->assertTrue($f->isRange('1-2'));
        $this->assertFalse($f->isRange('2'));
    }

    /**
     * @covers \MediaCloud\Vendor\Cron\AbstractField::isIncrementsOfRanges
     */
    public function testTestsIfIncrementsOfRanges(): void
    {
        $f = new DayOfWeekField();
        $this->assertFalse($f->isIncrementsOfRanges('1-2'));
        $this->assertTrue($f->isIncrementsOfRanges('1/2'));
        $this->assertTrue($f->isIncrementsOfRanges('*/2'));
        $this->assertTrue($f->isIncrementsOfRanges('3-12/2'));
    }

    /**
     * @covers \MediaCloud\Vendor\Cron\AbstractField::isInRange
     */
    public function testTestsIfInRange(): void
    {
        $f = new DayOfWeekField();
        $this->assertTrue($f->isInRange(1, '1-2'));
        $this->assertTrue($f->isInRange(2, '1-2'));
        $this->assertTrue($f->isInRange(5, '4-12'));
        $this->assertFalse($f->isInRange(3, '4-12'));
        $this->assertFalse($f->isInRange(13, '4-12'));
    }

    /**
     * @covers \MediaCloud\Vendor\Cron\AbstractField::isInIncrementsOfRanges
     */
    public function testTestsIfInIncrementsOfRangesOnZeroStartRange(): void
    {
        $f = new MinutesField();
        $this->assertTrue($f->isInIncrementsOfRanges(3, '3-59/2'));
        $this->assertTrue($f->isInIncrementsOfRanges(13, '3-59/2'));
        $this->assertTrue($f->isInIncrementsOfRanges(15, '3-59/2'));
        $this->assertTrue($f->isInIncrementsOfRanges(14, '*/2'));
        $this->assertFalse($f->isInIncrementsOfRanges(2, '3-59/13'));
        $this->assertFalse($f->isInIncrementsOfRanges(14, '*/13'));
        $this->assertFalse($f->isInIncrementsOfRanges(14, '3-59/2'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '2-59'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '2'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '*'));
        $this->assertFalse($f->isInIncrementsOfRanges(0, '*/0'));
        $this->assertFalse($f->isInIncrementsOfRanges(1, '*/0'));

        $this->assertTrue($f->isInIncrementsOfRanges(4, '4/1'));
        $this->assertFalse($f->isInIncrementsOfRanges(14, '4/1'));
        $this->assertFalse($f->isInIncrementsOfRanges(34, '4/1'));
    }

    /**
     * @covers \MediaCloud\Vendor\Cron\AbstractField::isInIncrementsOfRanges
     */
    public function testTestsIfInIncrementsOfRangesOnOneStartRange(): void
    {
        $f = new MonthField();
        $this->assertTrue($f->isInIncrementsOfRanges(3, '3-12/2'));
        $this->assertFalse($f->isInIncrementsOfRanges(13, '3-12/2'));
        $this->assertFalse($f->isInIncrementsOfRanges(15, '3-12/2'));
        $this->assertTrue($f->isInIncrementsOfRanges(3, '*/2'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '*/3'));
        $this->assertTrue($f->isInIncrementsOfRanges(7, '*/3'));
        $this->assertFalse($f->isInIncrementsOfRanges(14, '3-12/2'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '2-12'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '2'));
        $this->assertFalse($f->isInIncrementsOfRanges(3, '*'));
        $this->assertFalse($f->isInIncrementsOfRanges(0, '*/0'));
        $this->assertFalse($f->isInIncrementsOfRanges(1, '*/0'));

        $this->assertTrue($f->isInIncrementsOfRanges(4, '4/1'));
        $this->assertFalse($f->isInIncrementsOfRanges(14, '4/1'));
        $this->assertFalse($f->isInIncrementsOfRanges(34, '4/1'));
    }

    /**
     * @covers \MediaCloud\Vendor\Cron\AbstractField::isSatisfied
     */
    public function testTestsIfSatisfied(): void
    {
        $f = new DayOfWeekField();
        $this->assertTrue($f->isSatisfied(12, '3-13'));
        $this->assertFalse($f->isSatisfied(15, '3-7/2'));
        $this->assertTrue($f->isSatisfied(12, '*'));
        $this->assertTrue($f->isSatisfied(12, '12'));
        $this->assertFalse($f->isSatisfied(12, '3-11'));
        $this->assertFalse($f->isSatisfied(12, '3-7/2'));
        $this->assertFalse($f->isSatisfied(12, '11'));
    }

    /**
     * Allows ranges and lists to coexist in the same expression.
     *
     * @see https://github.com/dragonmantank/cron-expression/issues/5
     */
    public function testAllowRangesAndLists(): void
    {
        $expression = '5-7,11-13';
        $f = new HoursField();
        $this->assertTrue($f->validate($expression));
    }

    /**
     * Makes sure that various types of ranges expand out properly.
     *
     * @see https://github.com/dragonmantank/cron-expression/issues/5
     */
    public function testGetRangeForExpressionExpandsCorrectly(): void
    {
        $f = new HoursField();
        $this->assertSame([5, 6, 7, 11, 12, 13], $f->getRangeForExpression('5-7,11-13', 23));
        $this->assertSame(['5', '6', '7', '11', '12', '13'], $f->getRangeForExpression('5,6,7,11,12,13', 23));
        $this->assertSame([0, 6, 12, 18], $f->getRangeForExpression('*/6', 23));
        $this->assertSame([5, 11], $f->getRangeForExpression('5-13/6', 23));
    }
}