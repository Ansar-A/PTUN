<?php

namespace common\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id_unit
 * @property string $nama_unit
 *
 * @property User[] $users
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_unit'], 'required'],
            [['nama_unit'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unit' => 'Id Unit',
            'nama_unit' => 'Nama Unit',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['get_unit' => 'id_unit']);
    }
}
