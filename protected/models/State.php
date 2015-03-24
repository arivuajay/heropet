<?php

/**
 * This is the model class for table "{{state}}".
 *
 * The followings are the available columns in table '{{state}}':
 * @property integer $state_id
 * @property string $state_code
 * @property string $state_name
 * @property integer $pet_country_id
 * @property string $created
 * @property string $updated
 */
class State extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{state}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('state_name, pet_country_id', 'required'),
            array('pet_country_id', 'numerical', 'integerOnly' => true),
            array('state_code', 'length', 'max' => 10),
            array('state_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('state_id, state_code, state_name, pet_country_id, created, updated', 'safe', 'on' => 'search'),
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
            'state_id' => 'State',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
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

        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('state_code', $this->state_code, true);
        $criteria->compare('state_name', $this->state_name, true);
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
     * @return State the static model class
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

    public function checkState($country_id, $state_name, $state_code=null) {
        $criteria = new CDbCriteria();
        $criteria->condition = 'state_name=:state_name AND pet_country_id=:country_id';
        $criteria->params = array(':state_name' => $state_name, ':country_id' => $country_id);
        $state_data = $this->model()->find($criteria);

        if ($state_data) {
            $state_id = $state_data->state_id;
        } else {
            $state = new State;
            $state->state_code = $state_code;
            $state->state_name = $state_name;
            $state->pet_country_id = $country_id;
            $state->save(false);
            $state_id = $state->state_id;
        }

        return $state_id;
    }

}
