<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hotel;
use app\models\Country;

/**
 * HotelSearch represents the model behind the search form about `app\models\Hotel`.
 */
class HotelSearch extends Hotel
{
    public $country;
  
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_country', 'rate'], 'integer'],
            [['name', 'country'], 'safe'],
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
        $query = Hotel::find();//->innerJoin('country', ['id' => $this->id_country]);
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
/*
        $dataProvider->setSort([
            'id',
            'country' => [
                'asc' => ['country.name' => SORT_ASC],
                'desc' => ['country.name' => SORT_DESC],
                'label' => 'Country',
                'default' => SORT_ASC
            ],
        ]); */
        
        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['country']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_country' => $this->id_country,
            'rate' => $this->rate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->joinWith('country');

        $query->joinWith(['country' => function ($q) {
            $q->where('tbl_country.country_name LIKE "%' . $this->countryName . '%"');
          }]);
        
        return $dataProvider;
    }
}
