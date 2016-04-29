<?php

namespace frontend\modules\labstore\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use frontend\modules\labstore\models\Labgroup;
use dektrium\user\models\User;

/**
 * This is the model class for table "labstore".
 *
 * @property integer $id
 * @property string $hn
 * @property string $lab_number
 * @property string $file
 * @property string $lab_group_id
 * @property string $note
 * @property integer $visit
 * @property string $create_date
 * @property string $modify_date
 * @property integer $created_by
 * @property integer $updated_by
 */
class Labstore extends \yii\db\ActiveRecord
{
    const DOC_PATH = 'labstore';
    public static function tableName()
    {
        return 'labstore';
    }


    public function rules(){
        return [
            [['hn', 'lab_number'], 'required'],
            [['visit', 'created_by', 'updated_by'], 'integer'],
            [['create_date', 'modify_date'], 'safe'],
            [['hn'], 'string', 'max' => 7],
            [['lab_number'], 'string', 'max' => 5],
            [['lab_group_id'], 'string', 'max' => 1],
            [['note'], 'string', 'max' => 255],
            [['token_upload'], 'string', 'max' => 100],
            [['file'], 'file'] //extensions' => 'cds,txt,sql'
        ];
    }
    
    public function behaviors() {
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
            'hn' => 'HN',
            'lab_number' => 'เลขที่สั่งแลป',
            'file' => 'ไฟล์ใบแลป',
            'lab_group_id' => 'กลุ่มแลป',
            'note' => 'หมายเหตุ',
            'visit' => 'จำนวนการใช้งาน',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันปรับปรุง',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
            // เพิ่มฟิวล์ใหม่ จาก funtion get  relation          
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท',
            'labgroupname' => 'กลุ่มแลป'
        ];
    }
    // get labgroup  
    public function getLabgroup() {
        return @$this->hasOne(Labgroup::className(), ['lab_group_id' => 'lab_group_id']);
    }

    public function getLabgroupname() {
        return @$this->labgroup->lab_group_name;
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

// Function upload files.

    public static function getDocPath() {
        return Yii::getAlias('@webroot') . '/' . self::DOC_PATH;
    }

    public static function getDocUrl() {
        return Url::base(true) . '/' . self::DOC_PATH;
    }
}
