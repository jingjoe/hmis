<?php

namespace frontend\modules\sqlscript\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\sqlscript\models\Sqlscript;

/**
 * SqlscriptSearch represents the model behind the search form about `frontend\modules\sqlscript\models\Sqlscript`.
 */
class SqlscriptSearch extends Sqlscript
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sql_id', 'program_id', 'hits', 'created_by', 'updated_by'], 'integer'],
            [['sql_name', 'sql_script', 'files', 'create_date', 'modify_date'], 'safe'],
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
        $query = Sqlscript::find();

        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination'=>[
            'pageSize'=>5 //แบ่งหน้า
        ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'sql_id' => $this->sql_id,
            'program_id' => $this->program_id,
            'hits' => $this->hits,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'sql_name', $this->sql_name])
            ->andFilterWhere(['like', 'sql_script', $this->sql_script])
            ->andFilterWhere(['like', 'files', $this->files]);

        return $dataProvider;
    }
}
