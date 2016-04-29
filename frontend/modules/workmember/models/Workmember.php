<?php

namespace frontend\modules\workmember\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

//use backend\models\Pname;
use frontend\modules\reportonline\models\ReportStatus;
use dektrium\user\models\User;
use backend\models\Personal;


/**
 * This is the model class for table "workrecord".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property string $order_date
 * @property string $defined_date
 * @property string $create_date
 * @property string $modify_date
 * @property integer $created_at
 * @property integer $assign_id
 * @property integer $personal_id
 * @property integer $status_id
 */
class Workmember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workrecord';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'order_date', 'defined_date', 'status_id'], 'required'],
            [['detail'], 'string'],
            [['order_date', 'defined_date', 'create_date', 'modify_date'], 'safe'],
            [['created_by', 'updated_by','assign_id', 'status_id'], 'integer'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    public function behaviors(){
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
            'id' => 'ID',
            'name' => 'ชื่องาน',
            'detail' => 'รายละเอียดงาน',
            'order_date' => 'วันหมอบหมาย',
            'defined_date' => 'วันแล้วเสร็จ',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันอับเดท',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
            'assign_id' => 'ชื่อผู้มอบหมาย',
            'status_id' => 'สถานะ',
     // เพิ่มฟิวล์ใหม่ จาก funtion get  relation          
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท',
            'statusname' => 'สถานะงาน',
            'departname' => 'แผนก',
            'personassign' => 'ชื่อผู้มอบหมาย',
            'globalSearch'  => ''
        ];
    }
// virtual attribute fullName 
   public function getPerson() {
        return @$this->hasOne(Personal::className(), ['id' => 'assign_id']);
    }
    public function getPersonassign() {
       return @$this->person->pname. "" .@$this->person->fname. "   " .@$this->person->lname;

    }
// get สถานะงาน
    public function getStatus() {
        return @$this->hasOne(ReportStatus::className(), ['report_status_id' => 'status_id']);
    }
    public function getStatusname() {
        return @$this->status->report_status_name;
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
