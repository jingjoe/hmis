<?php

namespace frontend\modules\sqlscript\models;

use Yii;

/**
 * This is the model class for table "l_program".
 *
 * @property integer $program_id
 * @property string $program_name
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['program_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'program_name' => 'Program Name',
        ];
    }
}
