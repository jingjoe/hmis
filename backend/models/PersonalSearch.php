<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Personal;

/**
 * PersonalSearch represents the model behind the search form about `backend\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','created_by','updated_by'], 'integer'],
            [['pid', 'cid', 'pname_id', 'fname', 'lname', 'nickname', 'sex_id', 'age', 'religion_id', 'bloodgroup_id', 'marrystatus_id', 'birthdate', 'address1', 'address2', 'phone', 'email', 'line', 'facebook', 'skill', 'education_id', 'img', 'startwork_date', 'position_id', 'depart_group_id', 'depart_id', 'persontype_id','create_date', 'modify_date'], 'safe'],
            [['salary'], 'number']
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
        $query = Personal::find();

        
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination'=>[
            'pageSize'=> 10
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
            'birthdate' => $this->birthdate,
            'startwork_date' => $this->startwork_date,
            'salary' => $this->salary,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
        ]);

        $query->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'pname_id', $this->pname_id])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'sex_id', $this->sex_id])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'religion_id', $this->religion_id])
            ->andFilterWhere(['like', 'bloodgroup_id', $this->bloodgroup_id])
            ->andFilterWhere(['like', 'marrystatus_id', $this->marrystatus_id])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'line', $this->line])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'skill', $this->skill])
            ->andFilterWhere(['like', 'education_id', $this->education_id])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'position_id', $this->position_id])
            ->andFilterWhere(['like', 'depart_group_id', $this->depart_group_id])
            ->andFilterWhere(['like', 'depart_id', $this->depart_id])
            ->andFilterWhere(['like', 'persontype_id', $this->persontype_id]);

        return $dataProvider;
    }
}
