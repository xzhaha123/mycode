<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $type
 */
class SysUser extends \common\models\SysUser
{

    private $_user;
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
            'username' => '用户名',
            'password' => '密码',
            'type' => '账户类型',
        ];
    }

    public function validatePassword($password)
    {
        return $password == $this->password;
    }

}
