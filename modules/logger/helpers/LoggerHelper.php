<?php

namespace app\modules\logger\helpers;

use app\modules\logger\components\DatabaseLoggerFactory;
use app\modules\logger\components\EmailLoggerFactory;
use app\modules\logger\components\FileLoggerFactory;
use app\modules\logger\interfaces\LoggerFactoryInterface;

class LoggerHelper
{
    /**
     * Returns Logger Factory by logger type
     *
     * @throws \Exception
     */
    public static function getLoggerFactory(string $type): LoggerFactoryInterface
    {
        return match ($type){
            'email' => new EmailLoggerFactory(),
            'database' => new DatabaseLoggerFactory(),
            'file' => new FileLoggerFactory(),
            default => throw new \Exception("Invalid logger type: $type")
        };
    }
}