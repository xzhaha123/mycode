<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sys_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $type
 */
class SysUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'type'], 'required'],
            [['type'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'type' => 'Type',
        ];
    }
}
