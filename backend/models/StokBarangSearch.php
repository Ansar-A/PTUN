<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StokBarang;

/**
 * StokBarangSearch represents the model behind the search form of `common\models\StokBarang`.
 */
class StokBarangSearch extends StokBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stok', 'stok', 'sisa',  'get_jenis'], 'integer'],
            [['kode', 'nama_barang', 'satuan', 'tgl_pembuatan'], 'safe'],
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
        $query = StokBarang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_stok' => $this->id_stok,
            'stok' => $this->stok,

            'sisa' => $this->sisa,
            'tgl_pembuatan' => $this->tgl_pembuatan,
            'get_jenis' => $this->get_jenis,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
