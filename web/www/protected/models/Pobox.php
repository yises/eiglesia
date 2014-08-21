<?php

/**
 * This is the model class for table "pobox".
 *
 * The followings are the available columns in table 'pobox':
 * @property integer $id_pobox
 * @property integer $id_church
 * @property string $data
 * @property string $zipcode
 */
class Pobox extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pobox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_church', 'required'),
			array('id_church', 'numerical', 'integerOnly'=>true),
			array('data, zipcode', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pobox, id_church, data, zipcode', 'safe', 'on'=>'search'),
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
			'id_pobox' => 'Id Pobox',
			'id_church' => 'Id Church',
			'data' => 'Data',
			'zipcode' => 'Zipcode',
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

		$criteria->compare('id_pobox',$this->id_pobox);
		$criteria->compare('id_church',$this->id_church);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('zipcode',$this->zipcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pobox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
