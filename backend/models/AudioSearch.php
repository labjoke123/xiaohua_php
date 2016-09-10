<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Audio;

/**
 * AudioSearch represents the model behind the search form about `backend\models\Audio`.
 */
class AudioSearch extends Audio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['audio_id', 'is_origin', 'is_pub', 'is_del', 'create_time', 'update_time', 'audio_duration'], 'integer'],
            [['audio_sn', 'audio_name', 'audio_title', 'user_sn', 'text_sn', 'audio_type', 'audio_icon', 'audio_url', 'audio_intro'], 'safe'],
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
        $query = Audio::find();

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
            'audio_id' => $this->audio_id,
            'is_origin' => $this->is_origin,
            'is_pub' => $this->is_pub,
            'is_del' => $this->is_del,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'audio_duration' => $this->audio_duration,
        ]);

        $query->andFilterWhere(['like', 'audio_sn', $this->audio_sn])
            ->andFilterWhere(['like', 'audio_name', $this->audio_name])
            ->andFilterWhere(['like', 'audio_title', $this->audio_title])
            ->andFilterWhere(['like', 'user_sn', $this->user_sn])
            ->andFilterWhere(['like', 'text_sn', $this->text_sn])
            ->andFilterWhere(['like', 'audio_type', $this->audio_type])
            ->andFilterWhere(['like', 'audio_icon', $this->audio_icon])
            ->andFilterWhere(['like', 'audio_url', $this->audio_url])
            ->andFilterWhere(['like', 'audio_intro', $this->audio_intro]);

        return $dataProvider;
    }
}
