<?php

namespace frontend\controllers;

use app\models\Clientes;
use frontend\models\ClientresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientesController implements the CRUD actions for Clientes model.
 */
class ClientesController extends Controller
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
     * Lists all Clientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClientresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clientes model.
     * @param int $clienteid ID del Cliente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($clienteid)
    {
        return $this->render('view', [
            'model' => $this->findModel($clienteid),
        ]);
    }

    /**
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Clientes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'clienteid' => $model->clienteid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $clienteid ID del Cliente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($clienteid)
    {
        $model = $this->findModel($clienteid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'clienteid' => $model->clienteid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $clienteid ID del Cliente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($clienteid)
    {
        $this->findModel($clienteid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $clienteid ID del Cliente
     * @return Clientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($clienteid)
    {
        if (($model = Clientes::findOne(['clienteid' => $clienteid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
