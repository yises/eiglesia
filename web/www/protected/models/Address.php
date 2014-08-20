<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property integer $id_address
 * @property string $latitude
 * @property string $longitude
 * @property string $name
 * @property string $street
 * @property string $number
 * @property string $zipcode
 * @property integer $is_active
 * @property integer $id_church
 * @property integer $id_municipality
 * @property integer $id_province
 *
 * The followings are the available model relations:
 * @property Church $idChurch
 * @property Municipality $idMunicipality
 * @property Province $idProvince
 */
class Address extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_church, id_municipality, id_province', 'required'),
			array('is_active, id_church, id_municipality, id_province', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude, number, zipcode', 'length', 'max'=>45),
			array('street, name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_address, latitude, longitude, name, street, number, zipcode, is_active, id_church, id_municipality, id_province', 'safe', 'on'=>'search'),
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
			'idMunicipality' => array(self::BELONGS_TO, 'Municipality', 'id_municipality'),
			'idProvince' => array(self::BELONGS_TO, 'Province', 'id_province'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_address' => 'Id Address',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'name' => 'Name',
			'street' => 'Street',
			'number' => 'Number',
			'zipcode' => 'Zipcode',
			'is_active' => 'Is Active',
			'id_church' => 'Id Church',
			'id_municipality' => 'Id Municipality',
			'id_province' => 'Id Province',
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

		$criteria->compare('id_address',$this->id_address);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('id_church',$this->id_church);
		$criteria->compare('id_municipality',$this->id_municipality);
		$criteria->compare('id_province',$this->id_province);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Address the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
