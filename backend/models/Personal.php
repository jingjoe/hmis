<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use \yii\web\UploadedFile;

use backend\models\Pname;
use backend\models\Sex;
use backend\models\Religion;
use backend\models\Bloodgroup;
use backend\models\Marrystatus;
use backend\models\Position;
use backend\models\Persontype;
use backend\models\Education;
use backend\models\Department;
use backend\models\DepartmentGroup;

use dektrium\user\models\User;



/**
 * This is the model class for table "personal".
 *
 * @property integer $id
 * @property string $pid
 * @property string $cid
 * @property string $pname_id
 * @property string $fname
 * @property string $lname
 * @property string $nickname
 * @property string $sex_id
 * @property string $age
 * @property string $religion_id
 * @property string $bloodgroup_id
 * @property string $marrystatus_id
 * @property string $birthdate
 * @property string $address1
 * @property string $address2
 * @property string $phone
 * @property string $email
 * @property string $line
 * @property string $facebook
 * @property string $skill
 * @property string $education_id
 * @property string $img
 * @property string $startwork_date
 * @property string $position_id
 * @property string $salary
 * @property string $depart_group_id
 * @property string $depart_id
 * @property string $persontype_id
 * @property string $created_at
 * @property string $updated_at
 */
class Personal extends \yii\db\ActiveRecord
{
    public $upload_foler = 'personal';
    public static function tableName()
    {
        return 'personal';
    }


