<?php

namespace backend\modules\schl\controllers;

use Yii;
use backend\modules\schl\models\Beasiswa;
use backend\modules\schl\models\BerkasBeasiswa;
use backend\modules\schl\models\Donatur;
use backend\modules\schl\models\Syarat;
use backend\modules\schl\models\Dim;
use backend\modules\schl\models\DimPendaftar;

use yii\helpers\ArrayHelper;
use backend\modules\schl\models\search\BeasiswaMahasiswaSearch;
use backend\modules\schl\models\search\BeasiswaSearch;
use backend\modules\schl\models\search\BerkasBeasiswaSearch;
use backend\modules\schl\models\search\DimPendaftarSearch;
use backend\modules\schl\models\search\DonaturSearch;
use backend\modules\schl\models\DimSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PHPExcel;
use PHPExcel_Writer_Excel2007;
use PHPExcel_IOFactory;
use mPDF;
use yii\helpers\Url;
use common\helpers\LinkHelper;

/**
 * BeasiswaMahasiswaController implements the CRUD actions for Beasiswa model.
 */
class BeasiswaMahasiswaController extends Controller
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
     * Lists all Beasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeasiswaMahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $searchModel2 = new DimPendaftarSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);


        $dataProvider->pagination = ['pageSize' => 5];

        $status_request = Yii::$app->request->get('status_request_id');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'status_request_id' => $status_request,
        ]);
    }

    /**
     * Displays a single Beasiswa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
        {

        $searchModel = new BeasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['schl_beasiswa.beasiswa_id' => $id]);

   

        


        $searchModel4 = new BerkasBeasiswaSearch();
        $dataProvider4 = $searchModel4->search(Yii::$app->request->queryParams);
        $dataProvider4->query->andWhere(['beasiswa_id' => $id]);

        

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
            'dataProvider4' => $dataProvider4, 
        ]);
    }

    /**
     * Creates a new Beasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Beasiswa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->beasiswa_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Beasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->beasiswa_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Beasiswa model.
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
     * Finds the Beasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Beasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Beasiswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actiondownload($id){
        $model = $this->findModel($id);
        $file = $model->files;
        $path = Yii::getAlias('@webroot').'/'.$file;
        if(file_exists($path)){
            Yii::$app->response->sendFile($path);
        }else{
            $this->render('download404');
        }
    }
}
