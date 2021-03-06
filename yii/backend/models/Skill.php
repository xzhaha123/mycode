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
            'hero_id' => '英雄名称',//ID
            'level' => '等级',
            'name' => '技能名称',
            'description' => '技能描述',
            'damage' => '伤害',
            'mana' => '法力消耗',
            'pic' => '图片',
        ];
    }

    //表关联
    public function getHero()
    {
        /**
         * @imp hasOne要求返回两个参数 第一个参数是关联表的类名 第二个参数是两张表的关联关系
         */
        return $this->hasOne(Hero::className(), ['id' => 'hero_id']);
    }

    //获取全部英雄
    public function getAllHeros()
    {
        return Hero::find()->all();
    }

}
