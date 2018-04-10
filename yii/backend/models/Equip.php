<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "equip".
 *
 * @property int $id
 * @property int $name
 * @property string $description
 * @property int $level
 * @property int $mana
 * @property int $price
 * @property int $pid 可升级成的物品id
 * @property int $sid 子物品id
 */
class Equip extends \common\models\Equip
{
    public static $typeList = [
        '0'=>'卷轴',
        '1'=>'装备',
    ];
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'description' => '物品描述',
            'level' => '等级',
            'mana' => '法力消耗',
            'price' => '价格',
            'pid' => 'Pid',
            'sid' => '合成物品',
        ];
    }
}
