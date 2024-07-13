<?php

namespace backend\controllers;

use common\models\Pengajuan;
use backend\models\PengajuanSearch;
use Dompdf\Dompdf;
use Dompdf\Options;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\Response;

/**
 * PengajuanController implements the CRUD actions for Pengajuan model.
 */
class PengajuanController extends Controller
{
    public function actionExportPdf($startDate, $endDate)
    {
        try {
            // Buat instansi baru dari model pencarian
            $searchModel = new PengajuanSearch();

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
            return Yii::$app->response->sendFile($pdfFile, 'Daftar_Pengajuan.pdf', ['inline' => true]);
        } catch (\Exception $e) {
            // Tangani exception, log, atau cetak pesan error
            Yii::error('Error exporting PDF: ' . $e->getMessage());
            throw $e; // Opsional: lempar kembali exception untuk analisis lebih lanjut
        }
    }


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
     * Lists all Pengajuan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengajuan model.
     * @param int $id_pengajuan Id Pengajuan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pengajuan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pengajuan),
        ]);
    }

    /**
     * Creates a new Pengajuan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pengajuan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pengajuan' => $model->id_pengajuan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengajuan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pengajuan Id Pengajuan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pengajuan)
    {
        $model = $this->findModel($id_pengajuan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pengajuan' => $model->id_pengajuan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengajuan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pengajuan Id Pengajuan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pengajuan)
    {
        $this->findModel($id_pengajuan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengajuan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pengajuan Id Pengajuan
     * @return Pengajuan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pengajuan)
    {
        if (($model = Pengajuan::findOne(['id_pengajuan' => $id_pengajuan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
