<?php

/**
 * This is the model class for table "pet_user".
 *
 * The followings are the available columns in table 'pet_user':
 * @property integer $user_id
 * @property string $user_email
 * @property string $user_password
 * @property string $user_status
 * @property string $user_last_login
 * @property string $user_login_ip
 * @property string $reset_password_string
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property UserProfile[] $userProfiles
 */
class User extends CActiveRecord {
    
    public $user_repeat_email;
    public $user_repeat_password;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pet_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_email, user_repeat_email, user_password, user_repeat_password', 'required', 'on'=>'register'),
            array('user_email, user_password, user_login_ip', 'length', 'max' => 255),
            array('user_status', 'length', 'max' => 1),
            array('reset_password_string', 'length', 'max' => 50),
            
            array('user_repeat_email', 'compare', 'compareAttribute'=>'user_email', 'message'=>"Email don't match", 'on'=>'register'),
            array('user_repeat_password', 'compare', 'compareAttribute'=>'user_password', 'message'=>"Passwords don't match", 'on'=>'register'),
            
            array('user_email, user_password', 'required', 'on' => 'social_register'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_id, user_email, user_password, user_status, user_last_login, user_login_ip, reset_password_string, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'pet_user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'user_email' => 'Email',
            'user_password' => 'Password',
            'user_status' => 'Status',
            'user_last_login' => 'Last Login',
            'user_login_ip' => 'Login Ip',
            'reset_password_string' => 'Reset Password String',
            'created' => 'Created',
            'updated' => 'Updated',
            'user_repeat_email' => 'Repeat Email',
            'user_repeat_password' => 'Repeat Password',
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

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('user_email', $this->user_email, true);
        $criteria->compare('user_password', $this->user_password, true);
        $criteria->compare('user_status', $this->user_status, true);
        $criteria->compare('user_last_login', $this->user_last_login, true);
        $criteria->compare('user_login_ip', $this->user_login_ip, true);
        $criteria->compare('reset_password_string', $this->reset_password_string, true);
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
     * @return User the static model class
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
