<?php

class Queue 
{

    protected $stacksOne = [];
    protected $stacksTwo = [];

    public function add($value) 
    {
        array_push($this->stacksOne, $value);
    }
  
    public function remove() {

        $this->shift();

        return array_pop($this->stacksTwo);
    }
  
    public function peek() 
    {

        $this->shift();

        return $this->stacksTwo[count($this->stacksTwo) - 1];
    }

    public function shift ()
    {
        if (count($this->stacksTwo) > 0) {
            return;
        }

        while (count($this->stacksOne) > 0) {
            array_push($this->stacksTwo, array_pop($this->stacksOne));
        }

    }

}

$queue = new Queue();

$queue->add(21);

$queue->add(1);

$queue->add(3);

$queue->add(45);

var_dump($queue->peek());
$queue->add(45);
var_dump($queue->peek());