<?php

namespace MarsRover;

final class Rover implements RoverInterface{
    private $_x;
    private $_y;
    private $_orientation;
        
    public function __construct(int $x, int $y, string $orientation){
        $this->_x = $x;
        $this->_y = $y;
        $this->_orientation = $orientation;
    }
    
    public function followOrders (string $orders){
        for ($i=0; $i < strlen($orders); $i++) {           
            switch($orders[$i]) {
                case 'L' : $this->_orientation = turnLeft($this->_orientation); break;
                case 'R' : $this->_orientation = turnRight($this->_orientation); break;
                case 'M' : move($this->_x, $this->_y); break;
            }
        }
    }
    
    public function getOrientationAfterLeftTurn(string $orientation) : string {
        $counterClockwiseDirectionFlow = ['N','W','S','E'];
        $pos = strpos($counterClockwiseDirectionFlow, $orientation);
        if(0 === $pos) {
            return $counterClockwiseDirectionFlow[3];
        }
        return $counterClockwiseDirectionFlow[pos-1];
    }

    public function getOrientationAfterRightTurn(string $orientation) : string {
        $clockwiseDirectionFlow = ['N','E','S','W'];
        $pos = strpos($clockwiseDirectionFlow, $orientation);
        if(3 === $pos) {
            return $clockwiseDirectionFlow[0];
        }
        return $clockwiseDirectionFlow[pos+1];
    }
}
