<?php

namespace frontend\modules\labstore\models;

use Yii;

/**
 * This is the model class for table "l_labgroup".
 *
 * @property integer $id
 * @property string $lab_group_name
 */
class Labgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_labgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lab_group_name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lab_group_id' => 'ID',
            'lab_group_name' => 'กลุ่มแลป',
        ];
    }
}
