<?php

namespace app\modules\logger\components;

use app\modules\logger\interfaces\LoggerFactoryInterface;
use app\modules\logger\interfaces\LoggerTypeInterface;

class FileLoggerFactory implements LoggerFactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function createLogger(array $config = []): LoggerTypeInterface
    {
        return new FileLogger($config['filePath'] ?? throw new \Exception("Log file path is undefined"));
    }
}