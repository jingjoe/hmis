<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "l_position".
 *
 * @property string $id
 * @property string $position_name
 */
class Position extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'l_position';
    }

    public function rules()
    {
        return [
            [['position_id'], 'required'],
            [['position_id'], 'string', 'max' => 2],
            [['position_name'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'position_id',
            'position_name' => 'ตำแหน่ง',
        ];
    }
}
