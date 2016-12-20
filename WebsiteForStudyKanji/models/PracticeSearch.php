<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Practice;

/**
 * PracticeSearch represents the model behind the search form about `app\models\Practice`.
 */
class PracticeSearch extends Practice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['practice_ch', 'practice_no', 'question', 'meaning', 'pron'], 'safe'],
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
        $query = Practice::find();

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
        $query->andFilterWhere(['like', 'practice_ch', $this->practice_ch])
            ->andFilterWhere(['like', 'practice_no', $this->practice_no])
            ->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'meaning', $this->meaning])
            ->andFilterWhere(['like', 'pron', $this->pron]);

        return $dataProvider;
    }
}
