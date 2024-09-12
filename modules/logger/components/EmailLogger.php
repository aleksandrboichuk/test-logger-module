<?php

namespace app\modules\logger\components;

use app\modules\logger\interfaces\LoggerTypeInterface;

class EmailLogger implements LoggerTypeInterface
{
    public function __construct(private string $email){}

    public function send(string $message): void
    {
        \Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom(["log@example.com" => "Log Example"])
            ->setSubject("Log")
            ->setTextBody($message)
            ->send();

        echo "<p  style='text-align: center; font-size: 22px'>Log was sent via <b>email</b> ($message)</p>";
    }
}