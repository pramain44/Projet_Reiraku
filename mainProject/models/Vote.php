<?php

class Vote{
    private string $up;

    private $down;

     // getter et setters de $up
    public function getUp():int{
        return $this->up;
    }
    public function setUp(int $up){
        return $this->up = $up;
    }

    // getter et setters de $down
    public function getDown():int{
        return $this->down;
    }
    public function setDown(int $down){
        return $this->down = $down;
    }
}