<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "l_bloodgroup".
 *
 * @property string $id
 * @property string $blood_name
 */
class Bloodgroup extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'l_bloodgroup';
    }

    public function rules()
    {
        return [
            [['bloodgroup_id'], 'required'],
            [['bloodgroup_id'], 'string', 'max' => 1],
            [['bloodgroup_name'], 'string', 'max' => 50]
        ];
    }

    public function attributeLabels()
    {
        return [
            'bloodgroup_id',
            'bloodgroup_name' => 'กรุ๊บเลือด',
        ];
    }
}
