<?php

namespace frontend\modules\labstore\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\labstore\models\Labstore;

/**
 * LabstoreSearch represents the model behind the search form about `frontend\modules\labstore\models\Labstore`.
 */
class LabstoreSearch extends Labstore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'visit', 'created_by', 'updated_by'], 'integer'],
            [['hn', 'lab_number', 'file', 'lab_group_id', 'note', 'create_date', 'modify_date'], 'safe'],
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
        $query = Labstore::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'lab_number', $this->lab_number])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'lab_group_id', $this->lab_group_id])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
