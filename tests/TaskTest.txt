<?php

require_once '../application/models/Task.php';

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

 class TaskTest extends PHPUnit_Framework_TestCase
 {
     private $task;

     public function setUp()
     {
        $this->task = new Task();
     }

     // -------------------------------------------------------------
     // Testing setTask()
     // -------------------------------------------------------------
     public function testSetTask()
     {
         $this->assertEquals(true, $this->task->setTask("ABC123"));
     }

     public function testSetTaskSymbols()
     {
         $this->assertEquals(false, $this->task->setTask("ABC$"));
     }

     public function testSetTaskLength64()
     {
         $this->assertEquals(true, $this->task->setTask("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"));
     }

     public function testSetTaskLength65()
     {
         $this->assertEquals(false, $this->task->setTask("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"));
     }

    // -------------------------------------------------------------
    // Testing setStatus()
    // -------------------------------------------------------------
     public function testSetStatus()
     {
         $this->assertEquals(true, $this->task->setStatus("ABC123"));
     }

     public function testSetStatusSymbols()
     {
         $this->assertEquals(false, $this->task->setStatus("ABC$"));
     }

     public function testSetStatusLength64()
     {
         $this->assertEquals(true, $this->task->setStatus("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"));
     }

     public function testSetStatusLength65()
     {
         $this->assertEquals(false, $this->task->setStatus("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"));
     }

     // -------------------------------------------------------------
     // Testing setPriority()
     // -------------------------------------------------------------
     public function testSetPriority()
     {
         $this->assertEquals(true, $this->task->setPriority(3));
     }

     public function testSetPriorityGreaterThan3()
     {
         $this->assertEquals(false, $this->task->setPriority(4));
     }

     public function testSetPriorityNonNumeric()
     {
         $this->assertEquals(false, $this->task->setPriority("A"));
     }

     // -------------------------------------------------------------
     // Testing setSize()
     // -------------------------------------------------------------
     public function testSetSize()
     {
         $this->assertEquals(true, $this->task->setSize(3));
     }

     public function testSetSizeGreaterThan3()
     {
         $this->assertEquals(false, $this->task->setSize(4));
     }

     public function testSetSizeNonNumeric()
     {
         $this->assertEquals(false, $this->task->setSize("A"));
     }

     // -------------------------------------------------------------
     // Testing setGroup()
     // -------------------------------------------------------------
     public function testSetGroup()
     {
         $this->assertEquals(true, $this->task->setGroup(4));
     }

     public function testSetGroupGreaterThan4()
     {
         $this->assertEquals(false, $this->task->setGroup(5));
     }

     public function testSetGroupNonNumeric()
     {
         $this->assertEquals(false, $this->task->setGroup("A"));
     }
 }