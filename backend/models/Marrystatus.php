<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "l_marrystatus".
 *
 * @property string $id
 * @property string $marrystatus_name
 */
class Marrystatus extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'l_marrystatus';
    }

    public function rules()
    {
        return [
            [['marrystatus_id'], 'required'],
            [['marrystatus_id'], 'string', 'max' => 1],
            [['marrystatus_name'], 'string', 'max' => 20]
        ];
    }

    public function attributeLabels()
    {
        return [
            'marrystatus_id' => 'ID',
            'marrystatus_name' => 'สถานภาพ',
        ];
    }
}
