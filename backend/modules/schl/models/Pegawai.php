<?php

namespace backend\modules\schl\models;

use Yii;
use common\behaviors\TimestampBehavior;
use common\behaviors\BlameableBehavior;
use common\behaviors\DeleteBehavior;

/**
 * This is the model class for table "hrdx_pegawai".
 *
 * @property integer $pegawai_id
 * @property string $profile_old_id
 * @property string $nama
 * @property string $user_name
 * @property string $nip
 * @property string $kpt_no
 * @property string $kbk_id
 * @property integer $ref_kbk_id
 * @property string $alias
 * @property string $posisi
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property integer $agama_id
 * @property integer $jenis_kelamin_id
 * @property integer $golongan_darah_id
 * @property string $hp
 * @property string $telepon
 * @property resource $alamat
 * @property string $alamat_libur
 * @property string $kecamatan
 * @property string $kota
 * @property integer $kabupaten_id
 * @property string $kode_pos
 * @property string $no_ktp
 * @property string $email
 * @property string $ext_num
 * @property string $study_area_1
 * @property string $study_area_2
 * @property string $jabatan
 * @property integer $jabatan_akademik_id
 * @property integer $gbk_1
 * @property integer $gbk_2
 * @property integer $status_ikatan_kerja_pegawai_id
 * @property string $status_akhir
 * @property integer $status_aktif_pegawai_id
 * @property string $tanggal_masuk
 * @property string $tanggal_keluar
 * @property string $nama_bapak
 * @property string $nama_ibu
 * @property string $status
 * @property integer $status_marital_id
 * @property string $nama_p
 * @property string $tgl_lahir_p
 * @property string $tmp_lahir_p
 * @property string $pekerjaan_ortu
 * @property integer $user_id
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property AdakPenugasanPengajaran[] $adakPenugasanPengajarans
 * @property AdakRegistrasi[] $adakRegistrasis
 * @property AskmIzinBermalam[] $askmIzinBermalams
 * @property AskmIzinKeluar[] $askmIzinKeluars
 * @property AskmIzinKeluar[] $askmIzinKeluars0
 * @property AskmIzinKeluar[] $askmIzinKeluars1
 * @property AskmIzinKolaboratif[] $askmIzinKolaboratifs
 * @property AskmIzinRuangan[] $askmIzinRuangans
 * @property AskmKeasramaan[] $askmKeasramaans
 * @property BaakKaosDel[] $baakKaosDels
 * @property BaakKartuTandaMahasiswa[] $baakKartuTandaMahasiswas
 * @property BaakSuratLomba[] $baakSuratLombas
 * @property BaakSuratMagang[] $baakSuratMagangs
 * @property BaakSuratMahasiswaAktif[] $baakSuratMahasiswaAktifs
 * @property BaakSuratPengantarProyek[] $baakSuratPengantarProyeks
 * @property CistPermohonanCutiNontahunan[] $cistPermohonanCutiNontahunans
 * @property CistPermohonanCutiTahunan[] $cistPermohonanCutiTahunans
 * @property CistPermohonanIzin[] $cistPermohonanIzins
 * @property CistRKuotaCutiTahunan[] $cistRKuotaCutiTahunans
 * @property CistSuratTugas[] $cistSuratTugas
 * @property CistSuratTugasAssignee[] $cistSuratTugasAssignees
 * @property HrdxDosen[] $hrdxDosens
 * @property MrefRJenisKelamin $jenisKelamin
 * @property MrefRAgama $agama
 * @property MrefRGolonganDarah $golonganDarah
 * @property MrefRJabatanAkademik $jabatanAkademik
 * @property MrefRKabupaten $kabupaten
 * @property InstProdi $refKbk
 * @property MrefRStatusAktifPegawai $statusAktifPegawai
 * @property MrefRStatusIkatanKerjaPegawai $statusIkatanKerjaPegawai
 * @property MrefRStatusMarital $statusMarital
 * @property SysxUser $user
 * @property HrdxPengajar[] $hrdxPengajars
 * @property HrdxRiwayatPendidikan[] $hrdxRiwayatPendidikans
 * @property HrdxStaf[] $hrdxStafs
 * @property InstPejabat[] $instPejabats
 * @property InvtPicBarang[] $invtPicBarangs
 * @property KolbBuku[] $kolbBukus
 * @property KolbKomponen[] $kolbKomponens
 * @property KolbPenilai[] $kolbPenilais
 * @property KolbPenulis[] $kolbPenulis
 * @property LabxPemesanan[] $labxPemesanans
 * @property LabxPeminjaman[] $labxPeminjamen
 * @property LabxPenambahanStokAlat[] $labxPenambahanStokAlats
 * @property LabxPenambahanStokBahan[] $labxPenambahanStokBahans
 * @property LppmTLogreview[] $lppmTLogreviews
 * @property LppmTPublikasi[] $lppmTPublikasis
 * @property PrklCourseUnit[] $prklCourseUnits
 * @property PrklKrsMhs[] $prklKrsMhs
 * @property SchlKemahasiswaan[] $schlKemahasiswaans
 * @property UbuxDataPaket[] $ubuxDataPakets
 * @property UbuxPemakaianKendaraan[] $ubuxPemakaianKendaraans
 * @property UbuxSupir[] $ubuxSupirs
 */
