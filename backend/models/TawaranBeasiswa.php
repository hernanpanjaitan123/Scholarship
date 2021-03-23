<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schl_tawaran_beasiswa".
 *
 * @property integer $tawaran_beasiswa_id
 * @property integer $beasiswa_id
 * @property integer $semester
 * @property integer $tahun_akademik
 * @property integer $total_kuota
 * @property string $tgl_awal_daftar
 * @property string $tgl_akhir_daftar
 * @property string $tgl_pengumuman
 */
class TawaranBeasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_tawaran_beasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beasiswa_id', 'semester', 'tahun_akademik', 'total_kuota', 'tgl_awal_daftar', 'tgl_akhir_daftar', 'tgl_pengumuman'], 'required'],
            [['beasiswa_id', 'semester', 'tahun_akademik', 'total_kuota'], 'integer'],
            [['tgl_awal_daftar', 'tgl_akhir_daftar', 'tgl_pengumuman'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tawaran_beasiswa_id' => 'Tawaran Beasiswa ID',
            'beasiswa_id' => 'Beasiswa ID',
            'semester' => 'Semester',
            'tahun_akademik' => 'Tahun Akademik',
            'total_kuota' => 'Total Kuota',
            'tgl_awal_daftar' => 'Tgl Awal Daftar',
            'tgl_akhir_daftar' => 'Tgl Akhir Daftar',
            'tgl_pengumuman' => 'Tgl Pengumuman',
        ];
    }
}
