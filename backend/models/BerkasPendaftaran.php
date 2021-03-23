<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_berkas_pendaftaran".
 *
 * @property integer $berkas_pendaftaran_id
 * @property integer $no_pendaftaran
 * @property string $tipe_file
 * @property double $ukuran_file
 * @property string $tanggal_upload
 */
class BerkasPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_berkas_pendaftaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_pendaftaran', 'tipe_file', 'ukuran_file', 'tanggal_upload'], 'required'],
            [['no_pendaftaran'], 'integer'],
            [['ukuran_file'], 'number'],
            [['tanggal_upload'], 'safe'],
            [['tipe_file'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'berkas_pendaftaran_id' => 'Berkas Pendaftaran ID',
            'no_pendaftaran' => 'No Pendaftaran',
            'tipe_file' => 'Tipe File',
            'ukuran_file' => 'Ukuran File',
            'tanggal_upload' => 'Tanggal Upload',
        ];
    }
}
