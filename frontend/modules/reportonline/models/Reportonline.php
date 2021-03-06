<?php

namespace frontend\modules\reportonline\models;

use Yii;


use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

//use backend\models\Pname;
use dektrium\user\models\User;
use frontend\modules\reportonline\models\Link;
use frontend\modules\reportonline\models\ReportStatus;
use frontend\modules\reportonline\models\ReportType;
use backend\models\Department;
use backend\models\DepartmentGroup;
use backend\models\Personal;


/**
 * This is the model class for table "reportonline".
 *
 * @property integer $id
 * @property integer $personal_id
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $depart_group_id
 * @property string $depart_id
 * @property string $reporttype_id
 * @property string $name
 * @property string $details
 * @property string $image
 * @property string $files
 * @property string $order_date
 * @property string $defined_date
 * @property string $unit
 * @property string $link_id
 * @property string $finish_date
 * @property string $report_status_id
 * @property string $create_date
 * @property string $modify_date
 * @property integer $created_by
 * @property integer $updated_by
 */
class Reportonline extends \yii\db\ActiveRecord
{
    const DOC_PATH  = 'reportonline';
    public $foler_upload ='reportonline';
    public static function tableName()
    {
        return 'reportonline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personal_id', 'depart_group_id', 'depart_id', 'reporttype_id', 'name', 'details', 'order_date', 'defined_date', 'link_id'], 'required'],
            [['personal_id', 'created_by', 'updated_by'], 'integer'],
            [['details'], 'string'],
            [['order_date', 'defined_date', 'finish_date', 'create_date', 'modify_date'], 'safe'],
            [['unit'], 'number'],
            [['pname'], 'string', 'max' => 50],
            [['fname', 'lname'], 'string', 'max' => 150],
            [['depart_group_id', 'depart_id', 'reporttype_id', 'link_id', 'report_status_id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 250],
            [['files'], 'file',
              'skipOnEmpty' => true,
              'extensions' => 'pdf,docx'
            ],
            [['image'], 'file',
              'skipOnEmpty' => true,
              'maxFiles' => 3,
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personal_id' => 'เลขบุคลากร',
            'pname' => 'Pname',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'depart_group_id' => 'ฝ่าย',
            'depart_id' => 'แผนก',
            'reporttype_id' => 'ประเภทรายงาน',
            'name' => 'ชื่อรายงาน',
            'details' => 'รายละเอียดรายงาน',
            'image' => 'หน้าจอบันทึกโปรแกรม',
            'files' => 'ตัวอย่างรายงาน',
            'order_date' => 'วันขอรายงาน',
            'defined_date' => 'วันกำหนดส่ง',
            'unit' => 'จำนวนรายงาน',
            'link_id' => 'ดาวน์โหลดรายงาน',
            'finish_date' => 'วันแล้วเสร็จ',
            'report_status_id' => 'สถานะ',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันอับเดท',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
        // เพิ่มฟิวล์ใหม่ จาก funtion get  relation          
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท',
            'linkname' => 'ส่งรายงานที่',
            'statusname' => 'สถานะการขอ',
            'typename' => 'ประเภทรายงาน',
            //'pname' => 'คำนำหน้า',
            'departname' => 'แผนก',
            'departgroupname' => 'ฝ่าย',
            'personname' => 'ชื่อ-นามสกุล',
            //'fullname' => Yii::t('app', 'ชื่อ-นามสกุล'),
            
        ];
    }
// virtual attribute fullName 
   public function getPerson() {
        return @$this->hasOne(Personal::className(), ['id' => 'personal_id']);
    }
    public function getPersonname() {
       return @$this->person->pname. "" .@$this->person->fname. "   " .@$this->person->lname;

    }
// get ลิงค์ดาวน์โหลด
    public function getLink() {
        return @$this->hasOne(Link::className(), ['link_id' => 'link_id']);
    }
    public function getLinkname() {
        return @$this->link->link_name;
    }
// get สถานะรานงาน
    public function getStatus() {
        return @$this->hasOne(ReportStatus::className(), ['report_status_id' => 'report_status_id']);
    }
    public function getStatusname() {
        return @$this->status->report_status_name;
    }
// get ประเภทรานงาน
    public function getType() {
        return @$this->hasOne(ReportType::className(), ['reporttype_id' => 'reporttype_id']);
    }
    public function getTypename() {
        return @$this->type->reporttype_name;
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
    
// funtion Part Upload file
 // อับโหลดไฟล์เดียว   
public function upload($model,$attribute)
{
    $files  = UploadedFile::getInstance($model, $attribute);
      $path = $this->getUploadPath();
    if ($this->validate() && $files !== null) {

        $fileName = md5($files->baseName.time()) . '.' . $files->extension;
        //$fileName = $photo->baseName . '.' . $photo->extension;
        if($files->saveAs($path.$fileName)){
          return $fileName;
        }
    }
    return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
}
public function getUploadPath(){
  return Yii::getAlias('@webroot').'/'.$this->foler_upload.'/';
}

public function getUploadUrl(){
  return Yii::getAlias('@web').'/'.$this->foler_upload.'/';
}

public function getPhotoViewer(){
  return empty($this->files) ? Yii::getAlias('@web').'/images/none.png' : $this->getUploadUrl().$this->files;
}

// อับโหลดหลายไฟล์
    public function uploadMultiple($model,$attribute)
    {
      $image  = UploadedFile::getInstances($model, $attribute);
      $path = $this->getUploadPath();
      if ($this->validate() && $image !== null) {
          $filenames = [];
          foreach ($image as $file) {
                  $filename = md5($file->baseName.time()) . '.' . $file->extension;
                  if($file->saveAs($path . $filename)){
                    $filenames[] = $filename;
                  }
          }
          if($model->isNewRecord){
            return implode(',', $filenames);
          }else{
            return implode(',',(ArrayHelper::merge($filenames,$model->getOwnPhotosToArray())));
          }
      }

      return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getPhotosViewer(){
      $image = $this->image ? @explode(',',$this->image) : [];
      $img = '';
      foreach ($image as  $image) {
        $img.= ' '.Html::img($this->getUploadUrl().$image,['class'=>'img-thumbnail','style'=>'max-width:300px;']);
      }
      return $img;
    }

    public function getOwnPhotosToArray()
    {
      return $this->getOldAttribute('image') ? @explode(',',$this->getOldAttribute('image')) : [];
    }
 // funtion File Part ในการdownload    
        public static function getFilesPath(){
        return Yii::getAlias('@webroot').'/'.self::DOC_PATH;
    }

    public static function getFilesUrl(){
        return Url::base(true).'/'.self::DOC_PATH;
    }
    
}
