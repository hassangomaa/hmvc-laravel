<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
    public function test_calculate_a_numbers()
    {
        $calc = calc(n1: 10, n2: 10);
        $this->assertEquals(expected: 20, actual: $calc);
    }
}
