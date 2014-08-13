<?php

/**
 * This is the model class for table "church".
 *
 * The followings are the available columns in table 'church':
 * @property integer $id_church
 * @property string $name
 * @property string $description
 * @property integer $id_motherchurch
 * @property integer $numbermember
 * @property integer $exists
 * @property integer $points
 * @property integer $id_denomination
 */
class Church extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'church';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('points, id_denomination', 'required'),
			array('id_motherchurch, numbermember, exists, points, id_denomination', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_church, name, description, id_motherchurch, numbermember, exists, points, id_denomination', 'safe', 'on'=>'search'),
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
			'id_church' => 'Id Church',
			'name' => 'Name',
			'description' => 'Description',
			'id_motherchurch' => 'Id Motherchurch',
			'numbermember' => 'Numbermember',
			'exists' => 'Exists',
			'points' => 'Points',
			'id_denomination' => 'Id Denomination',
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

		$criteria->compare('id_church',$this->id_church);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('id_motherchurch',$this->id_motherchurch);
		$criteria->compare('numbermember',$this->numbermember);
		$criteria->compare('exists',$this->exists);
		$criteria->compare('points',$this->points);
		$criteria->compare('id_denomination',$this->id_denomination);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Church the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
