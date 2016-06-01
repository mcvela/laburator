<?php

class TripasAdminController extends Controller
{
	public function actionIndex()
	{
	    if (Yii::app()->getModule('user')->isAdmin()==1){
	         $this->render('index');
			 
		 }else{	 
		     $volver = Yii::app()->getBaseUrl(true) ."/".Yii::t('strings','url_menu_login');
			 $this->redirect($volver);
		}
	}
	public function actionTotalUsuariosAjax()
	{
	   /// Todos los usuarios
	   $resultProfile = TblProfiles::model()->findAll();
	   $count = count($resultProfile);
	   // Usuarios de hoyr
	   /* $resultProfile = TblProfiles::model()->findAll(array(
        'condition'=>"DATE(t.timedate) = DATE(NOW()) AND cId=:cId ",
        'params'=>array(':cId'=>Yii::app()->user->id),
		);
		*/
	    $this->layout = false;
	     $this->render('totalUsuariosAjax', array(
			'totalUsuarios'=>$count)); 
	}
    public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','delete','totalUsuariosAjax'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}