<?php

class Comment{
    private string $comm_slots;

    private $created_at;

     // getter et setters de $comm_slots
    public function getComm_slots():string{
        return $this->comm_slots;
    }
    public function setComm_slots(string $comm_slots){
        return $this->comm_slots = $comm_slots;
    }

    // getter et setters de $created_at
    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at){
        return $this->created_at = $created_at;
    }
}