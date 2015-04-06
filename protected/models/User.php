<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $role
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property MasterRole $role0
 * @property UserProfile[] $userProfiles
 */
class User extends CActiveRecord {

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $new_password;
    public $confirm_password;
    
    public $currentpassword;
    public $sitenew_password;
    public $siteconfirm_password;
    
    public $role_search;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'required', 'on' => 'create, forgotpassword, update, register'),
            array('email', 'unique', 'except' => 'forgotpassword'),
            array('email', 'email'),
            array('confirm_password', 'compare', 'compareAttribute' => 'new_password', 'on' => 'update'),
            array('role, status', 'numerical', 'integerOnly' => true),
            array('password_hash, password_reset_token, email, new_password', 'length', 'max' => 255),
            array('new_password', 'compare', 'compareAttribute' => 'confirm_password', 'on' => 'reset'),
            array('new_password, confirm_password', 'required', 'on' => 'reset'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('currentpassword, sitenew_password, siteconfirm_password', 'required', 'on' => 'resetpassword'),
            array('currentpassword', 'equalPasswords', 'on' => 'resetpassword'),
            array('siteconfirm_password', 'compare', 'compareAttribute' => 'sitenew_password', 'on' => 'resetpassword'),
            array('id, password_hash, password_reset_token, email, role_search, status, created_at, updated_at, confirm_password, new_password', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'roleMdl' => array(self::BELONGS_TO, 'MasterRole', 'role'),
            'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'pet_user_id'),
             'petUserdetail' => array(self::BELONGS_TO, 'UserProfile', ''),
        );
    }

    
      public function equalPasswords($attribute, $params) {
        if ($this->$attribute) {
            $user = User::model()->findByPk(Yii::app()->user->id);
            if ($this->$attribute != "" && $user->password_hash != Myclass::encrypt($this->$attribute)) {
                $this->addError($attribute, 'Current password is incorrect.');
            }
        }
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'currentpassword' => 'Current Password',
            'sitenew_password' => 'New Password',
            'siteconfirm_password' => 'Confirm Password',
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
        $criteria->with = array('roleMdl');

        $criteria->compare('id', $this->id);
        $criteria->compare('password_hash', $this->password_hash, true);
        $criteria->compare('password_reset_token', $this->password_reset_token, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('roleMdl.Description', $this->role_search, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'role_search' => array(
                        'asc' => 'roleMdl.Description',
                        'desc' => 'roleMdl.Description DESC',
                    ),
                    '*',
                ),
            ),
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
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

    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created_at = date('Y-m-d H:i:s');

        $this->updated_at = date('Y-m-d H:i:s');

        return parent::beforeSave();
    }

    protected function afterValidate() {
        if ($this->scenario == 'update' && !empty($this->confirm_password)) {
            $this->password_hash = Myclass::encrypt($this->confirm_password);
        }

        return parent::afterValidate();
    }

}
