<?php

namespace app\modules\logger\components;

use app\modules\logger\interfaces\LoggerFactoryInterface;
use app\modules\logger\interfaces\LoggerTypeInterface;

class DatabaseLoggerFactory implements LoggerFactoryInterface
{
    public function createLogger(array $config = []): LoggerTypeInterface
    {
        return new DatabaseLogger();
    }
}