class Pegawai extends \yii\db\ActiveRecord
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
            [
                'class' => DeleteBehavior::className(),
                'hardDeleteTaskName' => 'HardDeleteDB', //default
                'enableSoftDelete' => true, //default, set false jika behavior ini ingin di bypass. cth, untuk proses debugging
            ]
        ];
    }


    public static function tableName()
    {
        return 'hrdx_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_kbk_id', 'agama_id', 'jenis_kelamin_id', 'golongan_darah_id', 'kabupaten_id', 'jabatan_akademik_id', 'gbk_1', 'gbk_2', 'status_ikatan_kerja_pegawai_id', 'status_aktif_pegawai_id', 'status_marital_id', 'user_id', 'deleted'], 'integer'],
            [['tgl_lahir', 'tanggal_masuk', 'tanggal_keluar', 'tgl_lahir_p', 'deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['alamat', 'email'], 'string'],
            [['profile_old_id', 'kbk_id', 'hp'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 135],
            [['user_name', 'posisi', 'alamat_libur', 'pekerjaan_ortu'], 'string', 'max' => 100],
            [['nip', 'telepon'], 'string', 'max' => 45],
            [['kpt_no'], 'string', 'max' => 10],
            [['alias'], 'string', 'max' => 9],
            [['tempat_lahir'], 'string', 'max' => 60],
            [['kecamatan'], 'string', 'max' => 150],
            [['kota', 'study_area_1', 'study_area_2', 'nama_bapak', 'nama_ibu', 'nama_p', 'tmp_lahir_p'], 'string', 'max' => 50],
            [['kode_pos'], 'string', 'max' => 15],
            [['no_ktp'], 'string', 'max' => 255],
            [['ext_num'], 'string', 'max' => 3],
            [['jabatan', 'status_akhir', 'status'], 'string', 'max' => 1],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            [['jenis_kelamin_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRJenisKelamin::className(), 'targetAttribute' => ['jenis_kelamin_id' => 'jenis_kelamin_id']],
            [['agama_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRAgama::className(), 'targetAttribute' => ['agama_id' => 'agama_id']],
            [['golongan_darah_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRGolonganDarah::className(), 'targetAttribute' => ['golongan_darah_id' => 'golongan_darah_id']],
            [['jabatan_akademik_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRJabatanAkademik::className(), 'targetAttribute' => ['jabatan_akademik_id' => 'jabatan_akademik_id']],
            [['kabupaten_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRKabupaten::className(), 'targetAttribute' => ['kabupaten_id' => 'kabupaten_id']],
            [['ref_kbk_id'], 'exist', 'skipOnError' => true, 'targetClass' => InstProdi::className(), 'targetAttribute' => ['ref_kbk_id' => 'ref_kbk_id']],
            [['status_aktif_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRStatusAktifPegawai::className(), 'targetAttribute' => ['status_aktif_pegawai_id' => 'status_aktif_pegawai_id']],
            [['status_ikatan_kerja_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRStatusIkatanKerjaPegawai::className(), 'targetAttribute' => ['status_ikatan_kerja_pegawai_id' => 'status_ikatan_kerja_pegawai_id']],
            [['status_marital_id'], 'exist', 'skipOnError' => true, 'targetClass' => MrefRStatusMarital::className(), 'targetAttribute' => ['status_marital_id' => 'status_marital_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysxUser::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'profile_old_id' => 'Profile Old ID',
            'nama' => 'Nama',
            'user_name' => 'User Name',
            'nip' => 'Nip',
            'kpt_no' => 'Kpt No',
            'kbk_id' => 'Kbk ID',
            'ref_kbk_id' => 'Ref Kbk ID',
            'alias' => 'Alias',
            'posisi' => 'Posisi',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'agama_id' => 'Agama ID',
            'jenis_kelamin_id' => 'Jenis Kelamin ID',
            'golongan_darah_id' => 'Golongan Darah ID',
            'hp' => 'Hp',
            'telepon' => 'Telepon',
            'alamat' => 'Alamat',
            'alamat_libur' => 'Alamat Libur',
            'kecamatan' => 'Kecamatan',
            'kota' => 'Kota',
            'kabupaten_id' => 'Kabupaten ID',
            'kode_pos' => 'Kode Pos',
            'no_ktp' => 'No Ktp',
            'email' => 'Email',
            'ext_num' => 'Ext Num',
            'study_area_1' => 'Study Area 1',
            'study_area_2' => 'Study Area 2',
            'jabatan' => 'Jabatan',
            'jabatan_akademik_id' => 'Jabatan Akademik ID',
            'gbk_1' => 'Gbk 1',
            'gbk_2' => 'Gbk 2',
            'status_ikatan_kerja_pegawai_id' => 'Status Ikatan Kerja Pegawai ID',
            'status_akhir' => 'Status Akhir',
            'status_aktif_pegawai_id' => 'Status Aktif Pegawai ID',
            'tanggal_masuk' => 'Tanggal Masuk',
            'tanggal_keluar' => 'Tanggal Keluar',
            'nama_bapak' => 'Nama Bapak',
            'nama_ibu' => 'Nama Ibu',
            'status' => 'Status',
            'status_marital_id' => 'Status Marital ID',
            'nama_p' => 'Nama P',
            'tgl_lahir_p' => 'Tgl Lahir P',
            'tmp_lahir_p' => 'Tmp Lahir P',
            'pekerjaan_ortu' => 'Pekerjaan Ortu',
            'user_id' => 'User ID',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


        

//     public function getAdakPenugasanPengajarans()
//     {
//         return $this->hasMany(AdakPenugasanPengajaran::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAdakRegistrasis()
//     {
//         return $this->hasMany(AdakRegistrasi::className(), ['dosen_wali_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmIzinBermalams()
//     {
//         return $this->hasMany(AskmIzinBermalam::className(), ['keasramaan_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmIzinKeluars()
//     {
//         return $this->hasMany(AskmIzinKeluar::className(), ['dosen_wali_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmIzinKeluars0()
//     {
//         return $this->hasMany(AskmIzinKeluar::className(), ['keasramaan_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmIzinKeluars1()
//     {
//         return $this->hasMany(AskmIzinKeluar::className(), ['baak_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmIzinKolaboratifs()
//     {
//         return $this->hasMany(AskmIzinKolaboratif::className(), ['baak_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmIzinRuangans()
//     {
//         return $this->hasMany(AskmIzinRuangan::className(), ['baak_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAskmKeasramaans()
//     {
//         return $this->hasMany(AskmKeasramaan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getBaakKaosDels()
//     {
//         return $this->hasMany(BaakKaosDel::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getBaakKartuTandaMahasiswas()
//     {
//         return $this->hasMany(BaakKartuTandaMahasiswa::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getBaakSuratLombas()
//     {
//         return $this->hasMany(BaakSuratLomba::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getBaakSuratMagangs()
//     {
//         return $this->hasMany(BaakSuratMagang::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getBaakSuratMahasiswaAktifs()
//     {
//         return $this->hasMany(BaakSuratMahasiswaAktif::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getBaakSuratPengantarProyeks()
//     {
//         return $this->hasMany(BaakSuratPengantarProyek::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getCistPermohonanCutiNontahunans()
//     {
//         return $this->hasMany(CistPermohonanCutiNontahunan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getCistPermohonanCutiTahunans()
//     {
//         return $this->hasMany(CistPermohonanCutiTahunan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getCistPermohonanIzins()
//     {
//         return $this->hasMany(CistPermohonanIzin::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getCistRKuotaCutiTahunans()
//     {
//         return $this->hasMany(CistRKuotaCutiTahunan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getCistSuratTugas()
//     {
//         return $this->hasMany(CistSuratTugas::className(), ['perequest' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getCistSuratTugasAssignees()
//     {
//         return $this->hasMany(CistSuratTugasAssignee::className(), ['id_pegawai' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getHrdxDosens()
//     {
//         return $this->hasMany(HrdxDosen::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getJenisKelamin()
//     {
//         return $this->hasOne(MrefRJenisKelamin::className(), ['jenis_kelamin_id' => 'jenis_kelamin_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getAgama()
//     {
//         return $this->hasOne(MrefRAgama::className(), ['agama_id' => 'agama_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getGolonganDarah()
//     {
//         return $this->hasOne(MrefRGolonganDarah::className(), ['golongan_darah_id' => 'golongan_darah_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getJabatanAkademik()
//     {
//         return $this->hasOne(MrefRJabatanAkademik::className(), ['jabatan_akademik_id' => 'jabatan_akademik_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getKabupaten()
//     {
//         return $this->hasOne(MrefRKabupaten::className(), ['kabupaten_id' => 'kabupaten_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getRefKbk()
//     {
//         return $this->hasOne(InstProdi::className(), ['ref_kbk_id' => 'ref_kbk_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getStatusAktifPegawai()
//     {
//         return $this->hasOne(MrefRStatusAktifPegawai::className(), ['status_aktif_pegawai_id' => 'status_aktif_pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getStatusIkatanKerjaPegawai()
//     {
//         return $this->hasOne(MrefRStatusIkatanKerjaPegawai::className(), ['status_ikatan_kerja_pegawai_id' => 'status_ikatan_kerja_pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getStatusMarital()
//     {
//         return $this->hasOne(MrefRStatusMarital::className(), ['status_marital_id' => 'status_marital_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getUser()
//     {
//         return $this->hasOne(SysxUser::className(), ['user_id' => 'user_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getHrdxPengajars()
//     {
//         return $this->hasMany(HrdxPengajar::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getHrdxRiwayatPendidikans()
//     {
//         return $this->hasMany(HrdxRiwayatPendidikan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getHrdxStafs()
//     {
//         return $this->hasMany(HrdxStaf::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getInstPejabats()
//     {
//         return $this->hasMany(InstPejabat::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getInvtPicBarangs()
//     {
//         return $this->hasMany(InvtPicBarang::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getKolbBukus()
//     {
//         return $this->hasMany(KolbBuku::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getKolbKomponens()
//     {
//         return $this->hasMany(KolbKomponen::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getKolbPenilais()
//     {
//         return $this->hasMany(KolbPenilai::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getKolbPenulis()
//     {
//         return $this->hasMany(KolbPenulis::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getLabxPemesanans()
//     {
//         return $this->hasMany(LabxPemesanan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getLabxPeminjamen()
//     {
//         return $this->hasMany(LabxPeminjaman::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getLabxPenambahanStokAlats()
//     {
//         return $this->hasMany(LabxPenambahanStokAlat::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getLabxPenambahanStokBahans()
//     {
//         return $this->hasMany(LabxPenambahanStokBahan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getLppmTLogreviews()
//     {
//         return $this->hasMany(LppmTLogreview::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getLppmTPublikasis()
//     {
//         return $this->hasMany(LppmTPublikasi::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getPrklCourseUnits()
//     {
//         return $this->hasMany(PrklCourseUnit::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getPrklKrsMhs()
//     {
//         return $this->hasMany(PrklKrsMhs::className(), ['approved_by' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getSchlKemahasiswaans()
//     {
//         return $this->hasMany(SchlKemahasiswaan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getUbuxDataPakets()
//     {
//         return $this->hasMany(UbuxDataPaket::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getUbuxPemakaianKendaraans()
//     {
//         return $this->hasMany(UbuxPemakaianKendaraan::className(), ['pegawai_id' => 'pegawai_id']);
//     }

//     /**
//      * @return \yii\db\ActiveQuery
//      */
//     public function getUbuxSupirs()
//     {
//         return $this->hasMany(UbuxSupir::className(), ['pegawai_id' => 'pegawai_id']);
//     }
// }
