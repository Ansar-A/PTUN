<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pengajuan".
 *
 * @property int $id_pengajuan
 * @property int $get_barang
 * @property int $jumlah
 * @property int $get_user
 * @property string $tgl_pengajuan
 *
 * @property StokBarang $getBarang
 * @property User $getUser
 */
class Pengajuan extends \yii\db\ActiveRecord
{
    public $get_sisa_barang;
    public $get_satuan;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengajuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['get_barang', 'jumlah', 'get_user'], 'required'],
            [['get_barang', 'jumlah', 'get_user'], 'integer'],
            [['tgl_pengajuan'], 'safe'],
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
            'id_pengajuan' => 'Id Pengajuan',
            'get_barang' => 'Get Barang',
            'jumlah' => 'Jumlah',
            'get_user' => 'Get User',
            'get_jenis' => 'Get Jenis',
            'tgl_pengajuan' => 'Tgl Pengajuan',
        ];
    }

    /**
     * Gets query for [[GetBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(StokBarang::class, ['id_stok' => 'get_barang']);
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
