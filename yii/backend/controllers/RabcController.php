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
        //创建权限
        $a = $auth->createPermission('测试权限');
        $a->description = '测试权限1';
        $uid = Yii::$app->getRequest()->get('uid');
        $allPermission = '';

        //创建角色
        $name = '系统管理员';
        $role = $auth->createRole($name);
        $role->description = '创建了 ' . $name. ' 角色';
        $auth->add($role);
    }
}
