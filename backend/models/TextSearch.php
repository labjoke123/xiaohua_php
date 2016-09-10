<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Text;

/**
 * TextSearch represents the model behind the search form about `backend\models\Text`.
 */
class TextSearch extends Text
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_id', 'is_origin', 'is_pub', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['text_sn', 'text_title', 'user_sn', 'text_author', 'text_labels', 'text_intro', 'text_content'], 'safe'],
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
        $query = Text::find();

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
            'text_id' => $this->text_id,
            'is_origin' => $this->is_origin,
            'is_pub' => $this->is_pub,
            'is_del' => $this->is_del,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'text_sn', $this->text_sn])
            ->andFilterWhere(['like', 'text_title', $this->text_title])
            ->andFilterWhere(['like', 'user_sn', $this->user_sn])
            ->andFilterWhere(['like', 'text_author', $this->text_author])
            ->andFilterWhere(['like', 'text_labels', $this->text_labels])
            ->andFilterWhere(['like', 'text_intro', $this->text_intro])
            ->andFilterWhere(['like', 'text_content', $this->text_content]);

        return $dataProvider;
    }
}
