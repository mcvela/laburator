<?php

class SearchController extends Controller
{
	public function actionIndex()
	{
            if (isset($_GET['OfertaTrabajo_page'])){
			  //$this->layout = false;
            }
            $dataProvider=null;	
            //$model = new OfertaTrabajo('search');
			 //$dataOfertas->pagination->pageSize=5;
            $srch1="";
            $srch2="";
			$conmegusta="0";
			$conbasura="0";
            $modelFavSearchId=false;
			$id_favserv="";
			
			$model = new OfertaTrabajo();
			$dataOfertas = $model->searchSinTags($_GET,array()); 
            $arrayOfertas = $dataOfertas->getData();
			
	        if (isset($_GET)){	 
                 if (isset($_GET['srch1'])){	
                     
                        Yii::trace('buscar='.$_GET['srch1']);
                        $srch1=str_replace(",", " & ", $_GET['srch1']);
                        $srch2=str_replace(",", " | ", $_GET['srch2']);
						$conmegusta=(isset($_GET['conmegusta']))? $_GET['conmegusta']:$conmegusta;
						$conbasura=(isset($_GET['conbasura']))? $_GET['conbasura']:$conbasura;
                     
                 }
            } 
           
		    $vistas=$model->listVistaLinkMegustaBasuraUsuario($arrayOfertas);
            
            $totalRegistros=$dataOfertas->getTotalItemCount();
             /////// Busqueda favorita
             if (isset($_GET['srch1'])){	
                        if (!Yii::app()->user->isGuest){
						  if (isset($_GET['id_favserv'])){
						     $modelFavSearch = FavSearch::model()->findByAttributes(array('fav_search_id' =>  $_GET['id_favserv'],
                                                                            'id_usuario' => Yii::app()->user->id,
                                                                     ));
						  }else{
                             $modelFavSearch = FavSearch::model()->findByAttributes(array('txt_search_1' =>  $_GET['srch1'],
                                                                            'txt_search_2' =>  $_GET['srch2'],
                                                                            'id_usuario' => Yii::app()->user->id,
                                                                     ));
						 }
                         if (count($modelFavSearch)>0){
							$dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
							$hoy = $dateNow->format('Y-m-d H:i:s');
							Yii::app()->db
							->createCommand("UPDATE fav_search SET fecha = :hoy , resultado=:resultado WHERE fav_search_id=:id")
							->bindValues(array(':id' => $modelFavSearch->fav_search_id, ':resultado' => $totalRegistros,':hoy'=>$hoy ))
							->execute();
							/*
						      $id_favserv=$modelFavSearch->fav_search_id;
                              $modelFavSearch->resultado=$totalRegistros;
							  $modelFavSearch->fecha= new CDbExpression('NOW()');
                              $modelFavSearch->save();
							  */
                              $modelFavSearchId=true;
                         }
                        }
             }
			 
			
			
            $this->render('busquedaMain', array('dataProvider' => $dataProvider,'dataOfertas' => $dataOfertas,'conbasura'=>$conbasura,'conmegusta'=>$conmegusta,
                'srch1'=>$srch1,'id_favserv'=>$id_favserv,
                'srch2'=>$srch2,'vistas'=>$vistas,'modelFavSearchId'=>$modelFavSearchId,'result'=>$totalRegistros));
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