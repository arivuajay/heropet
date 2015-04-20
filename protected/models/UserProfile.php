<?php

/**
 * This is the model class for table "pet_user_profile".
 *
 * The followings are the available columns in table 'pet_user_profile':
 * @property integer $user_profile_id
 * @property integer $pet_user_id
 * @property string $user_profile_picture
 * @property string $user_title
 * @property string $user_first_name
 * @property string $user_sur_name
 * @property integer $pet_country_id
 * @property string $user_zip_code
 * @property string $user_town
 * @property string $user_street
 * @property string $user_house_number
 * @property string $user_mobile_number
 * @property string $user_is_agree_tc
 * @property string $user_voucher_code
 * @property double $latitude
 * @property double $longitude
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Country $petCountry
 * @property User $petUser
 */
class UserProfile extends CActiveRecord {

    public $verifyCode;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pet_user_profile';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_title, user_first_name, pet_country_id, user_zip_code, user_town, latitude, longitude, verifyCode', 'required', 'on' => 'register'),
            array('user_is_agree_tc', 'required', 'requiredValue' => 1, 'message' => 'You should accept the Terms and Conditions'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            
            array('user_title, user_first_name', 'required', 'on' => 'social_register'),
            array('pet_user_id, pet_country_id', 'numerical', 'integerOnly' => true),
            array('latitude, longitude', 'numerical'),
            array('user_title', 'length', 'max' => 10),
            array('user_first_name, user_sur_name, user_town, user_mobile_number', 'length', 'max' => 255),
            array('user_zip_code, user_street, user_voucher_code', 'length', 'max' => 100),
            array('user_house_number', 'length', 'max' => 50),
            array('user_is_agree_tc', 'length', 'max' => 1),
            array('user_profile_picture, created, updated', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_profile_id, pet_user_id, user_profile_picture, user_title, user_first_name, user_sur_name, pet_country_id, user_zip_code, user_town, user_street, user_house_number, user_mobile_number, user_is_agree_tc, user_voucher_code, latitude, longitude, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'petCountry' => array(self::BELONGS_TO, 'Country', 'pet_country_id'),
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
            'user_profile_picture' => 'User Profile Picture',
            'user_title' => 'Title',
            'user_first_name' => 'First Name',
            'user_sur_name' => 'Sur Name',
            'pet_country_id' => 'Pet Country',
            'user_zip_code' => 'Zip Code',
            'user_town' => 'Town',
            'user_street' => 'Street',
            'user_house_number' => 'House Number',
            'user_mobile_number' => 'Mobile Number',
            'user_is_agree_tc' => 'Is Agree Tc',
            'user_voucher_code' => 'Voucher Code',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
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
        $criteria->compare('user_profile_picture', $this->user_profile_picture, true);
        $criteria->compare('user_title', $this->user_title, true);
        $criteria->compare('user_first_name', $this->user_first_name, true);
        $criteria->compare('user_sur_name', $this->user_sur_name, true);
        $criteria->compare('pet_country_id', $this->pet_country_id);
        $criteria->compare('user_zip_code', $this->user_zip_code, true);
        $criteria->compare('user_town', $this->user_town, true);
        $criteria->compare('user_street', $this->user_street, true);
        $criteria->compare('user_house_number', $this->user_house_number, true);
        $criteria->compare('user_mobile_number', $this->user_mobile_number, true);
        $criteria->compare('user_is_agree_tc', $this->user_is_agree_tc, true);
        $criteria->compare('user_voucher_code', $this->user_voucher_code, true);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('longitude', $this->longitude);
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
            $this->created = date('Y-m-d H:i:s');

        $this->updated = date('Y-m-d H:i:s');

        return parent::beforeSave();
    }

}
