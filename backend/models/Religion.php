<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "l_religion".
 *
 * @property string $id
 * @property string $religion_name
 */
class Religion extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'l_religion';
    }

    public function rules()
    {
        return [
            [['religion_id'], 'required'],
            [['religion_id'], 'string', 'max' => 2],
            [['religion_name'], 'string', 'max' => 40]
        ];
    }

    public function attributeLabels()
    {
        return [
            'religion_id',
            'religion_name' => 'ศาสนา',
        ];
    }
}
