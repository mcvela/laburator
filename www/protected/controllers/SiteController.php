<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
			  'oauth' => array(
				// the list of additional properties of this action is below
				'class'=>'ext.hoauth.HOAuthAction',
				// Yii alias for your user's model, or simply class name, when it already on yii's import path
				// default value of this property is: User
				'model' => 'User', 
				// map model attributes to attributes of user's social profile
				// model attribute => profile attribute
				// the list of avaible attributes is below
				'attributes' => array(
				  'email' => 'email',
				  'fname' => 'firstName',
				  'lname' => 'lastName',
				  'gender' => 'genderShort',
				  'birthday' => 'birthDate',
				  'photourl' => 'photourl',
				  // you can also specify additional values, 
				  // that will be applied to your model (eg. account activation status)
				  'acc_status' => 1,
				  'status' => 1,
				),
			  ),
			  // this is an admin action that will help you to configure HybridAuth 
			  // (you must delete this action, when you'll be ready with configuration, or 
			  // specify rules for admin role. User shouldn't have access to this action!)
			  'oauthadmin' => array(
				'class'=>'ext.hoauth.HOAuthAdminAction',
			  ),
			  // captcha action renders the CAPTCHA image displayed on the contact page
					'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
					),
					// page action renders "static" pages stored under 'protected/views/site/pages'
					// They can be accessed via: index.php?r=site/page&view=FileName
					'page'=>array(
						'class'=>'CViewAction',
					),
        );
    }
	
	 

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new OfertaTrabajo('search');
          /*  $model->unsetAttributes();
            $model->nombre_oferta = Yii::app()->getRequest()->getQuery('srch');   // any filtering value that you want to apply
	        $model->desc_oferta = Yii::app()->getRequest()->getQuery('srch');   // any filtering value that you want to apply
			$model->texto_oferta = Yii::app()->getRequest()->getQuery('srch');   // any filtering value that you want to apply
			$model->tmp_provincia = Yii::app()->getRequest()->getQuery('srch');   // any filtering value that you want to apply
			$model->tmp_empresa = Yii::app()->getRequest()->getQuery('srch');   // any filtering value that you want to apply
	     */
        $dataOfertas = $model->search(); 
		$dataOfertas->pagination->pageSize=5;
		$this->render('index', array('dataOfertas' => $dataOfertas));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the about page
	 */
	public function actionAbout()
	{
	   $model="";
	   $this->render('about',array('model'=>$model));
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/*
     * Proporcionar las páginas web estáticas que no se generan bases de datos
     *
     * Cada elemento de la matriz representa una página y debe ser una matriz de
     * 'Loc', claves 'prioritarios' 'frecuencia' y
     * 
     * return array []
     */ 
    public function getBaseSitePageList ( ) {
 
        $list = array ( 
                    array ( 
                        ' loc ' => Yii :: app ( ) -> createAbsoluteUrl ( ' / ' ) ,
                         ' frequency ' => ' weekly ' ,
                         ' priority ' => ' 1 ' ,
                         ) ,
                     array ( 
                        ' loc ' => Yii :: app ( ) -> createAbsoluteUrl ( ' /site/contact ' ) ,
                         ' frequency ' => ' yearly ' ,
                         ' priority ' => ' 0.8 ' ,
                         ) ,
                     array ( 
                        ' loc ' => Yii :: app ( ) -> createAbsoluteUrl ( ' /site/page ' , array ( ' view ' => ' about ' ) ) ,
                         ' frequency ' => ' monthly ' ,
                         ' priority ' => ' 0.8 ' ,
                         ) ,
                     array ( 
                        ' loc ' => Yii :: app ( ) -> createAbsoluteUrl ( ' /site/page ' , array ( ' view ' => ' privacy ' ) ) ,
                         ' frequency ' => ' yearly ' ,
                         ' priority ' => ' 0.3 ' ,
                         ) ,
                 ) ;
         return  $list ;
     }
}