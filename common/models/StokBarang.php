<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stok_barang".
 *
 * @property int $id_stok
 * @property string $kode
 * @property string $nama_barang
 * @property string $satuan
 * @property int $stok

 * @property int $sisa
 * @property int $keterangan
 * @property int $get_jenis
 *
 * @property JenisBarang $getJenis
 * @property Pengajuan[] $pengajuans
 * @property Permintaan[] $permintaans
 */
class StokBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stok_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama_barang', 'satuan', 'stok', 'get_jenis'], 'required'],
            [['satuan'], 'string'],
          ['tgl_pembuatan', 'safe'],
            [['stok',  'sisa', 'get_jenis'], 'integer'],
            [['kode', 'nama_barang'], 'string', 'max' => 100],
            [['get_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBarang::class, 'targetAttribute' => ['get_jenis' => 'id_jenis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stok' => 'Id Stok',
            'kode' => 'Kode',
            'nama_barang' => 'Nama Barang',
            'satuan' => 'Satuan',
            'stok' => 'Stok',

            'sisa' => 'Sisa',
            'tgl_pembuatan' => 'Tanggal Input',
            'get_jenis' => 'Get Jenis',
        ];
    }

    /**
     * Gets query for [[GetJenis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(JenisBarang::class, ['id_jenis' => 'get_jenis']);
    }

    /**
     * Gets query for [[Pengajuans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::class, ['get_barang' => 'id_stok']);
    }

    /**
     * Gets query for [[Permintaans]].
     *
     * @return \yii\db\ActiveQuery
     */

    // Pada model StokBarang
    public function getPermintaans()
    {
        return $this->hasMany(Permintaan::class, ['get_barang' => 'id_stok']);
    }
}
