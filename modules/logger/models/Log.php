<?php

namespace app\modules\logger\models;

use yii\db\ActiveRecord;

class Log extends ActiveRecord
{
    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName(): string
    {
        return '{{logs}}';
    }

    public function rules(): array
    {
        return [
            [['message'], 'required'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'message' => 'Log message',
        ];
    }
}