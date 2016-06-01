<?php

/**
 * This is the model class for table "oferta_trabajo".
 *
 * The followings are the available columns in table 'oferta_trabajo':
 * @property string $id
 * @property string $version
 * @property string $categoria_id
 * @property string $direccion_id
 * @property string $empresa_id
 * @property string $fecha_publicacion
 * @property string $tmp_fecha
 * @property string $fiable
 * @property string $jornada_id
 * @property string $link_oferta
 * @property string $nombre_oferta
 * @property integer $numero_inscritos
 * @property string $oferta_id_web
 * @property string $pais_id
 * @property string $provincia_id
 * @property string $salario
 * @property string $texto_oferta
 * @property string $desc_oferta
 * @property string $contrato_id
 * @property string $tmp_jornada
 * @property string $tmp_provincia
 * @property string $tmp_localidad
 * @property string $tmp_salario
 * @property string $tmp_tipo_contrato
 * @property string $ver_empresa
 * @property integer $web_id_id
 * @property string $link_empresa
 * @property string $tmp_empresa
 * @property string $estado
 * @property string $fecha_estado
 * @property integer $tmp_experiencia
 * @property string $tmp_tags
 * @property integer $tmp_estudio_nivel
 * @property string $tmp_formacion
 * @property string $tmp_funciones
 * @property string $procesada
 * @property string $tmp_localidad_tratada
 * @property string $tmp_provincia_tratada
 * @property integer $sector_id
 * @property integer $categoria_nivel
 *
 * The followings are the available model relations:
 * @property Fuentes $webId
 */
