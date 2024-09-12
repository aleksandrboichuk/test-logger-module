<?php

namespace app\modules\logger\components;

use app\modules\logger\interfaces\LoggerTypeInterface;
use app\modules\logger\models\Log;

class DatabaseLogger implements LoggerTypeInterface
{
    /**
     * @throws \Throwable
     */
    public function send(string $message): void
    {
        $model = new Log();

        $model->message = $message;

        $model->save();

        echo "<p  style='text-align: center; font-size: 22px'>Log was written to <b>database</b> ($message)</p>";
    }
}