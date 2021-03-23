<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_pendaftar".
 *
 * @property integer $pendaftar_id
 * @property string $nim_mahasiswa
 */
class Pendaftar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_pendaftar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim_mahasiswa'], 'required'],
            [['nim_mahasiswa'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pendaftar_id' => 'Pendaftar ID',
            'nim_mahasiswa' => 'Nim Mahasiswa',
        ];
    }
}
