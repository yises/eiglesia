<?php

/**
 * This is the model class for table "preach".
 *
 * The followings are the available columns in table 'preach':
 * @property integer $id_preach
 * @property string $name
 * @property string $description
 * @property string $author
 * @property string $audio
 * @property string $video
 * @property string $tag
 * @property integer $id_church
 *
 * The followings are the available model relations:
 * @property Church $idChurch
 * @property PreachQuote[] $preachQuotes
 */
class Preach extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'preach';
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
			array('name, author, audio, video', 'length', 'max'=>255),
			array('description, tag', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_preach, name, description, author, audio, video, tag, id_church', 'safe', 'on'=>'search'),
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
			'preachQuotes' => array(self::HAS_MANY, 'PreachQuote', 'id_preach'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_preach' => 'Id Preach',
			'name' => 'Name',
			'description' => 'Description',
			'author' => 'Author',
			'audio' => 'Audio',
			'video' => 'Video',
			'tag' => 'Tag',
			'id_church' => 'Id Church',
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

		$criteria->compare('id_preach',$this->id_preach);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('audio',$this->audio,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('id_church',$this->id_church);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Preach the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
