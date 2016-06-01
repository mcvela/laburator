<?php

/**
 * This is the model base class for the table "usuario_idioma".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UsuarioIdioma".
 *
 * Columns in table "usuario_idioma" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $version
 * @property string $idioma_id
 * @property integer $idioma_nivel
 * @property string $usuario_id
 *
 */
abstract class BaseUsuarioIdioma extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'usuario_idioma';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UsuarioIdioma|UsuarioIdiomas', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('version, idioma_id, idioma_nivel, usuario_id', 'required'),
			array('idioma_nivel', 'numerical', 'integerOnly'=>true),
			array('version, idioma_id, usuario_id', 'length', 'max'=>20),
			array('id, version, idioma_id, idioma_nivel, usuario_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'version' => Yii::t('app', 'Version'),
			'idioma_id' => Yii::t('app', 'Idioma'),
			'idioma_nivel' => Yii::t('app', 'Idioma Nivel'),
			'usuario_id' => Yii::t('app', 'Usuario'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('version', $this->version, true);
		$criteria->compare('idioma_id', $this->idioma_id, true);
		$criteria->compare('idioma_nivel', $this->idioma_nivel);
		$criteria->compare('usuario_id', $this->usuario_id, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}