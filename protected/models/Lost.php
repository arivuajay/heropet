<?php

/**
 * This is the model class for table "{{lost}}".
 *
 * The followings are the available columns in table '{{lost}}':
 * @property integer $lost_id
 * @property integer $pet_category_id
 * @property string $pet_name
 * @property string $breed
 * @property string $eye_color
 * @property string $furcolor
 * @property string $sex
 * @property integer $age
 * @property string $weight
 * @property string $chipped
 * @property string $castrated
 * @property string $sterilized
 * @property string $date_of_missing
 * @property string $lost_address
 * @property double $latitude
 * @property double $longitude
 * @property integer $pet_country_id
 * @property integer $pet_state_id
 * @property integer $pet_city_id
 * @property string $additional_informations
 * @property string $reward
 * @property integer $pet_user_id
 * @property integer $pet_ad_package_id
 * @property string $status
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property AdPackage $petAdPackage
 * @property Category $petCategory
 * @property User $petUser
 * @property LostPhoto[] $lostPhotos
 */
class Lost extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{lost}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pet_category_id, pet_name, breed, date_of_missing, lost_address, pet_user_id, pet_ad_package_id, reward', 'required'),
            array('latitude', 'required', 'message' => 'Can not find your location, Please enter correct address'),
            array('pet_category_id, age, pet_country_id, pet_state_id, pet_city_id, pet_user_id, pet_ad_package_id', 'numerical', 'integerOnly' => true),
            array('latitude, longitude', 'numerical'),
            array('pet_name, breed', 'length', 'max' => 500),
            array('eye_color, furcolor', 'length', 'max' => 50),
            array('sex, chipped, castrated, sterilized, status', 'length', 'max' => 1),
            array('weight, reward', 'length', 'max' => 10),
            array('additional_informations', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('lost_id, pet_category_id, pet_name, breed, eye_color, furcolor, sex, age, weight, chipped, castrated, sterilized, date_of_missing, lost_address, latitude, longitude, pet_country_id, pet_state_id, pet_city_id, additional_informations, reward, pet_user_id, pet_ad_package_id, status, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'petAdPackage' => array(self::BELONGS_TO, 'AdPackage', 'pet_ad_package_id'),
            'petCategory' => array(self::BELONGS_TO, 'Category', 'pet_category_id'),
            'petUser' => array(self::BELONGS_TO, 'User', 'pet_user_id'),
            'lostPhotos' => array(self::HAS_MANY, 'LostPhoto', 'pet_lost_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'lost_id' => 'Lost',
            'pet_category_id' => 'Pet Category',
            'pet_name' => 'Pet Name',
            'breed' => 'Breed',
            'eye_color' => 'Eye Color',
            'furcolor' => 'Furcolor',
            'sex' => 'Sex',
            'age' => 'Age',
            'weight' => 'Weight',
            'chipped' => 'Chipped',
            'castrated' => 'Castrated',
            'sterilized' => 'Sterilized',
            'date_of_missing' => 'Date Of Missing',
            'lost_address' => 'Lost Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'pet_country_id' => 'Pet Country',
            'pet_state_id' => 'Pet State',
            'pet_city_id' => 'Pet City',
            'additional_informations' => 'Additional Informations',
            'reward' => 'Reward',
            'pet_user_id' => 'Pet User',
            'pet_ad_package_id' => 'Pet Ad Package',
            'status' => 'Status',
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

        $criteria->compare('lost_id', $this->lost_id);
        $criteria->compare('pet_category_id', $this->pet_category_id);
        $criteria->compare('pet_name', $this->pet_name, true);
        $criteria->compare('breed', $this->breed, true);
        $criteria->compare('eye_color', $this->eye_color, true);
        $criteria->compare('furcolor', $this->furcolor, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('weight', $this->weight, true);
        $criteria->compare('chipped', $this->chipped, true);
        $criteria->compare('castrated', $this->castrated, true);
        $criteria->compare('sterilized', $this->sterilized, true);
        $criteria->compare('date_of_missing', $this->date_of_missing, true);
        $criteria->compare('lost_address', $this->lost_address, true);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('longitude', $this->longitude);
        $criteria->compare('pet_country_id', $this->pet_country_id);
        $criteria->compare('pet_state_id', $this->pet_state_id);
        $criteria->compare('pet_city_id', $this->pet_city_id);
        $criteria->compare('additional_informations', $this->additional_informations, true);
        $criteria->compare('reward', $this->reward, true);
        $criteria->compare('pet_user_id', $this->pet_user_id);
        $criteria->compare('pet_ad_package_id', $this->pet_ad_package_id);
        $criteria->compare('status', $this->status, true);
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
     * @return Lost the static model class
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

    public function getLostPetsByDistance($lat, $lng, $distance = '< 10') {
        //If you want search distance in kms, use 6371 in below query.
        //If you want search distance in miles, use 3959 in below query.
        $sql = "SELECT *, 
                ( 6371 * acos( cos( radians({$lat}) ) 
                               * cos( radians( latitude ) ) 
                               * cos( radians( longitude ) 
                                   - radians({$lng}) ) 
                               + sin( radians({$lat}) ) 
                               * sin( radians( latitude ) ) 
                             )
               ) AS distance 
            FROM pet_lost 
            HAVING distance {$distance}
            ORDER BY distance LIMIT 0 , 4;";
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->queryAll();
        return $results;
    }
    
    public function getLostPets(){
        $sql = "SELECT * FROM pet_lost LIMIT 0 , 4;";
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->queryAll();
        return $results;
    }

}
