<?php

namespace app\controllers;

use app\models\Other;
use app\models\RoomList;
use DateTime;
use Yii;
use app\models\RoomGuide;
use app\models\search\RoomGuideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomGuideController implements the CRUD actions for RoomGuide model.
 */
class RoomGuideController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all RoomGuide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomGuideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (!Yii::$app->user->isGuest) {
            $dataProvider = $searchModel->searchForAdmin(Yii::$app->request->queryParams);
            return $this->render('index-admin', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Book the apartment
     * @param $id
     * @return string
     * @throws \Exception
     */
    public function actionBook($id)
    {
        $model_list = new RoomList();
        if ($model_list->load(Yii::$app->request->post())) {
            $model_list->room_id = $id;
            $model_list->booked_days = (new Other())->getDaysBetween2Dates(new DateTime ($model_list->date_to), new DateTime ($model_list->date_from), false);
            // проверим, что никто не забронировал до сих пор этот номер
            $ifBooked = RoomList::find()->where(['>', 'date_to', date('Y-m-d')])->asArray()->all();
            if($model_list->booked_days > 0 && empty($ifBooked)){
                if($model_list->save()){
                    Yii::$app->session->setFlash('book_success',"Номер успешно забронирован!");
                }
            }else{
                Yii::$app->session->setFlash('book_error',"Ошибка! Пожалуйста попробуйте еще раз");
            }
            return $this->redirect(['index']);
        }
        return $this->render('book', [
            'id_row' => $id,
            'model_list'=> $model_list
        ]);
    }

    /**
     * Displays a single RoomGuide model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RoomGuide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RoomGuide();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RoomGuide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RoomGuide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RoomGuide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoomGuide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoomGuide::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
