<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\Request;

/**
 * SkillController implements the CRUD actions for Skill model.
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

    public function actionIndex()
    {
//        throw new NotFoundHttpException('The requested page does not exist.');
//        $searchModel = new SkillSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }
    public function actionUsers()
    {
        $auth=Yii::$app->authManager;
//        //创建权限
//        $a = $auth->createPermission('测试权限');
//        $a->description = '测试权限1';
//        $uid = Yii::$app->getRequest()->get('uid');
//        $allPermission = '';
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

        //将角色附给用户
        $items = ['role'=>'admin'];
        $role = $auth->createRole($items['role']);                //创建角色对象
        $user_id = 11;                                             //获取用户id，此处假设用户id=1
        $auth->assign($role, $user_id);                           //添加对应关系
    }
}
