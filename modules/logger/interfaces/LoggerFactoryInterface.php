<?php

namespace app\modules\logger\interfaces;

interface LoggerFactoryInterface
{
    /**
     * Creates logger by specific type
     *
     * @param array $config
     *
     * @return LoggerTypeInterface
     */
    public function createLogger(array $config = []): LoggerTypeInterface;
}
