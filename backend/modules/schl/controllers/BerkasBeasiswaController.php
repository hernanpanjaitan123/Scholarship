<?php

namespace backend\modules\schl\controllers;

use Yii;
use backend\modules\schl\models\BerkasBeasiswa;
use backend\modules\schl\models\Beasiswa;

use backend\modules\schl\models\search\BerkasBeasiswaSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BerkasBeasiswaController implements the CRUD actions for BerkasBeasiswa model.
 */
class BerkasBeasiswaController extends Controller
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
     * Lists all BerkasBeasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BerkasBeasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BerkasBeasiswa model.
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
     * Creates a new BerkasBeasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new BerkasBeasiswa();

        if ($model->load(Yii::$app->request->post())) {

            
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);

            $model->files = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;

            $model->save();


            return $this->redirect(['beasiswa/view', 'id' => $model->beasiswa_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BerkasBeasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->berkas_beasiswa_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDownload($id){
        $model = $this->findModel($id);
        $file = $model->files;
        $path = Yii::getAlias('@webroot').'/'.$file;
        if(file_exists($path)){
            Yii::$app->response->sendFile($path);
        }else{
            $this->render('download404');
        }
    }

    /**
     * Deletes an existing BerkasBeasiswa model.
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
     * Finds the BerkasBeasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BerkasBeasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BerkasBeasiswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
