<?php

/**
 * This is the model class for table "log_acciones".
 *
 * The followings are the available columns in table 'log_acciones':
 * @property integer $log_acciones_id
 * @property integer $accion
 * @property string $ip
 * @property string $busqueda
 * @property integer $user_id
 * @property string $id_oferta_trabajo
 */
class LogAcciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogAcciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        public function saveAccionVerOferta(){
             try{
                $this->accion=1;
                $this->ip="".Yii::app()->request->getUserHostAddress();
                $this->user_id=Yii::app()->user->id;
                $this->save();
             } catch (Exception $e) {
                 
             }
        }
         public function saveAccionLinkOferta(){
             try{
                $this->accion=2;
                $this->ip="".Yii::app()->request->getUserHostAddress();
                $this->user_id=Yii::app()->user->id;
                $this->save();
             } catch (Exception $e) {
                 
             }
        }
         public function saveAccionSearchOferta(){
             try{
                $this->accion=1;
                $this->ip="".Yii::app()->request->getUserHostAddress();
                $this->user_id=Yii::app()->user->id;
                $this->save();
             } catch (Exception $e) {
                 
             }
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_acciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accion, user_id', 'numerical', 'integerOnly'=>true),
			array('ip', 'length', 'max'=>30),
			array('busqueda', 'length', 'max'=>200),
			array('id_oferta_trabajo', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_acciones_id, accion, ip, busqueda, user_id, id_oferta_trabajo', 'safe', 'on'=>'search'),
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
			'log_acciones_id' => 'Log Acciones',
			'accion' => 'Accion',
			'ip' => 'Ip',
			'busqueda' => 'Busqueda',
			'user_id' => 'User',
			'id_oferta_trabajo' => 'Id Oferta Trabajo',
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

		$criteria->compare('log_acciones_id',$this->log_acciones_id);
		$criteria->compare('accion',$this->accion);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('busqueda',$this->busqueda,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('id_oferta_trabajo',$this->id_oferta_trabajo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}