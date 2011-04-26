<?php

/**
 * This is the model class for table "exam_phrase".
 *
 * The followings are the available columns in table 'exam_phrase':
 * @property string $id
 * @property string $specialty_id
 * @property integer $part
 * @property string $phrase
 * @property string $display_order
 *
 * The followings are the available model relations:
 * @property Specialty $specialty
 */
class ExamPhrase extends CActiveRecord
{
	const PART_HISTORY = 0;
	const PART_PMH = 1;
	const PART_POH = 2;
	const PART_MEDICATION = 3;
	const PART_ALLERGIES = 4;
	const PART_ANTSEG = 5;
	const PART_POSTSEG = 6;
	const PART_CONCLUSION = 7;
	const PART_TREATMENT = 8;
	const PART_SOCIAL_HISTORY = 9;
	const PART_HPC = 10;
	const PART_FOH = 11;
	const PART_OUTCOME = 12;
	const PART_TIMING = 13;
	const PART_SEVERITY = 14;
	const PART_ONSET = 15;
	const PART_DURATION = 16;
	const PART_SITE = 17;

	/**
	 * Returns the static model of the specified AR class.
	 * @return ExamPhrase the static model class
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
		return 'exam_phrase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('specialty_id, phrase', 'required'),
			array('part', 'numerical', 'integerOnly'=>true),
			array('specialty_id, display_order', 'length', 'max'=>10),
			array('phrase', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, specialty_id, part, phrase, display_order', 'safe', 'on'=>'search'),
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
			'specialty' => array(self::BELONGS_TO, 'Specialty', 'specialty_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'specialty_id' => 'Specialty',
			'part' => 'Part',
			'phrase' => 'Phrase',
			'display_order' => 'Display order',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('specialty_id',$this->specialty_id,true);
		$criteria->compare('part',$this->part);
		$criteria->compare('phrase',$this->phrase,true);
		$criteria->compare('display_order',$this->display_order,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function getSpecialtyOptions()
	{
		return CHtml::listData(Specialty::Model()->findAll(), 'id', 'name');
	}

	public function getPartOptions()
	{
		return array(
			self::PART_HISTORY => 'History',
			self::PART_PMH => 'PMH',
			self::PART_POH => 'POH',
			self::PART_MEDICATION => 'Medication',
			self::PART_ALLERGIES => 'Allergies',
			self::PART_ANTSEG => 'Antseg',
			self::PART_POSTSEG => 'Postseg',
			self::PART_CONCLUSION => 'Conclusion',
			self::PART_TREATMENT => 'Treatment',
			self::PART_SOCIAL_HISTORY => 'Social History',
			self::PART_HPC => 'History of Presenting Complaint',
			self::PART_FOH => 'Family Ophthalmic History',
			self::PART_OUTCOME => 'Outcome',
			self::PART_TIMING => 'Timing',
			self::PART_SEVERITY => 'Severity',
			self::PART_ONSET => 'Onset',
			self::PART_DURATION => 'Duration',
			self::PART_SITE => 'Site',
		);
	}

	public function getPartText()
	{
		$partOptions = $this->getPartOptions();

		return $partOptions[$this->part];
	}
}