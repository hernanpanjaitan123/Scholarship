<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_syarat_penilaian".
 *
 * @property integer $syarat_id
 * @property string $nama_syarat
 * @property string $deskripsi_syarat
 */
class SyaratPenilaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_syarat_penilaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_syarat', 'deskripsi_syarat'], 'required'],
            [['deskripsi_syarat'], 'string'],
            [['nama_syarat'], 'string', 'max' => 100],
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
            'deskripsi_syarat' => 'Deskripsi Syarat',
        ];
    }
}
