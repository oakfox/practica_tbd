<?php

namespace frontend\controllers;

use app\models\Ordenes;
use frontend\models\DetalleOrdenesSearch;
use frontend\models\OrdenesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdenesController implements the CRUD actions for Ordenes model.
 */
class OrdenesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Ordenes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrdenesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ordenes model.
     * @param int $ordenid Ordenid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ordenid)
    {
        $modelo=$this->findModel($ordenid);

        $searchModel = new DetalleOrdenesSearch();
        $searchModel->ordenid=$modelo->ordenid;
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('view', [
            'model' => $modelo,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Ordenes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($clienteid=null)
    {

        $model = new Ordenes();
        if($clienteid!=null){
            $model->clienteid=$clienteid;
        }

        $model->fechaorden=date("Y-m-d");

        $uordenid=Ordenes::findBySql("select ordenid from ordenes order by ordenid desc limit 1")->asArray()->one();
        $model->ordenid=$uordenid['ordenid'] + 1;


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ordenid' => $model->ordenid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ordenes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ordenid Ordenid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ordenid)
    {
        $model = $this->findModel($ordenid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ordenid' => $model->ordenid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ordenes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ordenid Ordenid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ordenid)
    {
        $this->findModel($ordenid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ordenes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ordenid Ordenid
     * @return Ordenes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ordenid)
    {
        if (($model = Ordenes::findOne(['ordenid' => $ordenid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
