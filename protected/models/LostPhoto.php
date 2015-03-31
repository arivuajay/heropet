<?php

/**
 * This is the model class for table "{{lost_photo}}".
 *
 * The followings are the available columns in table '{{lost_photo}}':
 * @property integer $lost_photo_id
 * @property integer $pet_lost_id
 * @property string $photos
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Lost $petLost
 */
class LostPhoto extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{lost_photo}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pet_lost_id', 'numerical', 'integerOnly' => true),
            // array('photos', 'file', 'types'=>'jpg,jpeg,gif,png'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('lost_photo_id, pet_lost_id, photos, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'petLost' => array(self::BELONGS_TO, 'Lost', 'pet_lost_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'lost_photo_id' => 'Lost Photo',
            'pet_lost_id' => 'Pet Lost',
            'photos' => 'Photos',
            'created' => 'Created',
            'updated' => 'Updated',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('lost_photo_id', $this->lost_photo_id);
        $criteria->compare('pet_lost_id', $this->pet_lost_id);
        $criteria->compare('photos', $this->photos, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LostPhoto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created = new CDbExpression('NOW()');

        $this->updated = new CDbExpression('NOW()');

        return parent::beforeSave();
    }

    public function getLostPetPhotos($lost_pet_id) {
        $lost_pet_photos = $this->model()->findAll('pet_lost_id = :pet_lost_id', array(':pet_lost_id' => $lost_pet_id));
        return $lost_pet_photos;
    }
    
    public function getLostPetPhoto($lost_pet_id){
        $lost_pet_photo = $this->model()->find('pet_lost_id = :pet_lost_id', array(':pet_lost_id' => $lost_pet_id));
        return $lost_pet_photo;
    }

}
