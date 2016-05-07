<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Manuscript;

/**
 * ManuscriptSearch represents the model behind the search form about `backend\models\Manuscript`.
 */
class ManuscriptSearch extends Manuscript
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_origin', 'is_pub', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['title', 'author', 'labels', 'intro', 'content'], 'safe'],
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
        $query = Manuscript::find();

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
            'id' => $this->id,
            'is_origin' => $this->is_origin,
            'is_pub' => $this->is_pub,
            'is_del' => $this->is_del,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'labels', $this->labels])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
