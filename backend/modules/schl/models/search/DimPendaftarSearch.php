<?php

namespace backend\modules\schl\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\schl\models\DimPendaftar;
use backend\modules\schl\models\Beasiswa;

/**
 * DimPendaftarSearch represents the model behind the search form about `backend\modules\schl\models\DimPendaftar`.
 */
class DimPendaftarSearch extends DimPendaftar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dim_pendaftar_id', 'status_request_id', 'dim_id', 'beasiswa_id', 'deleted'], 'integer'],
            [['deleted_at', 'deleted_by', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = DimPendaftar::find();

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
            'dim_pendaftar_id' => $this->dim_pendaftar_id,
            'status_request_id' => $this->status_request_id,
            'dim_id' => $this->dim_id,
            'beasiswa_id' => $this->beasiswa_id,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'deleted_by', $this->deleted_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
