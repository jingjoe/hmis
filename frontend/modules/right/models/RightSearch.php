<?php

namespace frontend\modules\right\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\right\models\Right;

/**
 * RightSearch represents the model behind the search form about `frontend\modules\right\models\Right`.
 */
class RightSearch extends Right
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hn', 'cid', 'fullname', 'regdate', 'dateaffect', 'pttype_id'], 'safe'],
            [['pttype','create_date', 'modify_date'], 'safe'],
            [['created_by','updated_by'], 'integer']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Right::find();
        $query->joinWith(['pttype']);
        
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination'=>[
            'pageSize'=>10 //แบ่งหน้า
        ]
        ]);
            
    // สำหรับ coluumn pttype
        $dataProvider->sort->attributes['pttype'] = [
            'asc' => ['pttype.pttype_name' => SORT_ASC],
            'desc' => ['pttype.pttype_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'regdate' => $this->regdate,
            'dateaffect' => $this->dateaffect,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
            
        ]);

        $query ->andFilterWhere(['like', 'hn', $this->hn])
               ->andFilterWhere(['like', 'cid', $this->cid])
               ->andFilterWhere(['like', 'fullname', $this->fullname])
               ->andFilterWhere(['like', 'pttype_id', $this->pttype_id]);

        return $dataProvider;
    }
}
