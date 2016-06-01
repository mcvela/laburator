<?php

class OfertaTagsController extends Controller
{
	public function actionIndex()
	{
	    $ofertaTags = ofertaTags::model()->findAll();    
		$this->render('index',array(
            'ofertaTags' => $ofertaTags
        ));
	}

	/**
	 * Autocomplete for tag widget
	 */
	public function actionJson()
	{
		//header('Cache-Control: no-cache, must-revalidate');
		//header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		//header('Content-type: application/json');
	 
		//$this->layout = false;
		/*
		$tags=[];
		if(isset($_GET['tag'])){
			 
			$criteria=new CDbCriteria(array(
				'limit' => 10
			));
			 
			$criteria->addSearchCondition('tag', $_GET['tag']);
	 
			$tags = OfertaTags::model()->findAll($criteria);            
	 
			
		} 
		$this->render('json', array('tags' => $tags));
		*/
		$this->layout = false;
		$this->render('json');
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