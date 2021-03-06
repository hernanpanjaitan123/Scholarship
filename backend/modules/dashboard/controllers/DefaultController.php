<?php

namespace backend\modules\dashboard\controllers;

use yii\web\Controller;
use backend\modules\dashboard\models\TestForm;
use mPDF;
use PHPExcel;
use PHPExcel_Writer_Excel2007;
use backend\modules\admin\models\User;
use common\web\exceptions\JobException;
use backend\modules\schl\models\search\BeasiswaSearch;
use Yii;

class DefaultController extends Controller
{
    public function actionIndex()
    {   
        if (\Yii::$app->getUser()->isGuest) {
            return $this->redirect(['/user/login']);
        }
        $searchModel = new BeasiswaSearch();
        $model = new TestForm;
        if (\Yii::$app->request->isPost) {
           // $model->load(\Yii::$app->request->post());
            \Yii::$app->debugger->print_array($_FILES);
            $status = \Yii::$app->fileManager->saveAsLocalTemp();
            \Yii::$app->debugger->print_array($status, true);

            if($status->status == 'success'){
                // echo $status->fileinfo[0]['fileid'];
            }
            
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $user = User::findOne(1);
        // echo $user->isNewRecord;
        
        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}
