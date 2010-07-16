<?php
class Counter{
    public $count;

    public function __construct($value=0){
        $this->count = $value;
    }

    public function increment(){
        $this->count += 1;
    }

    public function decrement(){
        $this->count -= 1;
    }

    public function __toString(){
        return "$this->count";
    }
}

?>
