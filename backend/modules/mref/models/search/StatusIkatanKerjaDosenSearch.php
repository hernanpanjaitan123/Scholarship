<?php

namespace backend\modules\mref\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\mref\models\StatusIkatanKerjaDosen;

/**
 * StatusIkatanKerjaDosenSearch represents the model behind the search form about `backend\modules\mref\models\StatusIkatanKerjaDosen`.
 */
class StatusIkatanKerjaDosenSearch extends StatusIkatanKerjaDosen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_ikatan_kerja_dosen_id'], 'integer'],
            [['nama', 'desc', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
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
        $query = StatusIkatanKerjaDosen::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'status_ikatan_kerja_dosen_id' => $this->status_ikatan_kerja_dosen_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
