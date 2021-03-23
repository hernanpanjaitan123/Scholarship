<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_tetapan_syarat_penilaian".
 *
 * @property integer $syarat_id
 * @property integer $tawaran_beasiswa_id
 */
class TetapanSyaratPenilaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_tetapan_syarat_penilaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tawaran_beasiswa_id'], 'required'],
            [['tawaran_beasiswa_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'syarat_id' => 'Syarat ID',
            'tawaran_beasiswa_id' => 'Tawaran Beasiswa ID',
        ];
    }
}
