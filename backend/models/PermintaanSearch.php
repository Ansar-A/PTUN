<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Permintaan;
use Yii;

/**
 * PermintaanSearch represents the model behind the search form of `common\models\Permintaan`.
 */
class PermintaanSearch extends Permintaan
{
    public $startDate;
    public $endDate;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_permintaan', 'get_user', 'get_barang', 'get_jenis', 'jumlah'], 'integer'],
            [['status_permintaan', 'tgl_permintaan', 'startDate', 'endDate'], 'safe'],
            [['ket'], 'string']
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
        if (Yii::$app->user->identity->level === 'admin') {
            $query = Permintaan::find();
        } else {
            $query = Permintaan::find()->where(['get_user' => Yii::$app->user->identity->id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_permintaan' => $this->id_permintaan,
            'get_user' => $this->get_user,
            'get_barang' => $this->get_barang,
            'get_jenis' => $this->get_jenis,
            'jumlah' => $this->jumlah,
            'ket' => $this->ket,
            // 'tgl_permintaan' => $this->tgl_permintaan,
        ]);

        $query->andFilterWhere([
            'like', 'status_permintaan', $this->status_permintaan,
        ]);
        if ($this->startDate && $this->endDate) {
            $query->andFilterWhere(['between', 'tgl_permintaan', $this->startDate, $this->endDate]);
        }
        return $dataProvider;
    }
}
