<?php

namespace backend\models;

use Yii;


class Pname extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'l_pname';
    }

    public function rules()
    {
        return [
            [['pname_id'], 'required'],
            [['pname_id'], 'string', 'max' => 2],
            [['pname_name'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'pname_id',
            'pname_name' => 'คำนำหน้า',
        ];
    }
}
