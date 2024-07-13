<?php

namespace backend\controllers;

use common\models\Permintaan;
use backend\models\PermintaanSearch;
use common\models\StokBarang;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\FileHelper;
use Dompdf\Dompdf;
use Dompdf\Options;
use Mpdf\Mpdf;
use yii\helpers\Html;
use yii\web\Response;

/**
 * PermintaanController implements the CRUD actions for Permintaan model.
 */
class PermintaanController extends Controller
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

    public function actionExportPdf($startDate, $endDate)
    {
        try {
            // Buat instansi baru dari model pencarian
            $searchModel = new PermintaanSearch();

            // Terapkan kriteria pencarian pada model
            $searchModel->startDate = $startDate;
            $searchModel->endDate = $endDate;

            // Ambil data berdasarkan kriteria pencarian
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            // Nonaktifkan paginasi untuk ekspor
            $dataProvider->pagination = false;

            // Render tampilan ekspor
            $content = $this->renderPartial('export', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

            // Tentukan jalur file PDF
            $pdfFile = Yii::getAlias('@runtime/pdf-export/') . 'export_' . time() . '.pdf';
            FileHelper::createDirectory(Yii::getAlias('@runtime/pdf-export'));

            // Gunakan dompdf untuk menghasilkan file PDF
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($content);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            file_put_contents($pdfFile, $dompdf->output());

            // Kirim file PDF yang dihasilkan sebagai respons
            return Yii::$app->response->sendFile($pdfFile, 'Daftar_Permintaan.pdf', ['inline' => true]);
        } catch (\Exception $e) {
            // Tangani exception, log, atau cetak pesan error
            Yii::error('Error exporting PDF: ' . $e->getMessage());
            throw $e; // Opsional: lempar kembali exception untuk analisis lebih lanjut
        }
    }
    /**
     * Lists all Permintaan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PermintaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Permintaan model.
     * @param int $id_permintaan Id Permintaan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_permintaan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_permintaan),
        ]);
    }

    /**
     * Creates a new Permintaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Permintaan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id_permintaan' => $model->id_permintaan]);
            }
        } else {
            $model->loadDefaultValues();
        }
        $model->status_permintaan = 'menunggu';
        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Permintaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_permintaan Id Permintaan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_permintaan)
    {
        $model = $this->findModel($id_permintaan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_permintaan' => $model->id_permintaan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Permintaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_permintaan Id Permintaan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_permintaan)
    {
        $this->findModel($id_permintaan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Permintaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_permintaan Id Permintaan
     * @return Permintaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_permintaan)
    {
        if (($model = Permintaan::findOne(['id_permintaan' => $id_permintaan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
