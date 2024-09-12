<?php
return [
    'class' => \app\modules\logger\Logger::class,
    'defaultType' => 'file',
    'types' => ['email', 'file' , 'database'],
    'email' => 'test@example.com',
    'filePath' => 'file_logger.log'
];