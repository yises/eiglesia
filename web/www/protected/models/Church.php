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
 * @property integer $id_denomination
 *
 * The followings are the available model relations:
 * @property Activity[] $activities
 * @property Address[] $addresses
 * @property Denomination $idDenomination
 * @property ChurchActivityunique[] $churchActivityuniques
 * @property ChurchBadge[] $churchBadges
 * @property ChurchServant[] $churchServants
 * @property Email[] $emails
 * @property Gallery[] $galleries
 * @property Pobox[] $poboxes
 * @property Preach[] $preaches
 * @property Telephone[] $telephones
 * @property Www[] $wwws
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
			array('id_denomination', 'required'),
			array('id_motherchurch, numbermember, exists, id_denomination', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_church, name, description, id_motherchurch, numbermember, exists, id_denomination', 'safe', 'on'=>'search'),
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
			'activities' => array(self::HAS_MANY, 'Activity', 'id_church'),
			'addresses' => array(self::HAS_MANY, 'Address', 'id_church'),
			'idDenomination' => array(self::BELONGS_TO, 'Denomination', 'id_denomination'),
			'churchActivityuniques' => array(self::HAS_MANY, 'ChurchActivityunique', 'id_church'),
			'churchBadges' => array(self::HAS_MANY, 'ChurchBadge', 'id_church'),
			'churchServants' => array(self::HAS_MANY, 'ChurchServant', 'id_church'),
			'emails' => array(self::HAS_MANY, 'Email', 'id_church'),
			'galleries' => array(self::HAS_MANY, 'Gallery', 'id_church'),
			'poboxes' => array(self::HAS_MANY, 'Pobox', 'id_church'),
			'preaches' => array(self::HAS_MANY, 'Preach', 'id_church'),
			'telephones' => array(self::HAS_MANY, 'Telephone', 'id_church'),
			'wwws' => array(self::HAS_MANY, 'Www', 'id_church'),
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
