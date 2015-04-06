<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_image
 * @property string $status
 * @property string $created
 * @property string $updated
 */
class Category extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{category}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name', 'required'),
            array('category_name', 'length', 'max' => 50),
            array('status', 'length', 'max' => 1),
            array('category_image', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, gif, png'),
            array('category_image', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('category_id, category_name, category_image, status, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'breeds' => array(self::HAS_MANY, 'Breed', 'pet_category_id'),
            'losts' => array(self::HAS_MANY, 'Lost', 'pet_category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'category_name' => 'Category Name',
            'category_image' => 'Category Image',
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

        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('category_name', $this->category_name, true);
        $criteria->compare('category_image', $this->category_image, true);
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
     * @return Category the static model class
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
