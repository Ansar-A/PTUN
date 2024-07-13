<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pengajuan;

/**
 * PengajuanSearch represents the model behind the search form of `common\models\Pengajuan`.
 */
class PengajuanSearch extends Pengajuan
{
    public $startDate;
    public $endDate;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengajuan', 'get_barang', 'jumlah', 'get_user'], 'integer'],
            [['tgl_pengajuan', 'startDate', 'endDate'], 'safe'],
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
        $query = Pengajuan::find();

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
            'id_pengajuan' => $this->id_pengajuan,
            'get_barang' => $this->get_barang,
            'jumlah' => $this->jumlah,
            'get_user' => $this->get_user,
            // 'tgl_pengajuan' => $this->tgl_pengajuan,
        ]);
        if ($this->startDate && $this->endDate) {
            $query->andFilterWhere(['between', 'tgl_pengajuan', $this->startDate, $this->endDate]);
        }
        return $dataProvider;
    }
}
