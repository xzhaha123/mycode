<?php

namespace backend\controllers;

use Yii;
use backend\models\SysUser;
use backend\models\SysUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SysUserController implements the CRUD actions for SysUser model.
 * 后台用户模块
 */
class SysuserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
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
     * Lists all SysUser models.
     * @desc 后台用户首页
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SysUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SysUser model.
     * @desc 后台用户详情
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SysUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @desc 添加后台用户
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new \backend\models\SignupForm();

        // 如果是post提交且有对提交的数据校验成功（我们在SignupForm的signup方法进行了实现）
        // $model->load() 方法，实质是把post过来的数据赋值给model
        // $model->signup() 方法, 是我们要实现的具体的添加用户操作
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            /**
             * @imp 信息提示
             */
            Yii::$app->getSession()->setFlash('success', '注册成功');
            /**
             * @imp 页面跳转
             */
            return $this->redirect(['index']);
        }

        // 渲染添加新用户的表单
        return $this->render('sign_up', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SysUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @desc 更新后台用户
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', '修改成功');
//            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SysUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @desc 删除后台用户
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SysUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SysUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SysUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
