<?php

namespace frontend\controllers;

use app\models\Productos;
use frontend\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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
     * Lists all Productos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
     * @param int $productoid Productoid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($productoid)
    {
        return $this->render('view', [
            'model' => $this->findModel($productoid),
        ]);
    }

    /**
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Productos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'productoid' => $model->productoid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $productoid Productoid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($productoid)
    {
        $model = $this->findModel($productoid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'productoid' => $model->productoid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $productoid Productoid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($productoid)
    {
        $this->findModel($productoid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $productoid Productoid
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($productoid)
    {
        if (($model = Productos::findOne(['productoid' => $productoid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
