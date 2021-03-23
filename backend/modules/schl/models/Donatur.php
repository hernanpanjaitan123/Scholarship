<?php

namespace backend\modules\schl\models;

use Yii;
use common\behaviors\TimestampBehavior;
use common\behaviors\BlameableBehavior;

/**
 * This is the model class for table "schl_donatur".
 *
 * @property integer $donatur_id
 * @property integer $beasiswa_id
 * @property string $nama_donatur
 * @property string $alamat_donatur
 * @property integer $kd_pos_donatur
 * @property integer $no_telp_donatur
 * @property string $alamat_email_donatur
 * @property string $alamat_situs_donatur
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property SchlBeasiswa[] $schlBeasiswas
 * @property SchlBeasiswa $beasiswa
 */
class Donatur extends \yii\db\ActiveRecord
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
            
        ];
    }
    
    public static function tableName()
    {
        return 'schl_donatur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'kd_pos_donatur', 'no_telp_donatur', 'deleted'], 'integer'],
            [['alamat_donatur'], 'string'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['nama_donatur', 'alamat_email_donatur', 'alamat_situs_donatur'], 'string', 'max' => 100],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            // [['beasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Beasiswa::className(), 'targetAttribute' => ['beasiswa_id' => 'beasiswa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'donatur_id' => 'Donatur ID',
            // 'beasiswa_id' => 'Beasiswa ID',
            'beasiswa.nama_beasiswa' => 'Nama Beasiswa',
            'nama_donatur' => 'Nama Donatur',
            'alamat_donatur' => 'Alamat Donatur',
            'kd_pos_donatur' => 'Kd Pos Donatur',
            'no_telp_donatur' => 'No Telp Donatur',
            'alamat_email_donatur' => 'Alamat Email Donatur',
            'alamat_situs_donatur' => 'Alamat Situs Donatur',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchlBeasiswas()
    {
        return $this->hasMany(Beasiswa::className(), ['donatur_id' => 'donatur_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeasiswa()
    {
        return $this->hasOne(Beasiswa::className(), ['beasiswa_id' => 'beasiswa_id']);
    }
}
