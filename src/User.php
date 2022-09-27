<?php

/**
 * User
 *
 * An example user class
 */
class User
{

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer callable
     * @var callable
     */
    protected $mailer_callable;

    /**
     * Constructor
     *
     * @param string $email The user's email
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    /**
     * Set the mailer dependency
     *
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    /**
     * Mailer callable setter
     *
     * @param callable $mailer_callable A Mailer callable
     *
     * @return void
     */
    public function setMailerCallable(callable $mailer_callable) {
        $this->mailer_callable = $mailer_callable;        
    }
    
    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean
     */
    public function notify(string $message)
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean
     */
    public function notify2(string $message)
    {
        return Mailer::send($this->email, $message);
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean
     * @throws Exception
     */
    public function notify3(string $message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}




