<?php

/**
 * This is the model class for table "fav_search".
 *
 * The followings are the available columns in table 'fav_search':
 * @property integer $fav_search_id
 * @property string $txt_search_1
 * @property string $txt_search_2
 * @property integer $id_usuario
 * @property integer $resultado
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property TblUsers $idUsuario
 */
class FavSearch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FavSearch the static model class
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
		return 'fav_search';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, resultado', 'numerical', 'integerOnly'=>true),
			array('txt_search_1, txt_search_2', 'length', 'max'=>50),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fav_search_id, txt_search_1, txt_search_2, id_usuario, resultado, fecha', 'safe', 'on'=>'search'),
		);
	}
    public function beforeSave() {
	  /* $dateNow = new DateTime("now", new DateTimeZone('Europe/Madrid') );
							$hoy = $dateNow->format('Y-m-d H:i:s');
	   try{
			if ($this->isNewRecord)
				$this->fecha = new CDbExpression('NOW()');
		 
			$this->fecha = new CDbExpression('NOW()');
		}catch(Exception $e){
		
		}
		*/
 
    return parent::beforeSave();
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUsuario' => array(self::BELONGS_TO, 'TblUsers', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fav_search_id' => 'Fav Search',
			'txt_search_1' => 'Txt Search 1',
			'txt_search_2' => 'Txt Search 2',
			'id_usuario' => 'Id Usuario',
			'resultado' => 'Resultado',
			'fecha' => 'Fecha',
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

		$criteria->compare('fav_search_id',$this->fav_search_id);
		$criteria->compare('txt_search_1',$this->txt_search_1,true);
		$criteria->compare('txt_search_2',$this->txt_search_2,true);
		$criteria->compare('id_usuario',Yii::app()->user->id);
		$criteria->compare('resultado',$this->resultado);
		$criteria->compare('fecha',$this->fecha,true);

                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array(
			'defaultOrder' => 'fecha DESC', 
			),
		));
	}
}