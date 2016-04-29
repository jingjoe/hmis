<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "l_persontype".
 *
 * @property string $id
 * @property string $persontype_name
 */
class Persontype extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'l_persontype';
    }

    public function rules()
    {
        return [
            [['persontype_id'], 'required'],
            [['persontype_id'], 'string', 'max' => 1],
            [['persontype_name'], 'string', 'max' => 50]
        ];
    }

    public function attributeLabels()
    {
        return [
            'persontype_id',
            'persontype_name' => 'สถานะ',
        ];
    }
}
