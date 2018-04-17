<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property int $id
 * @property int $hero_id
 * @property int $level
 * @property string $name
 * @property string $description
 * @property int $damage
 * @property int $mana
 * @property string $pic
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hero_id', 'level', 'name', 'description', 'damage', 'mana'], 'required'],
            [['hero_id', 'damage', 'mana'], 'integer'],
            [['level'], 'string', 'max' => 4],
            [['name', 'description', 'pic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hero_id' => 'Hero ID',
            'level' => 'Level',
            'name' => 'Name',
            'description' => 'Description',
            'damage' => 'Damage',
            'mana' => 'Mana',
            'pic' => 'Pic',
        ];
    }
}
