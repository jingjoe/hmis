<?php

namespace backend\models;

use Yii;


class Sex extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'l_sex';
    }

    public function rules()
    {
        return [
            [['sex_id'], 'required'],
            [['sex_id'], 'string', 'max' => 1],
            [['sex_name'], 'string', 'max' => 10]
        ];
    }

    public function attributeLabels()
    {
        return [
            'sex_id',
            'sex_name' => 'เพศ',
        ];
    }
}
