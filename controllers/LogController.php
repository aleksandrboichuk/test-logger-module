<?php

namespace app\controllers;

use app\modules\logger\components\Logger;
use yii\base\Exception;
use yii\web\Controller;

class LogController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    /**
     * Writes Log by default type
     *
     * @return string
     * @throws Exception
     */
    public function actionLog(): string
    {
        $logger = new Logger();

        $logger->send(\Yii::$app->security->generateRandomString(20));

        return $this->render('index');
    }

    /**
     * Writes Log by selected type
     *
     * @param string $type
     *
     * @return string
     * @throws \Exception
     */
    public function actionLogTo(string $type): string
    {
        $logger = new Logger();

        $logger->setType($type);

        $logger->send(\Yii::$app->security->generateRandomString(20));

        return $this->render('index');
    }

    /**
     * Writes Log to all types
     *
     * @return string
     * @throws \Exception
     */
    public function actionLogToAll(): string
    {
        $logger = new Logger();

        $loggerTypes = $logger->getConfig('types');

        $message = \Yii::$app->security->generateRandomString(20);

        foreach ($loggerTypes as $loggerType) {
            $logger->sendByLogger($message, $loggerType);
        }

        return $this->render('index');
    }
}
