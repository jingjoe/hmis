<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "l_education".
 *
 * @property string $id
 * @property string $education_name
 */
class Education extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'l_education';
    }

    public function rules()
    {
        return [
            [['education_id'], 'required'],
            [['education_id'], 'string', 'max' => 1],
            [['education_name'], 'string', 'max' => 200]
        ];
    }

    public function attributeLabels()
    {
        return [
            'education_id',
            'education_name' => 'ระดับการศึกษา',
        ];
    }
}
