<?php

namespace backend\modules\schl\models;

use Yii;
use common\behaviors\TimestampBehavior;
use common\behaviors\BlameableBehavior;

/**
 * This is the model class for table "schl_berkas_beasiswa".
 *
 * @property integer $berkas_beasiswa_id
 * @property integer $beasiswa_id
 * @property string $files
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property SchlBeasiswa $beasiswa
 */
class BerkasBeasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'schl_berkas_beasiswa';
    }

    /**
     * @inheritdoc
     */

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

    public function rules()
    {
        return [
            [['beasiswa_id', 'deleted'], 'integer'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['files'], 'string', 'max' => 50],
            [['file'], 'file'],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            [['beasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Beasiswa::className(), 'targetAttribute' => ['beasiswa_id' => 'beasiswa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'berkas_beasiswa_id' => 'Berkas Beasiswa ID',
            'beasiswa_id' => 'Beasiswa',
            'file' => 'Berkas',
            'beasiswa.nama_beasiswa' => 'Nama Beasiswa',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeasiswa()
    {
        return $this->hasOne(Beasiswa::className(), ['beasiswa_id' => 'beasiswa_id']);
    }

    
}
