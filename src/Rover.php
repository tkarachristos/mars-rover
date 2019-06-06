<?php

namespace MarsRover;

final class Rover implements RoverInterface{
    private $_x;
    private $_y;
    private $_orientation;
    private $_topBorder;
    private $_rightBorder;

    public function __construct(int $x = 0, int $y = 0, string $orientation = 'N', int $xMax = 0, int $yMax = 0){
        $this->_x = $x;
        $this->_y = $y;
        $this->_orientation = $orientation;
        $this->_topBorder = $yMax;
        $this->_rightBorder = $xMax;
    }

    public function getX () {
        return $this->_x;
    }

    public function getY () {
        return $this->_y;
    }

    public function getOrientation () {
        return $this->_orientation;
    }

    public function followOrders (string $orders){
        for ($i=0; $i < strlen($orders); $i++) {           
            switch($orders[$i]) {
                case 'L' : $this->turnLeft(); break;
                case 'R' : $this->turnRight(); break;
                case 'M' : $this->move(); break;
            }
        }
    }
    
    private function turnLeft() {
        $directions = "NWSE";
        $this->_orientation = $this->getNextDirection($directions, $this->_orientation);
    }

    private function turnRight() {
        $directions = "NESW";
        $this->_orientation = $this->getNextDirection($directions, $this->_orientation);
    }

    private function getNextDirection(string $directions, string $orientation){
        $pos = strpos($directions, $orientation);
        if(strlen($directions)-1 === $pos) {
            return $directions[0];
        }
        return $directions[$pos+1];
    }

    private function move() : void {
        switch($this->_orientation) {
            case 'N' :
                if($this->_y < $this->_topBorder) {
                    $this->_y += 1;
                }
                break;
            case 'E' :
                if($this->_x < $this->_rightBorder) {
                    $this->_x += 1;
                }
                break;
            case 'S' :
                if($this->_y > 0) {
                    $this->_y -= 1;
                }
                break;
            case 'W' :
                if($this->_y > 0) {
                    $this->_x -= 1;
                }
                break;
        }
    }
}

