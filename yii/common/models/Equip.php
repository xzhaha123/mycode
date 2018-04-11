<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equip".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $level
 * @property int $mana
 * @property int $price
 * @property string $sid 子物品id
 * @property int $type 类型-1-装备，0-卷轴
 * @property string $pic
 */
class Equip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'mana', 'price', 'type'], 'required'],
            [['price'], 'integer'],
            [['name', 'description', 'pic'], 'string', 'max' => 255],
            [['level', 'mana', 'type'], 'integer', 'max' => 4],
            [['sid'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'level' => 'Level',
            'mana' => 'Mana',
            'price' => 'Price',
            'sid' => 'Sid',
            'type' => 'Type',
            'pic' => 'Pic',
        ];
    }
}
