<?php

namespace backend\modules\schl\controllers;

use Yii;
use backend\modules\schl\models\Donatur;
use backend\modules\schl\models\Beasiswa;
use backend\modules\schl\models\search\DonaturSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DonaturController implements the CRUD actions for Donatur model.
 */
class DonaturController extends Controller
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
        ];
    }

    /**
     * Lists all Donatur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonaturSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donatur model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Donatur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donatur();
        //  $dafbeasiswa = Beasiswa::find()->all(); 
        // $dafbeasiswa = ArrayHelper::map($dafbeasiswa,'beasiswa_id','nama_beasiswa');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->donatur_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                // 'dafbeasiswa' => $dafbeasiswa,
            ]);
        }
    }

    /**
     * Updates an existing Donatur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $dafbeasiswa = Beasiswa::find()->all(); 
        // $dafbeasiswa = ArrayHelper::map($dafbeasiswa,'beasiswa_id','nama_beasiswa');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->donatur_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                // 'dafbeasiswa' => $dafbeasiswa,
            ]);
        }
    }

    /**
     * Deletes an existing Donatur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donatur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donatur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donatur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