class OfertaTrabajo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OfertaTrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oferta_trabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('version, fecha_publicacion, link_oferta, nombre_oferta, tmp_funciones', 'required'),
			array('numero_inscritos, web_id_id, tmp_experiencia, tmp_estudio_nivel, sector_id, categoria_nivel', 'numerical', 'integerOnly'=>true),
			array('version, categoria_id, direccion_id, empresa_id, jornada_id, pais_id, provincia_id, contrato_id', 'length', 'max'=>20),
			array('tmp_fecha, link_oferta, tmp_localidad, tmp_tags, tmp_formacion, tmp_funciones', 'length', 'max'=>256),
			array('fiable, ver_empresa, procesada', 'length', 'max'=>1),
			array('nombre_oferta, tmp_jornada, tmp_provincia, tmp_salario, tmp_tipo_contrato, tmp_empresa, estado', 'length', 'max'=>255),
			array('oferta_id_web, salario', 'length', 'max'=>50),
			array('tmp_localidad_tratada, tmp_provincia_tratada', 'length', 'max'=>100),
			array('texto_oferta, desc_oferta, link_empresa, fecha_estado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, version, categoria_id, direccion_id, empresa_id, fecha_publicacion, tmp_fecha, fiable, jornada_id, link_oferta, nombre_oferta, numero_inscritos, oferta_id_web, pais_id, provincia_id, salario, texto_oferta, desc_oferta, contrato_id, tmp_jornada, tmp_provincia, tmp_localidad, tmp_salario, tmp_tipo_contrato, ver_empresa, web_id_id, link_empresa, tmp_empresa, estado, fecha_estado, tmp_experiencia, tmp_tags, tmp_estudio_nivel, tmp_formacion, tmp_funciones, procesada, tmp_localidad_tratada, tmp_provincia_tratada, sector_id, categoria_nivel', 'safe', 'on'=>'search'),
		);
	}
        public function primaryKey(){
            return array('id');
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'webId' => array(self::BELONGS_TO, 'Fuentes', 'web_id_id'),
			//'id' => array(self::HAS_MANY, 'fav_ofertas', 'id'),
			 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'version' => 'Version',
			'categoria_id' => 'Categoria',
			'direccion_id' => 'Direccion',
			'empresa_id' => 'Empresa',
			'fecha_publicacion' => 'Fecha Publicacion',
			'tmp_fecha' => 'Tmp Fecha',
			'fiable' => 'Fiable',
			'jornada_id' => 'Jornada',
			'link_oferta' => 'Link Oferta',
			'nombre_oferta' => 'Nombre Oferta',
			'numero_inscritos' => 'Numero Inscritos',
			'oferta_id_web' => 'Oferta Id Web',
			'pais_id' => 'Pais',
			'provincia_id' => 'Provincia',
			'salario' => 'Salario',
			'texto_oferta' => 'Texto Oferta',
			'desc_oferta' => 'Desc Oferta',
			'contrato_id' => 'Contrato',
			'tmp_jornada' => 'Tmp Jornada',
			'tmp_provincia' => 'Tmp Provincia',
			'tmp_localidad' => 'Tmp Localidad',
			'tmp_salario' => 'Tmp Salario',
			'tmp_tipo_contrato' => 'Tmp Tipo Contrato',
			'ver_empresa' => 'Ver Empresa',
			'web_id_id' => 'Web Id',
			'link_empresa' => 'Link Empresa',
			'tmp_empresa' => 'Tmp Empresa',
			'estado' => 'Estado',
			'fecha_estado' => 'Fecha Estado',
			'tmp_experiencia' => 'Tmp Experiencia',
			'tmp_tags' => 'Tmp Tags',
			'tmp_estudio_nivel' => 'Tmp Estudio Nivel',
			'tmp_formacion' => 'Tmp Formacion',
			'tmp_funciones' => 'Tmp Funciones',
			'procesada' => 'Procesada',
			'tmp_localidad_tratada' => 'Tmp Localidad Tratada',
			'tmp_provincia_tratada' => 'Tmp Provincia Tratada',
			'sector_id' => 'Sector',
			'categoria_nivel' => 'Categoria Nivel',
		);
	}
        
		public function listVistaLinkMegustaBasuraUsuario($listaOfertas){
		    Yii::trace("..listVistaLinkMegustaBasuraUsuario..->lista=".sizeof($listaOfertas));
			$total=0;
		   $listInfo=array();
		   if (!Yii::app()->user->isGuest){
		             $listInfo["vista"]=0;
					 $listInfo["link"]=0;
					 $listInfo["megusta"]=0;
					 $listInfo["basura"]=0;
					 $listInfo["aplicar"]=0;
					 $listInfo["entrevista"]=0;
					 $listInfo["finalizada"]=0;
                foreach ( $listaOfertas  as $row) {
				     
				     $modelFavOfertas = FavOfertas::model()->findByAttributes(array('id_usuario' => Yii::app()->user->id,'id_oferta_trabajo' => $row->id));
					 if ($modelFavOfertas){
					     
						 $listInfo[$row->id]=$modelFavOfertas;
						 $listInfo[$row->id."-vista"]=($modelFavOfertas)? $modelFavOfertas->ver:0;
						 $listInfo[$row->id."-link"]=($modelFavOfertas)? $modelFavOfertas->link:0;
						 $listInfo[$row->id."-megusta"]=($modelFavOfertas)? $modelFavOfertas->megusta:0;
						 $listInfo[$row->id."-basura"]=($modelFavOfertas)? $modelFavOfertas->basura:0;
						 $listInfo[$row->id."-aplicar"]=($modelFavOfertas)? $modelFavOfertas->aplicar:0;
						 $listInfo[$row->id."-entrevista"]=($modelFavOfertas)? $modelFavOfertas->entrevista:0;
						 $listInfo[$row->id."-finalizada"]=($modelFavOfertas)? $modelFavOfertas->finalizada:0;
						 
						 $listInfo["vista"]=(isset($listInfo["vista"]))?  ($modelFavOfertas->ver>0 ? $listInfo["vista"]+1:$listInfo["vista"]):0;
						 $listInfo["link"]=(isset($listInfo["link"]))?  ($modelFavOfertas->link>0 ? $listInfo["link"]+1:$listInfo["link"]):0;
						 $listInfo["megusta"]=(isset($listInfo["megusta"]))?  ($modelFavOfertas->megusta>0 ? $listInfo["megusta"]+1:$listInfo["megusta"]):0;
						 $listInfo["basura"]=(isset($listInfo["basura"]))?  ($modelFavOfertas->basura>0 ? $listInfo["basura"]+1:$listInfo["basura"]):0;
						 $listInfo["aplicar"]=(isset($listInfo["aplicar"]))?  ($modelFavOfertas->aplicar>0 ? $listInfo["aplicar"]+1:$listInfo["aplicar"]):0;
						 $listInfo["entrevista"]=(isset($listInfo["entrevista"]))? ($modelFavOfertas->entrevista>0 ? $listInfo["entrevista"]+1:$listInfo["entrevista"]):0;
						 $listInfo["finalizada"]=(isset($listInfo["finalizada"]))?  ($modelFavOfertas->finalizada>0 ? $listInfo["finalizada"]+1:$listInfo["finalizada"]):0;
					 }
					 // Yii::trace("..listVistaLinkMegustaBasuraUsuario...megusta=".$modelFavOfertas->megusta );
					 $total++;
                } 
				$listInfo["total"]=$total;
            }
			return $listInfo;
		}
        /*
         *  Busqueda sin tag ni nada
         */
        public function searchSinTags($get,$paginacion)
		{
		
			$nombre_oferta=$this->nombre_oferta;
			$desc_oferta=$this->desc_oferta;
			$tmp_provincia=$this->tmp_provincia;
			 
		    if (isset($get)){	 
                 if (isset($get['srch1'])){
					$srch1=str_replace(",", " & ", $get['srch1']);
					$srch2=str_replace(",", " | ", $get['srch2']);
					$this->unsetAttributes();
					$this->nombre_oferta = $srch1;   // any filtering value that you want to apply
					$this->desc_oferta = $srch1;   // any filtering value that you want to apply
					$this->tmp_provincia =  $srch2;  
					
							
				}else  if (isset($get['search1'])){
				   Yii::trace("..Buscar por aqui....".$get['search1']);
					$this->nombre_oferta = $get['search1'];   // any filtering value that you want to apply
					$this->desc_oferta = $get['search1'];   // any filtering value that you want to apply
					$this->tmp_provincia =  $get['search2'];  
				}
			}
			
		    $nombre_oferta=str_replace(" ", "&", $this->nombre_oferta);
			$desc_oferta=str_replace(" ", "&", $this->desc_oferta);
			$tmp_provincia=str_replace(" ", "&", $this->tmp_provincia);			
            
                
            $criteria = Yii::app()->advancedFilters->createCriteria();
            $criteria->addAdvancedFilterCondition('nombre_oferta', $nombre_oferta,"OR");// Add an advanced filter condition using the description attribute
			$criteria->addAdvancedFilterCondition('desc_oferta', $desc_oferta,"OR");// Add an advanced filter condition using the description attribute
			$criteria->addAdvancedFilterCondition('tmp_provincia', $tmp_provincia,"AND");// Add an advanced filter condition using the description attribute
			if (isset($get['conmegusta']) && !Yii::app()->user->isGuest) {
			  if ($get['conmegusta']=="1" && $get['conbasura']=="1"){
 			    $criteria->join='JOIN fav_ofertas fv ON fv.id_oferta_trabajo = t.id and (fv.megusta=1 or fv.basura=1) and fv.id_usuario='.Yii::app()->user->id;
			  } else  if ($get['conmegusta']=="1"){
			    $criteria->join='JOIN fav_ofertas fv ON fv.id_oferta_trabajo = t.id and fv.megusta=1 and fv.id_usuario='.Yii::app()->user->id;
			  } else  if ($get['conbasura']=="1"){
			    $criteria->join='JOIN fav_ofertas fv ON fv.id_oferta_trabajo = t.id and fv.basura=1 and fv.id_usuario='.Yii::app()->user->id;
			  }
			
			}
			 
			 
			$result= new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				 'pagination'=>$paginacion,  
				'sort' => array(
				'defaultOrder' => 'fecha_publicacion DESC', 
				),
		));
            
            /////// Guardar la busquedad
             $model_log_acciones=new LogAcciones;
             $total=$result->getTotalItemCount();
             $model_log_acciones->busqueda="['q':'".$this->nombre_oferta."','d':'".$this->tmp_provincia."','r':".$total."]";
             $model_log_acciones->saveAccionSearchOferta();
             
            return $result;
        }
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		//$criteria=new CDbCriteria;
                $criteria = Yii::app()->advancedFilters->createCriteria();
 
		$criteria->compare('id',$this->id,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('categoria_id',$this->categoria_id,true);
		$criteria->compare('direccion_id',$this->direccion_id,true);
		$criteria->compare('empresa_id',$this->empresa_id,true);
		$criteria->compare('fecha_publicacion',$this->fecha_publicacion,true);
		$criteria->compare('tmp_fecha',$this->tmp_fecha,true);
		$criteria->compare('fiable',$this->fiable,true);
		$criteria->compare('jornada_id',$this->jornada_id,true);
		$criteria->compare('link_oferta',$this->link_oferta,true);
		//$criteria->compare('nombre_oferta',$this->nombre_oferta,true);
		
		$criteria->addAdvancedFilterCondition('nombre_oferta', $this->nombre_oferta,"OR");// Add an advanced filter condition using the description attribute
		
		$criteria->compare('numero_inscritos',$this->numero_inscritos);
		$criteria->compare('oferta_id_web',$this->oferta_id_web,true);
		$criteria->compare('pais_id',$this->pais_id,true);
		$criteria->compare('provincia_id',$this->provincia_id,true);
		$criteria->compare('salario',$this->salario,true);
		//$criteria->compare('texto_oferta',$this->texto_oferta,true);
		
		//$criteria->addAdvancedFilterCondition('texto_oferta', $this->texto_oferta,"OR");// Add an advanced filter condition using the description attribute
		
		//$criteria->compare('desc_oferta',$this->desc_oferta,true);
		
		$criteria->addAdvancedFilterCondition('desc_oferta', $this->desc_oferta,"OR");// Add an advanced filter condition using the description attribute
		
		$criteria->compare('contrato_id',$this->contrato_id,true);
		$criteria->compare('tmp_jornada',$this->tmp_jornada,true);
		//$criteria->compare('tmp_provincia',$this->tmp_provincia,true);
		
		$criteria->addAdvancedFilterCondition('tmp_provincia', $this->tmp_provincia,"AND");// Add an advanced filter condition using the description attribute
	 
		$criteria->compare('tmp_localidad',$this->tmp_localidad,true);
		$criteria->compare('tmp_salario',$this->tmp_salario,true);
		$criteria->compare('tmp_tipo_contrato',$this->tmp_tipo_contrato,true);
		$criteria->compare('ver_empresa',$this->ver_empresa,true);
		$criteria->compare('web_id_id',$this->web_id_id,true);
		$criteria->compare('link_empresa',$this->link_empresa,true);
		//$criteria->compare('tmp_empresa',$this->tmp_empresa,true);
		
		$criteria->addAdvancedFilterCondition('tmp_empresa', $this->tmp_empresa,"AND");// Add an advanced filter condition using the description attribute
	 
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_estado',$this->fecha_estado,true);
		$criteria->compare('tmp_experiencia',$this->tmp_experiencia);
		$criteria->compare('tmp_tags',$this->tmp_tags,true);
		$criteria->compare('tmp_estudio_nivel',$this->tmp_estudio_nivel);
		$criteria->compare('tmp_formacion',$this->tmp_formacion,true);
		$criteria->compare('tmp_funciones',$this->tmp_funciones,true);
		$criteria->compare('procesada',$this->procesada,true);
		$criteria->compare('tmp_localidad_tratada',$this->tmp_localidad_tratada,true);
		$criteria->compare('tmp_provincia_tratada',$this->tmp_provincia_tratada,true);
		$criteria->compare('sector_id',$this->sector_id);
		$criteria->compare('categoria_nivel',$this->categoria_nivel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
			'defaultOrder' => 'fecha_publicacion DESC', 
			),
		));
	}
}