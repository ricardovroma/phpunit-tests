<?php


use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * @covers Order
     */
    public function testOrderIsProcessedUsingAMockery()
    {
        $order = new Order(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::mock('PaymentGateway');

        $gateway_mock->shouldReceive('charge')
            ->once()
            ->with(5.97)
            ->andReturn(true);

        $order->process($gateway_mock);
    }

    /**
     * @covers Order
     */
    public function testOrderIsProcessedUsingASpy()
    {
        $order = new Order(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_spy = Mockery::spy('PaymentGateway');

        $order->process($gateway_spy);

        $gateway_spy->shouldHaveReceived('charge')
            ->once()
            ->with(5.97);
    }
}

