<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $created_at
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password', 'required'),
			array('username, email, password', 'length', 'max'=>255),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password, created_at', 'safe', 'on'=>'search'),
			array('username', 'checkUserExists'),
			array('email', 'checkEmailExists'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'created_at' => 'Created At',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function checkUserExists($attribute)
	{
		assert(isset($username));

		$user = self::model()->find(array(
			'select'=>'username',
			'condition'=>'username=:Username',
			'params'=>array(':Username'=>$this->username),
		));

		if (isset($user)){
			$this->addError($attribute, 'Username already exists.');
		}

	}
	public function checkEmailExists($attribute){
		$email = self::model()->find(array(
			'select'=>'email',
			'condition'=>'email=:Email',
			'params'=>array(':Email'=>$this->email),
		));

		if(isset($email)){
			$this->addError($attribute, 'Email already exists.');
		}
	}
	public static function login($username){
		assert(isset($username));

		$user = self::model()->find(array(
			'select'=>'*',
			'condition'=>'username=:Username',
			'params'=>array(':Username'=>$username),
		));
		return $user;
	}
	public static function getUserNameById($id){
		assert(isset($id));

		$user = self::model()->find(array(
			'select'=>'username',
			'condition'=>'id=:Id',
			'params'=>array(':Id'=>$id),
		));
		return $user->username;
	}
}
