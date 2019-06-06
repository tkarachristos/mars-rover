<?php
namespace MarsRover;

use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase {
    public function testFollowOrders(){
        $rover1 = new Rover(1,2,'N', 5, 5);
        $rover1->followOrders("LMLMLMLMM");
        $this->assertSame(1, $rover1->getX());
        $this->assertSame(3, $rover1->getY());
        $this->assertSame("N", $rover1->getOrientation());

        $rover2 = new Rover(3,3, 'E', 5, 5);
        $rover2->followOrders("MMRMMRMRRM");
        $this->assertSame(5, $rover2->getX());
        $this->assertSame(1, $rover2->getY());
        $this->assertSame("E", $rover2->getOrientation());
    }
}
