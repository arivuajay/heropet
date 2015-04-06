<?php

/**
 * This is the model class for table "{{breed}}".
 *
 * The followings are the available columns in table '{{breed}}':
 * @property integer $breed_id
 * @property integer $pet_category_id
 * @property string $breed_name
 * @property string $created
 * @property string $update
 *
 * The followings are the available model relations:
 * @property Category $petCategory
 */
class Breed extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{breed}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('breed_id, pet_category_id', 'numerical', 'integerOnly' => true),
            array('breed_name', 'required'),
            array('created, update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('breed_id, pet_category_id, breed_name, created, update', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'petCategory' => array(self::BELONGS_TO, 'Category', 'pet_category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'breed_id' => 'Breed',
            'pet_category_id' => 'Pet Category',
            'breed_name' => 'Breed Name',
            'created' => 'Created',
            'update' => 'Update',
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

        $criteria->compare('breed_id', $this->breed_id);
        $criteria->compare('pet_category_id', $this->pet_category_id);
        $criteria->compare('breed_name', $this->breed_name, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('update', $this->update, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Breed the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created = new CDbExpression('NOW()');

        $this->update = new CDbExpression('NOW()');

        return parent::beforeSave();
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

}
