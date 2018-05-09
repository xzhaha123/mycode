<?php

namespace backend\controllers;

use Yii;
use backend\models\Skill;
use backend\models\SkillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SkillController implements the CRUD actions for Skill model.
 * 技能模块
 */
class SkillController extends Controller
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
     * Lists all Skill models.
     * @desc 技能首页
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Skill model.
     * @desc 技能详情
     * @param $name
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sname)
    {
        $skill = $this->findModelByName($sname);
        return $this->render('view', [
            'model' => $skill[0],
            'skill' => $skill,
        ]);
    }

    /**
     * Creates a new Skill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @desc 添加技能
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Skill();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Skill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @desc 更新技能
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Skill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @desc 删除技能
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
     * Finds the Skill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Skill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Skill::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelByName($sname)
    {
        if (($model = Skill::find($sname)->where("name='$sname'")->all()) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
