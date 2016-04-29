<?php

namespace frontend\modules\right\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use Yii;

use dektrium\user\models\User;

/**
 * This is the model class for table "right".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $hn
 * @property string $cid
 * @property string $fullname
 * @property string $regdate
 * @property string $dateaffect
 * @property string $pttype_id
 * @property string $created_at
 * @property string $update_at
 */
class Right extends \yii\db\ActiveRecord {

    public static function tableName()
    {
        return 'right';
    }

    public function rules()
    {
        return [
            [['hn', 'cid', 'fullname', 'regdate', 'dateaffect', 'pttype_id','dateaffect',], 'required'],
            [['hn'], 'string', 'max' => 7],
            [['cid'], 'string', 'max' => 17],
            [['fullname'], 'string', 'max' => 100],
            [['pttype_id'], 'string', 'max' => 2],
            [['pttype','create_date', 'modify_date'], 'safe'],
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
            'id',
            'hn' => 'HN',
            'cid' => 'เลขบัตรประชาชน',
            'fullname' => 'ชื่อ - นามสกุล',
            'regdate' => 'วันขึ้นทะเบียน',
            'dateaffect' => 'วันใช้สิทธิ',
            'pttype_id' => 'ประเภทสิทธิ',
            'pttype' => 'สิทธิการรักษา',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันปรับปรุง',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
        // เพิ่มฟิวล์ใหม่ จาก funtion get  relation  
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท'
        ];
    }
    public  function getPttype(){
        return @$this->hasOne(Pttype::className(), ['pttype_id' => 'pttype_id']);
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
