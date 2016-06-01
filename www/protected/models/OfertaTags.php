<?php

/**
 * This is the model class for table "oferta_tags".
 *
 * The followings are the available columns in table 'oferta_tags':
 * @property integer $oferta_id
 * @property integer $cualificacion_id
 * @property string $tag
 */
class OfertaTags extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OfertaTags the static model class
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
		return 'oferta_tags';
	}
	public function getTag()
	{
		return __CLASS__;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('oferta_id, cualificacion_id', 'required'),
			array('oferta_id, cualificacion_id', 'numerical', 'integerOnly'=>true),
			array('tag', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('oferta_id, cualificacion_id, tag', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'oferta_id' => 'Oferta',
			'cualificacion_id' => 'Cualificacion',
			'tag' => 'Tag',
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

		$criteria->compare('oferta_id',$this->oferta_id);
		$criteria->compare('cualificacion_id',$this->cualificacion_id);
		$criteria->compare('tag',$this->tag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}