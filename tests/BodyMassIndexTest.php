<?php

namespace Kyimyohan\BodyMassIndex\Tests;

use Kyimyohan\BodyMassIndex\BodyMassIndex;
use PHPUnit\Framework\TestCase;

class BodyMassIndexTest extends TestCase
{
    function calculateBMI($height, $weight)
    {
        return BodyMassIndex::calculate($height, $weight)->getResult();
    }

    public function testReturnUnderweight()
    {
        $result = $this->calculateBMI(5.2, 100);
        $this->assertSame("underweight", $result);
    }

    public function testReturnHealthy()
    {
        $result = $this->calculateBMI(5.2, 105);
        $this->assertSame("healthy", $result);

        $result = $this->calculateBMI(5.0, 125);
        $this->assertSame("healthy", $result);
    }

    public function testReturnOverweight()
    {
        $result = $this->calculateBMI(5.2, 140);
        $this->assertSame("overweight", $result);

        $result = $this->calculateBMI(5.2, 160);
        $this->assertSame("overweight", $result);
    }

    public function testReturnObese()
    {
        $result = $this->calculateBMI(5.2, 165);
        $this->assertSame("obese", $result);
    }
}
