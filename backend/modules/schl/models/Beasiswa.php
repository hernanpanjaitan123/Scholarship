<?php

namespace backend\modules\schl\models;

use Yii;
use common\behaviors\TimestampBehavior;
use common\behaviors\BlameableBehavior;


/**
 * This is the model class for table "schl_beasiswa".
 *
 * @property integer $beasiswa_id
 * @property integer $donatur_id
 * @property string $nama_beasiswa
 * @property double $nilai_beasiswa
 * @property string $jumlah_pendaftar
 * @property string $status
 * @property string $deskripsi_beasiswa
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property SchlDonatur $donatur
 * @property SchlBerkasBeasiswa $schlBerkasBeasiswa
 * @property SchlDonatur[] $schlDonaturs
 */
class Beasiswa extends \yii\db\ActiveRecord
{
     public $jumlah_mahasiswa;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_beasiswa';
    }

    public function behaviors()
    {
        return [
                'timestamp' => [
                    'class' => TimestampBehavior::className(),

                ],
                'blameable' => [
                    'class' =>BlameableBehavior::className(),
                ]
                     
             
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['donatur_id', 'beasiswa_id' ,'deleted'], 'integer'],
            [['syarat_ipk','syarat_penghasilan_ortu' ], 'string'],
            [['deskripsi_beasiswa'], 'string'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['nama_beasiswa' ,'jumlah_pendaftar'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 50],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            [['donatur_id'], 'exist', 'skipOnError' => true, 'targetClass' => Donatur::className(), 'targetAttribute' => ['donatur_id' => 'donatur_id']],
            [['beasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => BerkasBeasiswa::className(), 'targetAttribute' => ['beasiswa_id' => 'beasiswa_id']],

          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'beasiswa_id' => 'Beasiswa ID',
            'donatur_id' => 'Donatur',
            'dim.nama' => 'Nama',
            'donatur.nama_donatur' => 'Nama Donatur',
            'dim.nim' => 'Nim',
            'syarat_ipk' => 'Syarat IPK',
            'syarat_penghasilan_ortu' => 'Syarat Penghasilan Orangtua',
            'syarat_id' =>'Syarat_id',
            'syarat.nama_syarat' => 'Nama Syarat',
            'file' => 'File',
            'nama_beasiswa' => 'Nama Beasiswa',
           
            'jumlah_mahasiswa' => 'Jumlah Pendaftar',
            'jumlah_pendaftar' => 'Kapasitas',
            'status' => 'Status',
            'deskripsi_beasiswa' => 'Deskripsi Beasiswa',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }



     public function databeasiswa()
    {
        return[
            'Bidikmisi' => 'Bidikmisi',
            'Tanoto' => 'Tanoto',
            'Rajawali' => 'Rajawali'
           
        ];
    }

     public function datastatus()
    {
        return[
            'Aktif' => 'Aktif',
            'Tidak Aktif' => 'Tidak Aktif'
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonatur()
    {
        return $this->hasOne(Donatur::className(), ['donatur_id' => 'donatur_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBerkasBeasiswa()
    {
        return $this->hasOne(BerkasBeasiswa::className(), ['beasiswa_id' => 'beasiswa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchlDonaturs()
    {
        return $this->hasMany(Donatur::className(), ['beasiswa_id' => 'beasiswa_id']);
    }


    public function getDim()
    {
        return $this->hasOne(Beasiswa::className(), ['beasiswa_id' => 'beasiswa_id']);
    }

     public function getPendaftaran()
    {
        return $this->hasMany(Pendaftaran::className(), ['beasiswa_id' => 'beasiswa_id']);
    }

      public function getDimPendaftar()
    {
        return $this->hasMany(DimPendaftar::className(), ['beasiswa_id' => 'beasiswa_id']);
    }

  public function afterFind(){
       parent::afterFind();

       $komponen = DimPendaftar::find()->where('deleted != 1')->andWhere(['beasiswa_id' => $this->beasiswa_id])->all();

       $this->jumlah_mahasiswa = 0;
       foreach($komponen as $k){
            
                $this->jumlah_mahasiswa +=1;
            }
       

       return true;
    }

}

