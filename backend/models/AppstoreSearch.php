<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Appstore;

/**
 * AppstoreSearch represents the model behind the search form about `common\models\Appstore`.
 */
class AppstoreSearch extends Appstore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'visit', 'created_by','updated_by'], 'integer'],
            [['name', 'detail','img', 'status', 'create_date', 'modify_date'], 'safe'],
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
        $query = Appstore::find();
        
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination'=>[
            'pageSize'=>5
        ]
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'visit' => $this->visit,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
               ->andFilterWhere(['like', 'detail', $this->detail])
               ->andFilterWhere(['like', 'img', $this->img])
               ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
    
}
