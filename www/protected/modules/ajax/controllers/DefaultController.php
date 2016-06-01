<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		
                echo CHtml::encode(print_r($_POST, true));
	}
        
        public function actionReqTest03() {
                echo "hola";
 	}
}