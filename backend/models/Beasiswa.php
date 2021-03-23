<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_beasiswa".
 *
 * @property integer $beasiswa_id
 * @property integer $donatur_id
 * @property string $nama_beasiswa
 * @property string $deskripsi_beasiswa
 *
 * @property SchlDonatur $donatur
 */
class Beasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_beasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['donatur_id', 'nama_beasiswa', 'deskripsi_beasiswa'], 'required'],
            [['donatur_id'], 'integer'],
            [['deskripsi_beasiswa'], 'string'],
            [['nama_beasiswa'], 'string', 'max' => 100],
            [['donatur_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchlDonatur::className(), 'targetAttribute' => ['donatur_id' => 'donatur_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'beasiswa_id' => 'Beasiswa ID',
            'donatur_id' => 'Donatur ID',
            'nama_beasiswa' => 'Nama Beasiswa',
            'deskripsi_beasiswa' => 'Deskripsi Beasiswa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonatur()
    {
        return $this->hasOne(SchlDonatur::className(), ['donatur_id' => 'donatur_id']);
    }
}
