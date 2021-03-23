<?php

namespace backend\modules\schl\models;

use Yii;

/**
 * This is the model class for table "schl_dim_pendaftar".
 *
 * @property integer $dim_pendaftar_id
 * @property integer $status_request_id
 * @property integer $dim_id
 * @property integer $beasiswa_id
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property DimxDim $dim
 * @property SchlRStatusRequest $statusRequest
 * @property SchlBeasiswa $beasiswa
 */
class DimPendaftar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_dim_pendaftar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_request_id', 'dim_id', 'beasiswa_id', 'deleted'], 'integer'],
            [['beasiswa_id'], 'required'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            [['dim_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dim::className(), 'targetAttribute' => ['dim_id' => 'dim_id']],
            [['status_request_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusRequest::className(), 'targetAttribute' => ['status_request_id' => 'status_request_id']],
            [['beasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Beasiswa::className(), 'targetAttribute' => ['beasiswa_id' => 'beasiswa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dim_pendaftar_id' => 'Dim Pendaftar ID',
            'status_request_id' => 'Status Request ID',
            'dim_id' => 'Dim ID',
            'beasiswa_id' => 'Beasiswa',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDim()
    {
        return $this->hasOne(Dim::className(), ['dim_id' => 'dim_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusRequest()
    {
        return $this->hasOne(StatusRequest::className(), ['status_request_id' => 'status_request_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeasiswa()
    {
        return $this->hasOne(Beasiswa::className(), ['beasiswa_id' => 'beasiswa_id']);
    }
}
