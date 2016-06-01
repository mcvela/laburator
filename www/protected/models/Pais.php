<?php

/**
 * This is the model class for table "pais".
 *
 * The followings are the available columns in table 'pais':
 * @property string $id
 * @property string $version
 * @property string $pais
 *
 * The followings are the available model relations:
 * @property BusquedaPais[] $busquedaPaises
 * @property Direccion[] $direccions
 * @property OfertaTrabajo[] $ofertaTrabajos
 * @property Provincia[] $provincias
 * @property Usuario[] $usuarios
 */
class Pais extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pais the static model class
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
		return 'pais';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('version, pais', 'required'),
			array('version', 'length', 'max'=>20),
			array('pais', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, version, pais', 'safe', 'on'=>'search'),
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
			'busquedaPaises' => array(self::HAS_MANY, 'BusquedaPais', 'pais_id'),
			'direccions' => array(self::HAS_MANY, 'Direccion', 'pais_id'),
			'ofertaTrabajos' => array(self::HAS_MANY, 'OfertaTrabajo', 'pais_id'),
			'provincias' => array(self::HAS_MANY, 'Provincia', 'pais_id'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'pais_id'),
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
			'pais' => 'Pais',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('pais',$this->pais,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}