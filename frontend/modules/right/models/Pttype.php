<?php

namespace frontend\modules\right\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use Yii;
 
use dektrium\user\models\User;

/**
 * This is the model class for table "pttype".
 *
 * @property string $pttype_id
 * @property string $pttype_name
 */
class Pttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pttype_code','pttype_name'], 'required'],
            [['pttype_code'], 'string', 'max' => 2],
            [['pttype_name'], 'string', 'max' => 200],
            [['create_date', 'modify_date'], 'safe'],
            [['created_by','updated_by'], 'integer']
        ];
    }

    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'create_date',
            'updatedAtAttribute' => 'modify_date',
            'value' => new Expression('NOW()'),
            ],
            [  
            'class' => BlameableBehavior::className(),
            'createdByAttribute' => 'created_by',
            'updatedByAttribute' => 'updated_by',],  
        ];
    }
    public function attributeLabels()
    {
        return [
            'pttype_id',
            'pttype_code' => 'รหัสสิทธิ',
            'pttype_name' => 'ชื่อสิทธิ',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันปรับปรุง',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
  // เพิ่มฟิวล์ใหม่ จาก funtion get  relation  
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท'
        ];
    }
    
// get ชื่อผู้บันทึก
    public function getLogin() {
        return @$this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getLoginname() {
        return @$this->login->username;
    }
// get ชื่อผู้อับเดท
    public function getUpdate() {
        return @$this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    public function getUpdatename() {
        return @$this->update->username;
    }
}
