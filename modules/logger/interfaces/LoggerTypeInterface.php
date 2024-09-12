<?php

namespace app\modules\logger\interfaces;

interface LoggerTypeInterface
{
    /**
     *	Sends message to current logger.
     *
     *	@param string $message
     *
     *	@return void
     */
    public function send(string $message): void;
}
