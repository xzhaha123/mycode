<?php

namespace backend\models;

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
 */
class Skill extends \common\models\Skill
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
        ];
    }
}
