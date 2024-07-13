<?php

namespace backend\controllers;

use common\models\StokBarang;
use backend\models\StokBarangSearch;
use Dompdf\Dompdf;
use Dompdf\Options;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;

/**
 * StokBarangController implements the CRUD actions for StokBarang model.
 */
class StokBarangController extends Controller
{
    public function actionExportPdf()
    {
        try {
            // Query semua data tanpa batasan tanggal
            $searchModel = new StokBarangSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            // Nonaktifkan penomoran halaman untuk ekspor
            $dataProvider->pagination = false;

            $content = $this->renderPartial('export', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

            // Tentukan nama file PDF
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

            return Yii::$app->response->sendFile($pdfFile, 'Stok_Barang.pdf', ['inline' => true]);
        } catch (\Exception $e) {
            // Tangani exception, log atau cetak pesan error
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
     * Lists all StokBarang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StokBarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StokBarang model.
     * @param int $id_stok Id Stok
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_stok)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_stok),
        ]);
    }

    /**
     * Creates a new StokBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StokBarang();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_stok' => $model->id_stok]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StokBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_stok Id Stok
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_stok)
    {
        $model = $this->findModel($id_stok);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_stok' => $model->id_stok]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StokBarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_stok Id Stok
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_stok)
    {
        $this->findModel($id_stok)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StokBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_stok Id Stok
     * @return StokBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_stok)
    {
        if (($model = StokBarang::findOne(['id_stok' => $id_stok])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id)
    {
        $stokBarangs = StokBarang::find()
            ->where(['get_jenis' => $id])
            ->all();

        $options = '';
        if ($stokBarangs) {
            foreach ($stokBarangs as $stokBarang) {
                $options .= "<option value='" . $stokBarang->id_stok . "' data-sisa='" . $stokBarang->sisa . "' data-satuan='" . $stokBarang->satuan . "'>" . $stokBarang->nama_barang . " (Sisa: " . $stokBarang->sisa . " " . $stokBarang->satuan . ") </option>";
            }
        } else {
            $options = "<option>-</option>";
        }

        echo $options;
    }
}
