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
 * BeasiswaController implements the CRUD actions for Beasiswa model.
 */
class BeasiswaController extends Controller
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
        $searchModel = new BeasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           
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

        $searchModel2 = new DimPendaftarSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $dataProvider2->query->andWhere(['beasiswa_id' => $id]);

        $searchModel3 = new DonaturSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);
        $dataProvider3->query->andWhere(['schl_donatur.donatur_id' => $id]);


        $searchModel4 = new BerkasBeasiswaSearch();
        $dataProvider4 = $searchModel4->search(Yii::$app->request->queryParams);
        $dataProvider4->query->andWhere(['beasiswa_id' => $id]);

        $status_request = Yii::$app->request->get('status_request_id');

        

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,
            'searchModel4' => $searchModel4,
            'dataProvider4' => $dataProvider4,
            'status_request_id' => $status_request, 
        ]);
    }

    /**
     * Creates a new Beasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Beasiswa();
        $dafdonatur = Donatur::find()->all(); 
        $dafdonatur = ArrayHelper::map($dafdonatur,'donatur_id','nama_donatur');
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->beasiswa_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dafdonatur' => $dafdonatur,
              
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
        $dafdonatur = Donatur::find()->all(); 
        $dafdonatur = ArrayHelper::map($dafdonatur,'donatur_id','nama_donatur');
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->beasiswa_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dafdonatur' => $dafdonatur,
              
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

    public function actionExportExcel($beasiswa_id)
    {
        $model = new DimPendaftarSearch();
        $beasiswa = Beasiswa::find()->where(['beasiswa_id' => $beasiswa_id])->one();

        $_PHPExcel = new PHPExcel();

        $year = date('Y');

        $_PHPExcel->getActiveSheet()->getCell('B1')->setValue('Institut Teknologi Del')->getStyle()->applyFromArray(
            array(
                'font' => array(
                    'size' => 11,'bold' => true,'color' => array(
                        'rgb' => '000000')
                ),
                'alignment' => array(
                    'horizontal' => 'left',
                )
            )
        );

        $_PHPExcel->getActiveSheet()->getCell('B2')->setValue('Daftar Pendaftar Beasiswa Tahun Ajaran '.$year.'/'.date('Y', strtotime('+ 365 days')))->getStyle()->applyFromArray(
            array(
                'font' => array(
                    'size' => 11,'bold' => true,'color' => array(
                        'rgb' => '000000')
                ),
                'alignment' => array(
                    'horizontal' => 'left',
                )
            )
        );

        $thead = 5;
        $digit = 1000;

        $_PHPExcel->getActiveSheet()->setAutoFilter('A5:F5');

        $_PHPExcel->getActiveSheet()->getStyle('A5:AP5')->applyFromArray(
            array(
                'font' => array(
                    'size' => 11,'bold' => true,'color' => array(
                        'rgb' => '000000')
                ),
                'alignment' => array(
                    'horizontal' => 'left',
                )
            )
        );

        $_PHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
        $_PHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
        $_PHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
      
 
        $_PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("6");
        $_PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("45");
        $_PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth("14");
     
       
        $_PHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$thead,'No');
        $_PHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$thead,'Nama Mahasiswa');
        $_PHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$thead,'NIM');

     

        foreach(range('A','AP') as $columnID)
        {
            $_PHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

     $data = $model->find()->all();
        $no = 1;
        $i = 1;

        foreach($data as $d){

            $_PHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$thead+$no,$i)->getDefaultStyle()->getAlignment()->applyFromArray(
                array(
                    'horizontal' => 'center',
                    'rotation'   => 0,
                    'wrap'       => TRUE
                )
            );
            $_PHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$thead+$no,$d->dim['nama'])->getDefaultStyle()->getAlignment()->applyFromArray(
                array(
                    'horizontal' => 'center',
                    'rotation'   => 0,
                    'wrap'          => TRUE
                )
            );
            $_PHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$thead+$no,$d->dim['nim'])->getDefaultStyle()->getAlignment()->applyFromArray(
                array(
                    'horizontal' => 'center',
                    'rotation'   => 0,
                    'wrap'          => TRUE
                )
            );
            
            
            

        }

        $_PHPExcel->getActiveSheet()->getCell('B3')->setValue('Beasiswa : '.$beasiswa->nama_beasiswa)->getStyle()->applyFromArray(
            array(
                'font' => array(
                    'size' => 11,'bold' => true,'color' => array(
                        'rgb' => '000000')
                ),
                'alignment' => array(
                    'horizontal' => 'left',
                )
            )
        );

        $_objWriter = PHPExcel_IOFactory::createWriter($_PHPExcel,'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data_Pendaftar_Beasiswa_'.$beasiswa->nama_beasiswa.'.xlsx"');
        $_objWriter->save('php://output');

    }


       




    


}
