<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property int $field_id
 * @property string $text
 * @property double $xPos
 * @property double $yPos
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_id'], 'integer'],
            [['xPos','yPos'],'double'],
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'ID поля',
            'text' => 'Текст',
            'xPos' => 'Координата по X',
            'yPos' => 'Координата по Y',
        ];
    }

}
