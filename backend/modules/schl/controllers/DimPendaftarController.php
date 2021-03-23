<?php

namespace backend\modules\schl\controllers;

use Yii;
use backend\modules\schl\models\DimPendaftar;
use backend\modules\schl\models\Beasiswa;
use backend\modules\schl\models\Dim;
use backend\modules\schl\models\User;
use backend\modules\schl\models\search\BeasiswaSearch;
use backend\modules\schl\models\search\DimPendaftarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use common\helpers\LinkHelper;
use yii\helpers\Url;

/**
 * DimPendaftarController implements the CRUD actions for DimPendaftar model.
 */
class DimPendaftarController extends Controller
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
     * Lists all DimPendaftar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DimPendaftarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DimPendaftar model.
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
     * Creates a new DimPendaftar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_beasiswa)
    {
        $model = new DimPendaftar();
        $beasiswa = Beasiswa::find()->where(['beasiswa_id' => $id_beasiswa])->one();

    if ($model->load(Yii::$app->request->post())) {
            $dim_pendaftar = DimPendaftar::find()->where('dim_id='.$model->dim_id)->andWhere('deleted!=1')->one();
            
            $model->save();
            \Yii::$app->messenger->addSuccessFlash("Pendaftar telah ditambahkan");
            return $this->redirect(['beasiswa/view/', 'id' => $id_beasiswa]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'beasiswa' => $beasiswa,
            ]);
        }
    }

    public function actionCreatebymahasiswa($id_beasiswa)
    {
        $model = new DimPendaftar();
        $beasiswa = Beasiswa::find()->where(['beasiswa_id' => $id_beasiswa])->one();
        $dim = Dim::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
        

    if ($model->load(Yii::$app->request->post())) {

            $model->dim_id = $dim['dim_id'];
      
            
            $model->save();
            \Yii::$app->messenger->addSuccessFlash("Anda Telah terdaftar");
            return $this->redirect(['/schl/beasiswa']);
        } else {
            return $this->render('createbymahasiswa', [
                'model' => $model,
               
            ]);
        }
    }

    /**
     * Updates an existing DimPendaftar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->dim_pendaftar_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DimPendaftar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    public function actionDelete($id, $id_beasiswa){
        $this->findModel($id)->Delete();
        \Yii::$app->messenger->addSuccessFlash("Pendaftar telah dihapus");

        return $this->redirect(['/schl/beasiswa/view', 'id' => $id_beasiswa]);

    }


  public function actionListMahasiswa($query){
        $data = [];
        $dims = Dim::find()
                    ->select('dim_id,nim,nama')
                    ->where('deleted!=1')
                    ->andWhere(['status_akhir' => 'Aktif'])
                    ->andWhere('nama LIKE :query')
                    ->orWhere('nim LIKE :query')
                    ->addParams([':query' => '%'.$query.'%'])
                    ->limit(10)
                    ->asArray()
                    ->all();
        foreach ($dims as $dim) {
            $dataValue = $dim['nama'] .' ('. $dim['nim'].')';
            $data []  = [
                            'value' => $dim['dim_id'],
                            'data' => $dataValue

                        ];
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        echo Json::encode($data);
    }


    /**
     * Finds the DimPendaftar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DimPendaftar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DimPendaftar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

        public function actionApprove($id)
    {
            $model = $this->findModel($id);

                 if ($model->status_request_id = 1) {
                     $model->status_request_id = 2;
                     $model->save();

                    \Yii::$app->messenger->addSuccessFlash("Request telah disetujui");
                    return $this->redirect(['/schl/beasiswa/index/'] );
                } else {
                    return $this->render('index', [
                        'model'=>$model
                    ]);
                }
    }

    public function actionReject($id)
    {
            $model = $this->findModel($id);

                 if ($model->status_request_id = 2) {
                     $model->status_request_id = 3;
                     $model->save();

                    \Yii::$app->messenger->addSuccessFlash("Request telah ditolak");
                    return $this->redirect(['index']);
                } else {
                    return $this->render('index', [
                        'model'=>$model
                    ]);
                }
    }
}
