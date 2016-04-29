<?php

namespace frontend\modules\workmember\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\workmember\models\Workmember;

/**
 * WorkrecordSearch represents the model behind the search form about `frontend\modules\workrecord\models\Workrecord`.
 */
class WorkmemberSearch extends Workmember
{
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'assign_id', 'personal_id', 'status_id'], 'integer'],
            [['globalSearch','name', 'detail', 'order_date', 'defined_date', 'create_date', 'modify_date'], 'safe'],
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
    
    public function search($params){
        $query = Workmember::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'name', $this->globalSearch])
              ->orFilterWhere(['like', 'status_id', $this->globalSearch])
              ->orFilterWhere(['like', 'detail', $this->globalSearch]);

        return $dataProvider;
    }
}
