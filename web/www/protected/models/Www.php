<?php

/**
 * This is the model class for table "www".
 *
 * The followings are the available columns in table 'www':
 * @property integer $id_www
 * @property string $name
 * @property string $description
 * @property integer $id_church
 * @property integer $id_www_type
 *
 * The followings are the available model relations:
 * @property Church $idChurch
 * @property WwwType $idWwwType
 */
class Www extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'www';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_church, id_www_type', 'required'),
			array('id_church, id_www_type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_www, name, description, id_church, id_www_type', 'safe', 'on'=>'search'),
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
			'idChurch' => array(self::BELONGS_TO, 'Church', 'id_church'),
			'idWwwType' => array(self::BELONGS_TO, 'WwwType', 'id_www_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_www' => 'Id Www',
			'name' => 'Name',
			'description' => 'Description',
			'id_church' => 'Id Church',
			'id_www_type' => 'Id Www Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_www',$this->id_www);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('id_church',$this->id_church);
		$criteria->compare('id_www_type',$this->id_www_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Www the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
