<?php

/**
 * This is the model class for table "{{ad_package}}".
 *
 * The followings are the available columns in table '{{ad_package}}':
 * @property integer $package_id
 * @property string $package_name
 * @property string $package_cost
 * @property string $package_days
 * @property integer $sort_order
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Lost[] $losts
 */
class AdPackage extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{ad_package}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('package_name, package_cost, created, updated', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('package_name', 'length', 'max' => 100),
            array('package_cost', 'length', 'max' => 10),
            array('package_days', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('package_id, package_name, package_cost, package_days, sort_order, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'losts' => array(self::HAS_MANY, 'Lost', 'pet_ad_package_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'package_id' => 'Package',
            'package_name' => 'Package Name',
            'package_cost' => 'Package Cost',
            'package_days' => 'Package Days',
            'sort_order' => 'Sort Order',
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

        $criteria->compare('package_id', $this->package_id);
        $criteria->compare('package_name', $this->package_name, true);
        $criteria->compare('package_cost', $this->package_cost, true);
        $criteria->compare('package_days', $this->package_days, true);
        $criteria->compare('sort_order', $this->sort_order);
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
     * @return AdPackage the static model class
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

    public function adPackageList() {
        $packages = $this->model()->findAll();
        $packages_array = array();
        foreach ($packages as $key => $value) {
            $packages_array[$value->package_id] = $value->package_name . ' cost ' . $value->package_cost;
        }
        return $packages_array;
    }

}
