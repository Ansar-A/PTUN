<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jenis_barang".
 *
 * @property int $id_jenis
 * @property string $jenis_barang
 *
 * @property StokBarang[] $stokBarangs
 */
class JenisBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_barang'], 'required'],
            [['jenis_barang'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis' => 'Id Jenis',
            'jenis_barang' => 'Jenis Barang',
        ];
    }

    /**
     * Gets query for [[StokBarangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStokBarangs()
    {
        return $this->hasMany(StokBarang::class, ['get_jenis' => 'id_jenis']);
    }

    public function getPermintaan()
    {
        return $this->hasMany(Permintaan::class, ['get_jenis' => 'id_jenis']);
    }
    public function getPengajuan()
    {
        return $this->hasMany(Pengajuan::class, ['get_jenis' => 'id_jenis']);
    }
}
