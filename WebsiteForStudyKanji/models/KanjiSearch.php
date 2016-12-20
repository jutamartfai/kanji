<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kanji;

/**
 * KanjiSearch represents the model behind the search form about `app\models\Kanji`.
 */
class KanjiSearch extends Kanji
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kanji_ch', 'kanji_no', 'kanji', 'meaning', 'jp_pron', 'cn_pron', 'line_num', 'ex_vocab', 'how_to'], 'safe'],
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
        $query = Kanji::find();

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
        $query->andFilterWhere(['like', 'kanji_ch', $this->kanji_ch])
            ->andFilterWhere(['like', 'kanji_no', $this->kanji_no])
            ->andFilterWhere(['like', 'kanji', $this->kanji])
            ->andFilterWhere(['like', 'meaning', $this->meaning])
            ->andFilterWhere(['like', 'jp_pron', $this->jp_pron])
            ->andFilterWhere(['like', 'cn_pron', $this->cn_pron])
            ->andFilterWhere(['like', 'line_num', $this->line_num])
            ->andFilterWhere(['like', 'ex_vocab', $this->ex_vocab])
            ->andFilterWhere(['like', 'how_to', $this->how_to]);

        return $dataProvider;
    }
}
