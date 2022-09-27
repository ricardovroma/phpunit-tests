<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{

    /**
     * @covers Mailer
     */
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
             ->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }
}
