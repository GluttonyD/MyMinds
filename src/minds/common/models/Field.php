<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 */
class Field extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID пользователя',
            'name' => 'Название',
        ];
    }

    public function getCards(){
        return $this->hasMany(Card::className(),['field_id'=>'id']);
    }
}
