<?php

namespace backend\models;


use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use dektrium\user\models\User;

use \yii\web\UploadedFile;


/**
 * This is the model class for table "appstore".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $visit
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Appstore extends \yii\db\ActiveRecord
{
    public $upload_foler = 'appstore';
    public static function tableName()
    {
        return 'appstore';
    }
    public function rules()
    {
        return [
            [['name','detail','status'], 'required'],
            [['visit','created_by','updated_by'], 'integer'],
            [['create_date', 'modify_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
              [['img'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ]
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
            'id' => 'ID',
            'name' => 'ชื่อโปรแกรม',
            'detail' => 'รายละเอียด',
            'img' => 'รูปภาพ',
            'visit' => 'จำนวนการใช้งาน',
            'status' => 'สถานะ',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันปรับปรุง',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
             'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท',
        ];
    }

    public function itemAlias($type){
        $items = [
        'status' => [
                '1' => 'เปิด',
                '2' => 'ปิด',
            ],
        ];
        return array_key_exists($type, $items) ? $items[$type] : [];
    }
    
    public function getStatusName(){
      $items = $this->itemAlias('status');
      return array_key_exists($this->status, $items) ? $items[$this->status] : null;
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
