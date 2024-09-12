<?php

namespace app\modules\logger\components;

use app\modules\logger\interfaces\LoggerFactoryInterface;
use app\modules\logger\interfaces\LoggerTypeInterface;

class EmailLoggerFactory implements LoggerFactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function createLogger(array $config = []): LoggerTypeInterface
    {
        return new EmailLogger($config['email'] ?? throw new \Exception("Log email is undefined"));
    }
}