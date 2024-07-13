<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JenisBarang;

/**
 * JenisBarangSearch represents the model behind the search form of `common\models\JenisBarang`.
 */
class JenisBarangSearch extends JenisBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis'], 'integer'],
            [['jenis_barang'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = JenisBarang::find();

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
            'id_jenis' => $this->id_jenis,
        ]);

        $query->andFilterWhere(['like', 'jenis_barang', $this->jenis_barang]);

        return $dataProvider;
    }
}
