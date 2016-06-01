<?php

class IdiomaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Idioma'),
		));
	}

	public function actionCreate() {
		$model = new Idioma;


		if (isset($_POST['Idioma'])) {
			$model->setAttributes($_POST['Idioma']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Idioma');


		if (isset($_POST['Idioma'])) {
			$model->setAttributes($_POST['Idioma']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Idioma')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Idioma');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Idioma('search');
		$model->unsetAttributes();

		if (isset($_GET['Idioma']))
			$model->setAttributes($_GET['Idioma']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}