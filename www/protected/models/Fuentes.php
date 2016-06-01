<?php

/**
 * This is the model class for table "fuentes".
 *
 * The followings are the available columns in table 'fuentes':
 * @property integer $web_id
 * @property string $web
 * @property string $fiable
 * @property string $url
 *
 * The followings are the available model relations:
 * @property OfertaTrabajo[] $ofertaTrabajos
 * @property Ofertas[] $ofertases
 */
class Fuentes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fuentes the static model class
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
		return 'fuentes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web', 'length', 'max'=>50),
			array('fiable', 'length', 'max'=>1),
			array('url', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_id, web, fiable, url', 'safe', 'on'=>'search'),
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
			'ofertaTrabajos' => array(self::HAS_MANY, 'OfertaTrabajo', 'web_id_id'),
			'ofertases' => array(self::HAS_MANY, 'Ofertas', 'web_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'web_id' => 'Web',
			'web' => 'Web',
			'fiable' => 'Fiable',
			'url' => 'Url',
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

		$criteria->compare('web_id',$this->web_id);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('fiable',$this->fiable,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}