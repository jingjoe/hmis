<?php

namespace frontend\modules\sqlscript\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use frontend\modules\sqlscript\models\Program;
use dektrium\user\models\User;

/**
 * This is the model class for table "sqlscript".
 *
 * @property integer $sql_id
 * @property integer $program_id
 * @property string $sql_name
 * @property string $sql_script
 * @property string $files
 * @property integer $hits
 * @property string $create_date
 * @property string $modify_date
 * @property integer $created_by
 * @property integer $updated_by
 */
class Sqlscript extends \yii\db\ActiveRecord {

    const DOC_PATH = 'sqlscript';

    public static function tableName() {
        return 'sqlscript';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['program_id', 'hits', 'created_by', 'updated_by'], 'integer'],
            [['sql_name'], 'required'],
            [['sql_script'], 'string'],
            [['create_date', 'modify_date'], 'safe'],
            [['sql_name'], 'string', 'max' => 255],
            [['token_upload'], 'string', 'max' => 100],
            [['files'], 'file'] //extensions' => 'cds,txt,sql'
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

    public function attributeLabels() {
        return [
            'sql_id' => 'Sql ID',
            'program_id' => 'โปรแกรม',
            'sql_name' => 'ชื่อชุดคำสั่ง sql',
            'sql_script' => 'คำสั่ง sql',
            'files' => 'ไฟล์แนบ',
            'token_upload' => 'Token Upload',
            'hits' => 'จำนวนดาวน์โหลด',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันอับเดท',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
            // เพิ่มฟิวล์ใหม่ จาก funtion get  relation          
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท',
            'programname' => 'โปรแกรม'
        ];
    }

// get program  
    public function getProgram() {
        return @$this->hasOne(Program::className(), ['program_id' => 'program_id']);
    }

    public function getProgramname() {
        return @$this->program->program_name;
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
