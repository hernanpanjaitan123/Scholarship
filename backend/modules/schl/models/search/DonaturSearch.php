<?php

namespace backend\modules\schl\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\schl\models\Donatur;

/**
 * DonaturSearch represents the model behind the search form about `backend\modules\schl\models\Donatur`.
 */
class DonaturSearch extends Donatur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['donatur_id', 'kd_pos_donatur', 'no_telp_donatur', 'deleted'], 'integer'],
            [['nama_donatur', 'alamat_donatur', 'alamat_email_donatur', 'alamat_situs_donatur', 'deleted_at', 'deleted_by', 'created_at', 'created_by', 'updated_by', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Donatur::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'donatur_id' => $this->donatur_id,
            // 'beasiswa_id' => $this->beasiswa_id,
            'kd_pos_donatur' => $this->kd_pos_donatur,
            'no_telp_donatur' => $this->no_telp_donatur,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama_donatur', $this->nama_donatur])
            ->andFilterWhere(['like', 'alamat_donatur', $this->alamat_donatur])
            ->andFilterWhere(['like', 'kd_pos_donatur', $this->kd_pos_donatur])
            ->andFilterWhere(['like', 'alamat_email_donatur', $this->alamat_email_donatur])
            ->andFilterWhere(['like', 'alamat_situs_donatur', $this->alamat_situs_donatur])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
