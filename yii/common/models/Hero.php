<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hero".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $str
 * @property int $int
 * @property int $dex
 * @property int $hp
 * @property int $mp
 * @property int $min_atk
 * @property int $max_atk
 * @property double $def
 * @property int $dps
 * @property int $speed
 * @property string $pic
 */
class Hero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'str', 'int', 'dex', 'hp', 'mp', 'min_atk', 'max_atk', 'def', 'dps', 'speed'], 'required'],
            [['type', 'str', 'int', 'dex', 'hp', 'mp', 'min_atk', 'max_atk', 'dps', 'speed'], 'integer'],
            [['def'], 'number'],
            [['name', 'pic'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'str' => 'Str',
            'int' => 'Int',
            'dex' => 'Dex',
            'hp' => 'Hp',
            'mp' => 'Mp',
            'min_atk' => 'Min Atk',
            'max_atk' => 'Max Atk',
            'def' => 'Def',
            'dps' => 'Dps',
            'speed' => 'Speed',
            'pic' => 'Pic',
        ];
    }
}
