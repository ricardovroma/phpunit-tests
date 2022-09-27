<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    /**
     * @covers Queue
     */
    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    /**
     * @covers Queue
     */
    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');
        
        $this->assertEquals(1, $this->queue->getCount());
    }

    /**
     * @covers Queue
     */
    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');
        $item = $this->queue->pop();
        
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }

    /**
     * @covers Queue
     */
    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }

    /**
     * @covers Queue
     */
    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
            
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    /**
     * @covers Queue
     */
    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
            
        }

        $this->expectException(QueueException::class);

        $this->queue->push("wafer thin mint");
    }
}
