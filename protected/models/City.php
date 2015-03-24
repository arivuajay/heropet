<?php

/**
 * This is the model class for table "{{city}}".
 *
 * The followings are the available columns in table '{{city}}':
 * @property integer $city_id
 * @property string $city_name
 * @property integer $pet_state_id
 * @property integer $pet_country_id
 * @property string $created
 * @property string $updated
 */
class City extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{city}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('city_name, pet_state_id, pet_country_id', 'required'),
            array('pet_state_id, pet_country_id', 'numerical', 'integerOnly' => true),
            array('city_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('city_id, city_name, pet_state_id, pet_country_id, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'city_id' => 'City',
            'city_name' => 'City Name',
            'pet_state_id' => 'Pet State',
            'pet_country_id' => 'Pet Country',
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

        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('city_name', $this->city_name, true);
        $criteria->compare('pet_state_id', $this->pet_state_id);
        $criteria->compare('pet_country_id', $this->pet_country_id);
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
     * @return City the static model class
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

    public function checkCity($country_id, $state_id, $city_name) {
        $criteria = new CDbCriteria();
        $criteria->condition = 'pet_state_id=:state_id AND pet_country_id=:country_id AND city_name=:city_name';
        $criteria->params = array(':state_id' => $state_id, ':country_id' => $country_id, ':city_name' => $city_name);
        $city_data = $this->model()->find($criteria);

        if ($city_data) {
            $city_id = $city_data->city_id;
        } else {
            $city = new City;
            $city->city_name = $city_name;
            $city->pet_state_id = $state_id;
            $city->pet_country_id = $country_id;
            $city->save(false);
            $city_id = $city->city_id;
        }

        return $city_id;
    }

}
