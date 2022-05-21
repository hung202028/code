<?php

namespace Adapter;

class EmailNotification implements Notification
{
    private array $receivers = [];

    public function __construct(array $receivers = [])
    {
        $this->receivers = $receivers;
    }

    public function sendEmail(string $title, string $body)
    {
        foreach ($this->receivers as $recv) {
            echo sprintf(
                'Sending email to "%s", title: "%s", body: "%s"',
                $recv,
                $title,
                $body
            );
            echo "\n";
        }
    }

    public function notify(string $title, string $message)
    {
        $this->sendEmail($title, $message);
    }
}
