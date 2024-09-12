<?php

namespace app\modules\logger\components;

use app\modules\logger\helpers\LoggerHelper;
use app\modules\logger\interfaces\LoggerInterface;
use app\modules\logger\interfaces\LoggerTypeInterface;

class Logger implements LoggerInterface
{
    protected string $type;

    protected array $config;

    protected LoggerTypeInterface $logger;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setConfig();

        $defaultType = $this->config['defaultType'] ?? throw new \Exception("Default log type is undefined");

        $this->setType($defaultType);
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        $this->logger->send($message);
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->setType($loggerType);

        $this->logger->send($message);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function setType(string $type): void
    {
        $this->type = $type;

        $this->setLogger();
    }

    /**
     * Sets logger by type
     *
     * @return void
     * @throws \Exception
     */
    public function setLogger(): void
    {
        $this->logger = LoggerHelper::getLoggerFactory($this->type)->createLogger($this->config);
    }

    /**
     * Sets logger config
     *
     * @return void
     * @throws \Exception
     */
    public function setConfig(): void
    {
        $this->config = isset(\Yii::$app->components['logger'])
            ? \Yii::$app->components['logger']
            : throw new \Exception("Undefined logger config");
    }

    /**
     * Returns logger config
     *
     * @param string|null $key
     *
     * @return array|null
     */
    public function getConfig(string $key = null): array|null
    {
        if($key){
            return $this->config[$key] ?? null;
        }

        return $this->config;
    }
}