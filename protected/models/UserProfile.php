<?php

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property integer $user_profile_id
 * @property integer $pet_user_id
 * @property string $user_address
 * @property double $latitude
 * @property double $longitude
 * @property integer $pet_country_id
 * @property integer $pet_state_id
 * @property integer $pet_city_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property User $petUser
 */
class UserProfile extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_profile}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_address', 'required'),
            array('pet_user_id, pet_country_id, pet_state_id, pet_city_id', 'numerical', 'integerOnly' => true),
            array('latitude, longitude', 'numerical'),
            array('latitude', 'required', 'message'=>'Can not find your location, Please enter correct address'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_profile_id, pet_user_id, user_address, latitude, longitude, pet_country_id, pet_state_id, pet_city_id, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'petUser' => array(self::BELONGS_TO, 'User', 'pet_user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_profile_id' => 'User Profile',
            'pet_user_id' => 'Pet User',
            'user_address' => 'Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'pet_country_id' => 'Pet Country',
            'pet_state_id' => 'Pet State',
            'pet_city_id' => 'Pet City',
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

        $criteria->compare('user_profile_id', $this->user_profile_id);
        $criteria->compare('pet_user_id', $this->pet_user_id);
        $criteria->compare('user_address', $this->user_address, true);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('longitude', $this->longitude);
        $criteria->compare('pet_country_id', $this->pet_country_id);
        $criteria->compare('pet_state_id', $this->pet_state_id);
        $criteria->compare('pet_city_id', $this->pet_city_id);
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
     * @return UserProfile the static model class
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

}
