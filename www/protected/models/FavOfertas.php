<?php

/**
 * This is the model class for table "fav_ofertas".
 *
 * The followings are the available columns in table 'fav_ofertas':
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $basura
 * @property integer $megusta
 * @property integer $link
 * @property integer $ver
 * @property string $id_oferta_trabajo
 * @property string $fecha_megusta
 * @property string $fecha_basura
 * @property string $fecha_link
 * @property string $fecha_ver
 *
 * The followings are the available model relations:
 * @property OfertaTrabajo $idOfertaTrabajo
 * @property TblUsers $idUsuario
 */
class FavOfertas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FavOfertas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function saveVerOferta($estado){
              try{ 
			    $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_ver=$hoy;
                $this->ver=$estado;
                $this->id_usuario=Yii::app()->user->id;
                $this->save();
             } catch (Exception $e) {
                 
             }
    }
    public function saveLinkOferta($estado){
             try{
				$dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_link=$hoy;
                $this->link=$estado;
                $this->id_usuario=Yii::app()->user->id;
                $this->save();
             } catch (Exception $e) {
                 
             }
    }
	public function saveFinalizadaOferta($estado){
             try{
			    $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_finalizada=$hoy;
                
				$this->finalizada=($this->finalizada==0)? 1:0;
                $this->id_usuario=Yii::app()->user->id;
                if ($this->save()){
				   return true;
				}
             } catch (Exception $e) {
                
             }
			 return false; 
    }
	public function saveAplicarOferta($estado){
             try{
			    $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_aplicar=$hoy;
                
				$this->aplicar=($this->aplicar==0)? 1:0;
                $this->id_usuario=Yii::app()->user->id;
                if ($this->save()){
				   return true;
				}
             } catch (Exception $e) {
                
             }
			 return false; 
    }
	public function saveEntrevistaOferta($estado){
             try{
			    $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_entrevista=$hoy;
            
				$this->entrevista=($this->entrevista==0)? 1:0;
                $this->id_usuario=Yii::app()->user->id;
                if ($this->save()){
				   return true;
				}
             } catch (Exception $e) {
                
             }
			 return false; 
    }
	 public function saveMegustaOferta($estado){
             try{
			    $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_megusta=$hoy;
                $this->megusta=($estado)? $estado: (($this->megusta==0)? 1:0);
				$this->basura=($this->megusta==0)? 1:0;
                $this->id_usuario=Yii::app()->user->id;
                if ($this->save()){
				   return true;
				}
             } catch (Exception $e) {
                
             }
			 return false; 
    }
    public function saveBasuraOferta($estado){
            try{
				$dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
				$hoy = $dateNow->format('Y-m-d H:i:s');
				$this->fecha_basura=$hoy;
                $this->basura=($estado)? $estado: (($this->basura==0)? 1:0);
				$this->megusta=($this->basura==0)? 1:0;
                $this->id_usuario=Yii::app()->user->id;
                if ($this->save()){
				   return true;
				}
				
              } catch (Exception $e) {
                 
             }
			 return false; 
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fav_ofertas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, basura, megusta, link, ver, aplicar,entrevista,finalizada', 'numerical', 'integerOnly'=>true),
			array('id_oferta_trabajo', 'length', 'max'=>20),
			//array('fecha_megusta, fecha_basura, fecha_link, fecha_ver', 'safe'),
			 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_usuario, basura, megusta, link, ver, id_oferta_trabajo,aplicar,entrevista,finalizada', 'safe', 'on'=>'search'), //, fecha_megusta, fecha_basura, fecha_link, fecha_ver
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idOfertaTrabajo' => array(self::BELONGS_TO, 'OfertaTrabajo', 'id_oferta_trabajo'),
			'idUsuario' => array(self::BELONGS_TO, 'TblUsers', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'basura' => 'Basura',
			'megusta' => 'Megusta',
			'link' => 'Link',
			'ver' => 'Ver',
			'aplicar' => 'Aplicar',
			'entrevista' => 'Entrevista',
			'finalizada' => 'Finalizada',
			'id_oferta_trabajo' => 'Id Oferta Trabajo',
			'fecha_megusta' => 'Fecha Megusta',
			'fecha_basura' => 'Fecha Basura',
			'fecha_link' => 'Fecha Link',
			'fecha_ver' => 'Fecha Ver',
			'fecha_aplicar' => 'Fecha Aplicar',
			'fecha_entrevista' => 'Fecha Entrevista',
			'fecha_finalizada' => 'Fecha Finalizada',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('basura',$this->basura);
		$criteria->compare('megusta',$this->megusta);
		$criteria->compare('link',$this->link);
		$criteria->compare('ver',$this->ver);
		$criteria->compare('id_oferta_trabajo',$this->id_oferta_trabajo,true);
		$criteria->compare('fecha_megusta',$this->fecha_megusta,true);
		$criteria->compare('fecha_basura',$this->fecha_basura,true);
		$criteria->compare('fecha_link',$this->fecha_link,true);
		$criteria->compare('fecha_ver',$this->fecha_ver,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}