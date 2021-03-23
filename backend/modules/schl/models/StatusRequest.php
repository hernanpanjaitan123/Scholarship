<?php

namespace backend\modules\schl\models;

use Yii;

/**
 * This is the model class for table "schl_r_status_request".
 *
 * @property integer $status_request_id
 * @property string $status_request
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property SchlDimBeasiswa[] $schlDimBeasiswas
 * @property SchlDimPendaftar[] $schlDimPendaftars
 */
class StatusRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schl_r_status_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_request_id', 'status_request'], 'required'],
            [['status_request_id', 'deleted'], 'integer'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['status_request'], 'string', 'max' => 45],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_request_id' => 'Status Request ID',
            'status_request' => 'Status Request',
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
    public function getSchlDimBeasiswas()
    {
        return $this->hasMany(SchlDimBeasiswa::className(), ['status_request_id' => 'status_request_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchlDimPendaftars()
    {
        return $this->hasMany(SchlDimPendaftar::className(), ['status_request_id' => 'status_request_id']);
    }
}
