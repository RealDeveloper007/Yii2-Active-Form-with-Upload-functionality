<?php

namespace app\controllers;

use Yii;
use app\models\Register;
use app\models\Registersearch;
use app\models\UploadForm;
use app\models\UploadMForm;
use app\models\User;
use app\models\UserImages;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
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
     * Lists all Register models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Registersearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Register model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'secondmodel' => $this->findSecondModel($id),
        ]);
    }

    /**
     * Creates a new Register model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Register();
        $Uploadmodel = new UploadForm();
        $Model = new User();

        if (Yii::$app->request->isPost) 
        {
            //print_r($_Files); die;
            $Uploadmodel->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->load(Yii::$app->request->post()))
            {
                if(isset($Uploadmodel->imageFile))
                {
                    $model->imageFile = $Uploadmodel->imageFile->name; 
                    $Uploadmodel->upload();
                }
                    $model->password_hash = $Model->setPassword($model->password_hash);
                    if($model->save()) 
                    {
                        //print_r($model->errors);
                         return $this->redirect(['user-images', 'id' => $model->id]);
                    }
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionUserImages($id)
    {
        return $this->render('secondcreate', [
            'model' => $this->findSecondModel($id),
        ]);
    } 
    
    public function actionInsertImages()
    {
        $model = new UserImages();
        $Rmodel = new Register();
        $Uploadmodel = new UploadForm();

        if (Yii::$app->request->isPost) 
        {
            //print_r($_FILES); die;
            $Uploadmodel->imageFile = UploadedFile::getInstance($model, 'images');
            if($model->load(Yii::$app->request->post()))
            {
                if(isset($Uploadmodel->imageFile))
                {
                    $model->images = $Uploadmodel->imageFile->name; 
                    $Uploadmodel->upload();
                }
                    if($model->save()) 
                    {
                        //print_r($model->errors);
                         return $this->redirect(['index']);
                    }
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Register model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $Uploadmodel = new UploadForm();
        $Model = new User();
        $ExistImage = Register::find()->select('imageFile')->where(['id'=>$id])->column();
        $Uploadmodel->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->load(Yii::$app->request->post())) 
        {
                if(isset($Uploadmodel->imageFile))
                   {
                        $model->imageFile = $Uploadmodel->imageFile->name; 
                        $Uploadmodel->upload();
                  } else {
                    $model->imageFile = $ExistImage[0];
                }
                    if($model->save()) 
                    {
                            return $this->redirect(['view', 'id' => $id]);
                    }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Register model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
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
     * Finds the Register model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Register the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Register::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    protected function findSecondModel($id)
    {
        $Model = new UserImages();
        if (($model = UserImages::findOne(['user_images_id'=>$id])) !== null) {
            return $model;
        } else {
            return $Model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
