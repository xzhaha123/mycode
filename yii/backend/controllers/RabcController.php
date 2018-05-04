<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use backend\models\AuthItem;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\Request;
use backend\controllers;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;
use ReflectionObject;
use ReflectionProperty;
use yii\base\InvalidConfigException;

/**
 * SkillController implements the CRUD actions for Skill model.
 * @desc 权限管理模块
 */
class RabcController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @desc 权限管理首页
     * @return string
     */
    public function actionIndex()
    {
        $model = new AuthItem();
        if ($_POST) {//将权限分给角色
            $auth = Yii::$app->authManager;
            foreach ($_POST as $key => $value) {
                if ($key == '_csrf-backend') continue;
                $auth->removeChildren($auth->createRole($key));
                if (!is_array($value)) continue;
                foreach ($value as $v) {
                    $items = ['role' => $key, 'permission' => $v];
                    $parent = $auth->createRole($items['role']);
                    $child = $auth->createPermission($items['permission']);
                    $res = $auth->addChild($parent, $child);
                    if (!$res) return $this->asJson('false');
                }
            }
            Yii::$app->session->setFlash('success', '保存成功');
            return $this->asJson('ok');
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * @desc 分配权限
     */
    public function actionUsers()
    {
        $auth = Yii::$app->authManager;
        $model = new AuthItem();
        return $this->render('users',['model'=>$model]);
        /**
         * @imp 权限管理
         */
//        //创建权限
//        $a = $auth->createPermission('测试权限');
//        $a->description = '测试权限1';
//        $auth->add($a);
//
//        //创建角色
//        $name = 'admin';
//        $role = $auth->createRole($name);
//        $role->description = '创建了 ' . $name. ' 角色';
//        $auth->add($role);
//
//        //将权限分给角色
//        $items = ['role'=>'admin','permission'=>'测试权限'];
//        $parent = $auth->createRole($items['role']);                //创建角色对象
//        $child = $auth->createPermission($items['permission']);     //创建权限对象
//        $auth->addChild($parent, $child);                           //添加对应关系

//        //将角色附给用户
//        $items = ['role'=>'admin'];
//        $role = $auth->createRole($items['role']);                //创建角色对象
//        $user_id = 11;                                             //获取用户id，此处假设用户id=1
//        $auth->assign($role, $user_id);                           //添加对应关系
    }

    /**
     * @desc 初始化权限
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $basePath = Yii::$app->basePath . '\controllers';
        $dirhandle = opendir($basePath);
        $authItems = array();
        $authTask = array();
        $allItems = AuthItem::find()->where('type=2')->all();
        $allItems = ArrayHelper::getColumn($allItems, 'name');
        while (($file = readdir($dirhandle)) != NULL) {
            if (is_dir($basePath . '/' . $file)) {
                continue;
            }
            if (strpos($file, '.php')) {
                $_classname = substr($file, 0, -4);
                $classname = __NAMESPACE__ . '\\' . $_classname;
                $class = new $classname(1, $_classname);
                $function = get_class_methods($class);
                $classDesc = $this->getDescFromRefClass($classname);
                foreach ($function as $k => $v) {
                    if (substr($v, 0, 6) == 'action' && $v != 'actions') {
                        $methodDesc = $this->getDescFromRefClassMethod($classname, $v);
                        $itemName = strtolower($_classname . '_' . $v);
                        $permission = $auth->createPermission($itemName);
                        $permission->description = $methodDesc;
                        if (!in_array($itemName, $allItems)) {
                            $auth->add($permission);
                        } else {
                            $auth->update($itemName, $permission);
                        }
                    }
                }
            }
        }
        closedir($dirhandle);
        return $this->redirect(['index']);
    }

    public function getDescFromRefClass($classname)
    {
        $rc = new ReflectionClass($classname);
        $comment = $rc->getDocComment();
        preg_match("/@desc (.*)/", $comment, $matchs);
        $desc = isset($matchs[1]) ? $matchs[1] : '';
        return $desc;
    }

    public function getDescFromRefClassMethod($classname, $method)
    {
        $rc = new ReflectionMethod($classname, $method);
        $comment = $rc->getDocComment();
        preg_match("/@desc (.*)/", $comment, $matchs);
        $desc = isset($matchs[1]) ? $matchs[1] : '';
        return $desc;
    }
}
