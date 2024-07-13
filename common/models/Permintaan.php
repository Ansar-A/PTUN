<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "permintaan".
 *
 * @property int $id_permintaan
 * @property int $get_user
 * @property int $get_barang
 * @property int $jumlah
 * @property string $status_permintaan
 * @property string $tgl_permintaan
 *
 * @property StokBarang $getBarang
 * @property User $getUser
 */
class Permintaan extends \yii\db\ActiveRecord
{


    public $get_sisa_barang;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permintaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['get_user', 'get_barang', 'jumlah'], 'required'],
            [['get_user', 'get_barang', 'jumlah'], 'integer'],
            [['status_permintaan', 'ket'], 'string'],
            [['tgl_permintaan'], 'safe'],
            [['get_barang'], 'exist', 'skipOnError' => true, 'targetClass' => StokBarang::class, 'targetAttribute' => ['get_barang' => 'id_stok']],
            [['get_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['get_user' => 'id']],
            [['get_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBarang::class, 'targetAttribute' => ['get_jenis' => 'id_jenis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_permintaan' => 'Id Permintaan',
            'get_user' => 'Get User',
            'get_barang' => 'Get Barang',
            'get_jenis' => 'Get Jenis',
            'jumlah' => 'Jumlah',
            'ket' => 'Keterangan',
            'status_permintaan' => 'Status Permintaan',
            'tgl_permintaan' => 'Tgl Permintaan',
        ];
    }

    /**
     * Gets query for [[GetBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStokBarang()
    {
        return $this->hasOne(StokBarang::class, ['id_stok' => 'get_barang']);
    }
    public function getJenis()
    {
        return $this->hasOne(JenisBarang::class, ['id_jenis' => 'get_jenis']);
    }
    /**
     * Gets query for [[GetUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'get_user']);
    }
}