    public function rules()
    {
        return [
            [['pid', 'cid', 'pname_id', 'fname', 'lname', 'nickname', 'sex_id', 'age', 'religion_id', 'bloodgroup_id', 'marrystatus_id', 'birthdate', 'address1', 'phone', 'email', 'startwork_date', 'position_id', 'depart_group_id', 'depart_id', 'persontype_id'], 'required'],
            [['birthdate', 'startwork_date','create_date', 'modify_date'], 'safe'],
            [['address1', 'address2', 'skill'], 'string'],
            [['salary'], 'number'],
            [['pid'], 'string', 'max' => 4],
            [['cid'], 'string', 'max' => 17],
            [['pname_id', 'age', 'religion_id', 'position_id', 'depart_group_id'], 'string', 'max' => 2],
            [['fname', 'lname'], 'string', 'max' => 150],
            [['nickname', 'line', 'facebook'], 'string', 'max' => 50],
            [['sex_id', 'bloodgroup_id', 'marrystatus_id', 'education_id', 'persontype_id'], 'string', 'max' => 1],
            [['phone'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 100],
            [['depart_id'], 'string', 'max' => 3],
            [['created_by','updated_by'], 'integer'],
            [['img'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ]
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

    public function attributeLabels(){
        return [
            'id' => 'ID',
            'pid' => 'รหัสบุคลากร',
            'cid' => 'เลขบัตรประชาชน',
            'pname_id' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'nickname' => 'ชื่อเล่น',
            'sex_id' => 'เพศ',
            'age' => 'อายุ',
            'religion_id' => 'ศาสนา',
            'bloodgroup_id' => 'กรุ๊ปเลือด',
            'marrystatus_id' => 'สถานภาพการสมรส',
            'birthdate' => 'วันเกิด',
            'address1' => 'ที่อยู่ตามทะเบียนบ้าน',
            'address2' => 'ที่อยู่ปัจจุบัน',
            'phone' => 'โทรศัพท์มือถือ',
            'email' => 'อีเมล์',
            'line' => 'ไลน์ไอดี',
            'facebook' => 'เฟสบุ๊ค',
            'skill' => 'ความสามารถพิเศษ',
            'education_id' => 'ระดับการศึกษา',
            'img' => 'รูปประจำตัว',
            'startwork_date' => 'วันเข้าทำงาน',
            'position_id' => 'ตำแหน่ง',
            'salary' => 'เงินเดือน',
            'depart_group_id' => 'ฝ่าย',
            'depart_id' => 'แผนก',
            'persontype_id' => 'สถานของบุคคล',
            'create_date' => 'วันลงทะเบียน',
            'modify_date' => 'วันอับเดท',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
// เพิ่มฟิวล์ใหม่ จาก funtion get  relation          
            'pname' => 'คำนำหน้า',
            'positionname' => 'ตำแหน่ง',
            'sexname' => 'เพศ',
            'religionname' => 'ศาสนา',
            'bloodname' => 'กรุ๊ปเลือด',
            'marryname' => 'สถานภาพ',
            'educationname' => 'ระดับการศึกษา',
            'positionname' => 'ตำแหน่ง',
            'pertypename' => 'สถานะ',
            'departname' => 'แผนก',
            'departgroupname' => 'ฝ่าย',
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท',
            'fullname' => Yii::t('app', 'ชื่อ-นามสกุล'),

        ];
    }
// get คำนำหน้า    
    public function getName() {
        return @$this->hasOne(Pname::className(), ['pname_id' => 'pname_id']);
    }
    public function getPname() {
        return @$this->name->pname_name;
    }
    
// get เพศ 
    public function getSex() {
        return @$this->hasOne(Sex::className(), ['sex_id' => 'sex_id']);
    }
    public function getSexname() {
        return @$this->sex->sex_name;
    }

// get ศาสนา   
    public function getReligion() {
        return @$this->hasOne(Religion::className(), ['religion_id' => 'religion_id']);
    }
    public function getReligionname() {
        return @$this->religion->religion_name;
    }

// get กรุ๊ปเลือด
    public function getBlood() {
        return @$this->hasOne(Bloodgroup::className(), ['bloodgroup_id' => 'bloodgroup_id']);
    }
    public function getBloodname() {
        return @$this->blood->bloodgroup_name;
    }
    
// get สถานะภาพ  
    public function getMarry() {
        return @$this->hasOne(Marrystatus::className(), ['marrystatus_id' => 'marrystatus_id']);
    }
    public function getMarryname() {
        return @$this->marry->marrystatus_name;
    }

// get ระดับการศึกษา    
    public function getEducation() {
        return @$this->hasOne(Education::className(), ['education_id' => 'education_id']);
    }
    public function getEducationname() {
        return @$this->education->education_name;
    }

// get ตำแหน่ง     
    public function getPosition() {
        return @$this->hasOne(Position::className(), ['position_id' => 'position_id']);
    }
    public function getPositionname() {
        return @$this->position->position_name;
    }

// get สถานะบุคคล  
    public function getPertype() {
        return @$this->hasOne(Persontype::className(), ['persontype_id' => 'persontype_id']);
    }
    public function getPertypename() {
        return @$this->pertype->persontype_name;
    }
// get แผนก
    public function getDepart() {
        return @$this->hasOne(Department::className(), ['depart_id' => 'depart_id']);
    }
    public function getDepartname() {
        return @$this->depart->depart_name;
    }
// get ฝ่าย
    public function getDepartgroup() {
        return @$this->hasOne(DepartmentGroup::className(), ['depart_group_id' => 'depart_group_id']);
    }
    public function getDepartgroupname() {
        return @$this->departgroup->depart_group_name;
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
    
// virtual attribute fullName 
    public function getFullname(){
        return $this->pname. $this->fname. "   " .$this->lname;
    }
    
 // upload image
    public function upload($model,$attribute)
    {
        $img  = UploadedFile::getInstance($model, $attribute);
          $path = $this->getUploadPath();
        if ($this->validate() && $img !== null) {

            $fileName = md5($img->baseName.time()) . '.' . $img->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($img->saveAs($path.$fileName)){
              return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath(){
      return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }

    public function getPhotoViewer(){
      return empty($this->img) ? Yii::getAlias('@web').'/images/none.png' : $this->getUploadUrl().$this->img;
    }
}
