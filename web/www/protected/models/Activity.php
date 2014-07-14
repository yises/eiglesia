<?php

/**
 * This is the model class for table "activity".
 *
 * The followings are the available columns in table 'activity':
 * @property integer $id_church_activity
 * @property string $hour_to
 * @property string $hour_from
 * @property integer $weekday
 * @property string $name
 * @property string $description
 * @property integer $id_church
 * @property integer $id_activity_type
 *
 * The followings are the available model relations:
 * @property ActivityType $idActivityType
 * @property Church $idChurch
 */
class Activity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_church, id_activity_type', 'required'),
			array('weekday, id_church, id_activity_type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('hour_to, hour_from, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_church_activity, hour_to, hour_from, weekday, name, description, id_church, id_activity_type', 'safe', 'on'=>'search'),
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
			'idActivityType' => array(self::BELONGS_TO, 'ActivityType', 'id_activity_type'),
			'idChurch' => array(self::BELONGS_TO, 'Church', 'id_church'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_church_activity' => 'Id Church Activity',
			'hour_to' => 'Hour To',
			'hour_from' => 'Hour From',
			'weekday' => 'Weekday',
			'name' => 'Name',
			'description' => 'Description',
			'id_church' => 'Id Church',
			'id_activity_type' => 'Id Activity Type',
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

		$criteria->compare('id_church_activity',$this->id_church_activity);
		$criteria->compare('hour_to',$this->hour_to,true);
		$criteria->compare('hour_from',$this->hour_from,true);
		$criteria->compare('weekday',$this->weekday);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('id_church',$this->id_church);
		$criteria->compare('id_activity_type',$this->id_activity_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Activity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
