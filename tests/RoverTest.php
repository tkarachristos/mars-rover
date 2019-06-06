<?php

namespace MarsRover;

use PHPUnit\Framework\TestCase;
use MarsRover\Rover;

final class RoverTest extends TestCase {
    public function testGetOrientationAfterLeftTurn(){
        $rover = new Rover(0,0,'S');
        $this->assertSame('W', $rover->getOrientationAfterLeftTurn('S'));
    }
}
