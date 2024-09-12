<?php

namespace app\modules\logger\components;

use app\modules\logger\interfaces\LoggerTypeInterface;

class FileLogger implements LoggerTypeInterface
{
    public function __construct(private string $path){}

    public function send(string $message): void
    {
        $path = \Yii::getAlias('@runtime') . '/logs/' . $this->path;

        file_put_contents($path, $message . PHP_EOL, FILE_APPEND);

        echo "<p  style='text-align: center; font-size: 22px'>Log was written to  <b>file</b> ($message)</p>";
    }
}