<?php

namespace app\models;

use Yii;

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
 * @property string $akamat_situs_donatur
 *
 * @property SchlBeasiswa[] $schlBeasiswas
 */
class Donatur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['beasiswa_id', 'nama_donatur', 'alamat_donatur', 'kd_pos_donatur', 'no_telp_donatur', 'alamat_email_donatur', 'akamat_situs_donatur'], 'required'],
            [['beasiswa_id', 'kd_pos_donatur', 'no_telp_donatur'], 'integer'],
            [['alamat_donatur'], 'string'],
            [['nama_donatur', 'alamat_email_donatur', 'akamat_situs_donatur'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'donatur_id' => 'Donatur ID',
            'beasiswa_id' => 'Beasiswa ID',
            'nama_donatur' => 'Nama Donatur',
            'alamat_donatur' => 'Alamat Donatur',
            'kd_pos_donatur' => 'Kd Pos Donatur',
            'no_telp_donatur' => 'No Telp Donatur',
            'alamat_email_donatur' => 'Alamat Email Donatur',
            'akamat_situs_donatur' => 'Akamat Situs Donatur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchlBeasiswas()
    {
        return $this->hasMany(SchlBeasiswa::className(), ['donatur_id' => 'donatur_id']);
    }
}
