<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    /**
     * @covers User
     */
    public function testReturnsFullName()
    {
        $user = new User("admin@admin.com");

        $user->first_name = "Teresa";
        $user->surname = "Green";

        $this->assertEquals('Teresa Green', $user->getFullName());
    }

    /**
     * @covers User
     */
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User("admin@admin.com");

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @covers User
     */
    public function testNotificationIsSent()
    {
        $user = new User("admin@admin.com");

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
                    ->method('sendMessage')
                    ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
                    ->willReturn(true);

        $user->setMailer($mock_mailer);
                    
        $user->email = 'dave@example.com';

        $this->assertTrue($user->notify3("Hello"));
    }

    /**
     * @covers User
     */
    public function testNotifyReturnsTrue()
    {
        $user = new User('dave@example.com');

        $user->setMailerCallable(function() {

//            echo "mocked";

            return true;

        });

        $this->assertTrue($user->notify('Hello!'));
    }
}
