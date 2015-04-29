<?php namespace ThreeAccents\Tools\Mailer;

use Illuminate\Mail\Mailer;

class MailerTool
{
    /**
     * @var Mailer
     */
    protected $mail;

    function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    public function sendTo($email, $subject, $view, $data = [])
    {
        $this->mail->send($view, $data, function($message) use($email, $subject)
        {
            $message->to($email)
                ->subject($subject);
        });
    }

    public function sendLater($email, $subject, $view, $data = [])
    {
        $this->mail->later(15, $view, $data, function($message) use($email, $subject)
        {
            $message->to($email)
                ->subject($subject);
        });
    }
}