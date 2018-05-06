<?php

namespace backend\models;

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
 */
class Hero extends \common\models\Hero
{
    public $heroType = [
        '0' => '力量英雄',
        '1' => '敏捷英雄',
        '2' => '智力英雄',
    ];

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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名字',
            'type' => '类型',
            'str' => '力量',
            'int' => '智力',
            'dex' => '敏捷',
            'hp' => '生命值',
            'mp' => '法力值',
            'min_atk' => '攻击最小值',
            'max_atk' => '攻击最大值',
            'def' => '护甲',
            'dps' => 'DPS',
            'speed' => '移速',
            'pic' => '图片',
        ];
    }

    public function getSkill()
    {
        return $this->hasMany(Skill::className(),['hero_id'=>'id'])->addGroupBy('name');//@imp根据名字合并 mysql5.7以上需关闭only_full_group_by
    }

    public function getSkills()
    {
        return $this->hasMany(Skill::className(),['hero_id'=>'id']);//不合并
    }
}
