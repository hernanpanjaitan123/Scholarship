<?php

namespace backend\modules\schl\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\schl\models\BerkasBeasiswa;

/**
 * BerkasBeasiswaSearch represents the model behind the search form about `backend\modules\schl\models\BerkasBeasiswa`.
 */
class BerkasBeasiswaSearch extends BerkasBeasiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berkas_beasiswa_id', 'beasiswa_id', 'deleted'], 'integer'],
            [['files', 'deleted_at', 'deleted_by', 'created_at', 'created_by', 'updated_by', 'updated_at'], 'safe'],
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
        $query = BerkasBeasiswa::find();

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
            'berkas_beasiswa_id' => $this->berkas_beasiswa_id,
            'beasiswa_id' => $this->beasiswa_id,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'files', $this->files])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
