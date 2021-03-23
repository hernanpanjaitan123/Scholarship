<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_pendaftaran".
 *
 * @property integer $pendaftaran_id
 * @property string $nim_mahasiswa
 * @property integer $beasiswa_id
 * @property string $jadwal_awal
 * @property string $jadwal_akhir
 * @property string $tanggal_pendaftaran
 */
class Pendaftaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_pendaftaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim_mahasiswa', 'beasiswa_id', 'jadwal_awal', 'jadwal_akhir', 'tanggal_pendaftaran'], 'required'],
            [['beasiswa_id'], 'integer'],
            [['jadwal_awal', 'jadwal_akhir', 'tanggal_pendaftaran'], 'safe'],
            [['nim_mahasiswa'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pendaftaran_id' => 'Pendaftaran ID',
            'nim_mahasiswa' => 'Nim Mahasiswa',
            'beasiswa_id' => 'Beasiswa ID',
            'jadwal_awal' => 'Jadwal Awal',
            'jadwal_akhir' => 'Jadwal Akhir',
            'tanggal_pendaftaran' => 'Tanggal Pendaftaran',
        ];
    }
}
