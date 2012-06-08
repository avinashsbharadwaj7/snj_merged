<?php
class User extends SparkPlugAppModel {

	var $name = 'User';

	var $actsAs = array('SparkPlug.Membership'=>array('option1'=>'value'));
	var $belongsTo = array('SparkPlug.UserGroup');

	var $hasOne = array('SparkPlug.Company');
    var $hasMany = array('SparkPlug.LoginToken');

	var $validate = array(
				"username" => array(					
					'mustBeLonger'=>array(
						'rule' => array('minLength', 5),
						'message'=> 'Username is required and must have a minimum of 3 alphanumeric characters.',
						'last'=>true),
					'mustHaveNoSpecial'=>array(
						'rule' => 'alphaNumericDashUnderscore',
						'message' => 'Username can only be letters, numbers, dash and underscore.'),
						),
				'email'=> array(
					// 'mustBeEmail'=> array(
					// 	'rule' => array('email', true),
					// 	'message' => 'Please supply a valid email address.',
					// 	'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>'That email is already registered.',
						)
					),
				'confirm_password'=>array(
						'mustBeLonger'=>array(
							'rule' => array('minLength', 4),
							'message'=> 'You must fill in and confirm your password.',
						),
						'mustMatch'=>array(
							'rule' => array('verifies', 'password'),
							'message' => 'You must fill in the password field and must match with confirm.'
						)
				),
				'captcha'=>array(
							'rule' => 'notEmpty',
							'message' => 'This field cannot be left blank'
						),
				'first_name'=>array(
							'rule' => 'notEmpty',
							'message' => 'This field cannot be left blank'
						),
				'last_name'=>array(
							'rule' => 'notEmpty',
							'message' => 'This field cannot be left blank'
						),
				'designation'=>array(
							'rule' => 'notEmpty',
							'message' => 'This field cannot be left blank'
						),
				'user_group_id'=>array(
							'rule' => 'notEmpty',
							'message' => 'This field cannot be left blank'
						),
			);

	function afterSave($created)
	{		
		if ($created)
		{
			$companyData['Company']['id'] = null;
			$companyData['Company']['user_id'] = $this->getLastInsertID();
			if (isset($this->data['User']['company_name']))
				$companyData['Company']['name'] = $this->data['User']['company_name'];
			$this->Company->save($companyData);
			$this->sendRegistrationEmail();
		}
	}

	function getEmailSubjectNew()
	{
		return "New Account Registration";
	}

	function getEmailBodyNew()
	{
		return "Hello,\n In order to access IRT please click the link below to activate \n {\$link} \nThanks,\n\nIRT Admin";
	}
    function hashPasswords($data) {
		if (!isset($data['User']['confirm_password']))
		{
			if (isset($data['User']['password'])) {
				$data['User']['password'] = Authsome::hash($data['User']['password'], Configure::read('SparkPlug.hash.method'), Configure::read('SparkPlug.hash.salt'));
				return $data;
			}
		}
        return $data;
    }
	function authsomeLogin($type, $credentials = array())
	{
		switch ($type) {
			case 'guest':
				// You can return any non-null value here, if you don't
				// have a guest account, just return an empty array
				return array();
			case 'credentials':
				$password = Authsome::hash($credentials['password'], Configure::read('SparkPlug.hash.method'), Configure::read('SparkPlug.hash.salt'));

				// This is the logic for validating the login
				$conditions = array(
					'User.username' => $credentials['username'],
					'User.password' => $password,
                    'User.active' => '1'
				);
				break;
			case 'cookie':
				list($token, $userId) = split(':', $credentials['token']);
				$duration = $credentials['duration'];

				$loginToken = $this->LoginToken->find('first', array(
					'conditions' => array(
						'user_id' => $userId,
						'token' => $token,
						'duration' => $duration,
						'used' => false,
						'expires <=' => date('Y-m-d H:i:s', strtotime($duration)),
					),
					'contain' => false
				));

				if (!$loginToken) {
					return false;
				}

				$loginToken['LoginToken']['used'] = true;
				$this->LoginToken->save($loginToken);

				$conditions = array(
					'User.id' => $loginToken['LoginToken']['user_id']
				);
            break;

			default:
				return null;
		}
		
        return $this->find('first', compact('conditions'));
    }

	function authsomePersist($user, $duration) {
		$token = md5(uniqid(mt_rand(), true));
		$userId = $user['User']['id'];

		$this->LoginToken->create(array(
			'user_id' => $userId,
			'token' => $token,
			'duration' => $duration,
			'expires' => date('Y-m-d H:i:s', strtotime($duration)),
		));
		$this->LoginToken->save();

		return "${token}:${userId}";
	}
	
	function getTCMenggs(){
		return $this->find("all",array('conditions'=>array("tcm_rights"=>array('1','2','3')), 'order'=> 'username ASC'));		
	}
        
	function getTCMLead($reg=null){
		return $this->find("all",array('fields'=>'username','conditions'=>array("tcm_rights"=>array('2','3'), "tcm_region"=>$reg), 'order'=> 'username ASC'));
	}
	
	function getTCMEmail($username=null){
		return $this->find("all",array('fields'=>'email','conditions'=>array("username"=>$username)));
	}
	
	function getDesignation($username=null){
		return $this->find("all",array('fields'=>'designation','conditions'=>array("username"=>$username)));
	}
}
?>
