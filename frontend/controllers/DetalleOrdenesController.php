<?php

namespace frontend\controllers;

use app\models\DetalleOrdenes;
use frontend\models\DetalleOrdenesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleOrdenesController implements the CRUD actions for DetalleOrdenes model.
 */
class DetalleOrdenesController extends Controller
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
     * Lists all DetalleOrdenes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetalleOrdenesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetalleOrdenes model.
     * @param int $ordenid Ordenid
     * @param int $detalleid Detalleid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ordenid, $detalleid)
    {
        return $this->render('view', [
            'model' => $this->findModel($ordenid, $detalleid),
        ]);
    }

    /**
     * Creates a new DetalleOrdenes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($ordenid=null)
    {
        $model = new DetalleOrdenes();
        if($ordenid){
            $model->ordenid=$ordenid;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/ordenes/view', 'ordenid' => $model->ordenid,]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetalleOrdenes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ordenid Ordenid
     * @param int $detalleid Detalleid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ordenid, $detalleid)
    {
        $model = $this->findModel($ordenid, $detalleid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ordenid' => $model->ordenid, 'detalleid' => $model->detalleid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetalleOrdenes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ordenid Ordenid
     * @param int $detalleid Detalleid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ordenid, $detalleid)
    {
        $this->findModel($ordenid, $detalleid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetalleOrdenes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ordenid Ordenid
     * @param int $detalleid Detalleid
     * @return DetalleOrdenes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ordenid, $detalleid)
    {
        if (($model = DetalleOrdenes::findOne(['ordenid' => $ordenid, 'detalleid' => $detalleid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
