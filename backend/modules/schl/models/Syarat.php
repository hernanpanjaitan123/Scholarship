<?php

namespace backend\modules\schl\models;

use Yii;
use common\behaviors\TimestampBehavior;
use common\behaviors\BlameableBehavior;
use common\behaviors\DeleteBehavior;

/**
 * This is the model class for table "schl_syarat".
 *
 * @property integer $syarat_id
 * @property string $nama_syarat
 * @property double $ipk
 * @property string $deskripsi_syarat
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property SchlBeasiswa[] $schlBeasiswas
 * @property SchlBeasiswa $syarat
 */
class Syarat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => DeleteBehavior::className(),
                'hardDeleteTaskName' => 'HardDeleteDB', //default
                'enableSoftDelete' => true, //default, set false jika behavior ini ingin di bypass. cth, untuk proses debugging
            ]
        ];
    }
    
    public static function tableName()
    {
        return 'schl_syarat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ipk'], 'number'],
            [['deskripsi_syarat'], 'string'],
            [['deleted'], 'integer'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['nama_syarat'], 'string', 'max' => 100],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            [['syarat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Beasiswa::className(), 'targetAttribute' => ['syarat_id' => 'syarat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'syarat_id' => 'Syarat ID',
            'nama_syarat' => 'Nama Syarat',
            'ipk' => 'Ipk',
            'deskripsi_syarat' => 'Deskripsi Syarat',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchlBeasiswas()
    {
        return $this->hasMany(SchlBeasiswa::className(), ['syarat_id' => 'syarat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSyarat()
    {
        return $this->hasOne(SchlBeasiswa::className(), ['syarat_id' => 'syarat_id']);
    }
}
