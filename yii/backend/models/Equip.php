<?php

namespace backend\models;

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
class Equip extends \common\models\Equip
{
    public $imageFile;

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
            'pic' => '图片',
            'type' => '类型',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'description', 'mana', 'price', 'type'], 'required'],
            [['price'], 'integer'],
            [['name', 'description', 'pic'], 'string', 'max' => 255],
            [['level', 'mana', 'type'], 'integer', 'max' => 4],
            [['sid'], 'string', 'max' => 30],
            [['pic'], 'file', 'extensions' => 'jpg, png, jpeg', 'mimeTypes' => 'image/jpeg, image/png',],
        ];
    }
    public function upload(){
        $name = date('Ymd',time()). mt_rand(100000,999999) . '.' . $this->imageFile->extension;
        $res = $this->imageFile->saveAs('uploads/equip/' . $name);
        if ($res) $this->pic = $name;
        return $res;
    }
}
