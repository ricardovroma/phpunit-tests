<?php
//
//use PHPUnit\Framework\TestCase;
//
//class MockeryUserTest extends TestCase
//{
//
//    public function tearDown(): void
//    {
//        Mockery::close();
//    }
//
//    /**
//     * @covers User
//     */
//    public function testNotifyReturnsTrue2()
//    {
//        $user = new User('dave@example.com');
//
//        $mock = Mockery::mock('alias:Mailer');
//
//        $mock->shouldReceive('send')
//            ->once()
//            ->with($user->email, 'Hello!')
//            ->andReturn(true);
//
//        $this->assertTrue($user->notify2('Hello!'));
//    }
//}
