<?php

class UsersController extends SparkPlugAppController {

	var $name = 'Users';

	var $layout_settings = array("columns"=>"1");
	var $uses = array('SparkPlug.User','Dropdown');
        var $paginate = array('limit'=>50);

	function index()
	{
		//$this->layout = Configure::read('dashboard_layout');
		$users = $this->paginate('User');
		$this->set('users',$users);
	}

        function search(){
            if(isset($this->data['User']['signum'])){
                $username = $this->data['User']['signum'];
                $users = $this->paginate('User', array("User.username LIKE" => "%$username%"));
		$this->set('users',$users);
                $this->render("index");
            }
        }

	function edit($id=null)
	{
		//$this->layout = Configure::read('dashboard_layout');
		if($id == "")
		{
			$id = Authsome::get('id');
		}
		$userGroups = $this->User->UserGroup->find('list');
		$this->set('userGroups',$userGroups);
		
		$dropdown_des = $this->Dropdown->find("all",array('order' => array('weight ASC'),'fields'=>array('label','value'),'conditions'=>array('module_id'=>100)));
		foreach($dropdown_des as $temp):
			$temp = $temp['Dropdown'];
			$dropdown_val[$temp['value']] = $temp['label']; 
		endforeach;
		$this->set("dropdown_designation",$dropdown_val);
		
		if (!empty($this->data))
		{
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash('Information is saved.');
				$this->redirect('/users/dashboard'); // changed from /index to /dashboard - eprevar
			}
		}
		else
		{
			$this->data = $this->User->read(null,$id);
		}
	}

	function delete($id)
	{
		//$this->layout = Configure::read('dashboard_layout');
		$this->User->delete($id);
		$this->Session->setFlash('User was deleted.');
		$this->redirect('/users/index');
	}

	function logout()
	{
		$this->Authsome->logout();
		$this->Session->setFlash('You are now logged out.');
		$this->redirect('/users/login');
	}
	function dashboard()
	{
		//$this->layout = Configure::read('dashboard_layout');
		
		//making designation mandatory - eprevar
		$designation = $this->User->getDesignation(Authsome::get('username'));
		if($designation[0]['User']['designation'] == "")
		{	
			$id = Authsome::get('id');
			$this->redirect(array('action' => 'edit', $id));
		}
		//
	}
	function register()
	{
		$this->set("user_group_id", $this->User->find("all",array('fields' => 'user_group_id', 'order' => array('user_group_id ASC'))));            
		$user = $this->Authsome->get();
//		if ($user)
//		{
//			$this->redirect(Configure::read('SparkPlug.loginRedirect'));
//		}
//		else
		{
			if(!Configure::read('SparkPlug.open_registration')) {
				$this->Session->setFlash('Please contact an administrator to setup an account');
				$this->redirect('/users/login');
			}
			//$this->layout = Configure::read('front_end_layout');

			if ($this->data)
			{
				if ($this->User->save($this->data))
				{
					$registerAutoLogin = Configure::read('SparkPlug.registerAutoLogin');
					if($registerAutoLogin) {
						$user = $this->User->read(null,$this->User->id);
						$this->Session->write("User",$user);
						$this->Session->write("User.id",$user["User"]["id"]);
						$this->Session->write("UserGroup.id",$user["UserGroup"]["id"]);
						$this->Session->write("UserGroup.name",$user["UserGroup"]["name"]);
						$this->Session->write('Company.id',$user['Company']['id']);
					}

					$registerRedirect = Configure::read('SparkPlug.registerRedirect');
					if(!empty($registerRedirect)) {
						$this->redirect($registerRedirect);
					}
					$this->flash("Thank you for joining. Please check your email for instructions.","login");
				} else {
					$this->data['User']['password'] = null;
					$this->data['User']['confirm_password'] = null;
				}
			} else {
				$this->data['User']['optin'] = Configure::read('SparkPlug.register_defaults.optin');
				$this->data['User']['agreement'] = Configure::read('SparkPlug.register_defaults.agreement');
			}
		}
	}
	function activate_password()
	{
		//$this->layout = Configure::read('front_end_layout');
		if ($this->data)
		{
			if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate']))
			{
				$this->set('ident',$this->data['User']['ident']);
				$this->set('activate',$this->data['User']['activate']);

				$return = $this->User->activatePassword($this->data);
				if ($return)
				{
					$this->Session->setFlash('New password is saved.');
					$this->redirect('/users/login');
				}
				else
				{
					$this->Session->setFlash('Sorry password could not be saved. Please check your email and click the password reset link again.');
					$this->redirect('/users/login');
					//$this->flash('Sorry password could not be saved. Please check your email and click the password reset link again.',Configure::read('httpRootUrl').'/users/login');
					//echo 'Sorry password could not be saved. Please check your email and click the password reset link again.';
				}
			}
		}
		else
		{
			if (isset($_GET['ident']) && isset($_GET['activate']))
			{
				$this->set('ident',$_GET['ident']);
				$this->set('activate',$_GET['activate']);
			}
		}
	}
	function change_password()
	{
		//$this->layout = Configure::read('dashboard_layout');
		if ($this->data)
		{
			if ($this->User->changePassword($this->data))
			{
				$this->flash('Password has changed.',Configure::read('httpRootUrl').'/users/dashboard');
			}
		}
		else
		{
			$userID = $this->Session->read('User.id');
			$this->data = $this->User->read(null,$userID);
			$this->data['User']['password']='';
		}
	}
	function login_as_user($id)
	{
		if(Configure::read('SparkPlug.allow.login_as_user')==false) return;
		$user = $this->User->read(null,$id);
		$this->Session->write("User",$user);
		$this->Session->write("User.id",$user["User"]["id"]);
		$this->Session->write("UserGroup.id",$user["UserGroup"]["id"]);
		$this->Session->write("UserGroup.name",$user["UserGroup"]["name"]);
		$this->Session->write('Company.id',$user['Company']['id']);
		$this->redirect('/users/dashboard');
	}
	function login()
	{
		if (isset($_GET["ident"]))
		{
			if ($this->User->activateAccount($_GET))
			{
				$this->flash("Thank you. Your account is now active.",Configure::read('httpRootUrl').'/users/login');
			} else {
				$this->flash("Sorry. There were problems in your account activation.",Configure::read('httpRootUrl').'/users/login');
			}
		}
		else
		{
			if (empty($this->data)) {
				return;
			}

			$user = Authsome::login($this->data['User']);

			if (!$user) {
				$this->Session->setFlash('Unknown user or wrong password');
				return;
			}

			$remember = (!empty($this->data['User']['remember']));
			if ($remember)
			{
				Authsome::persist('2 weeks');
			}

			$this->Session->write("User",$user);
			$this->Session->write("User.id",$user["User"]["id"]);
			$this->Session->write("UserGroup.id",$user["UserGroup"]["id"]);
			$this->Session->write("UserGroup.name",$user["UserGroup"]["name"]);
			$this->Session->write('Company.id',$user['Company']['id']);

			// let's redirect to the page that triggered the login attempt
			$originAfterLogin = $this->Session->read('SparkPlug.OriginAfterLogin');
			if (Configure::read('SparkPlug.redirectOriginAfterLogin') && $originAfterLogin != null) {
				$this->redirect($originAfterLogin);
			} else {
				// redirect to default location
				$this->redirect(Configure::read('SparkPlug.loginRedirect'));
			}
		}
	}

	function forgotPassword()
	{
		//$this->layout = Configure::read('front_end_layout');
		if ($this->data)
		{
			$email = $this->data["User"]["email"];
			if ($this->User->forgotPassword($email))
			{
				$this->flash("Please check your email for instructions on resetting your password.","login",'success');
			} else {
				$this->flash("Your email is invalid or not registered.","login",'error');
			}
		}
	}

	function beforeFilter()
	{

		parent::beforeFilter();
		return;
		$pageRedirect = $this->Session->read('permission_error_redirect');
		$this->Session->delete('permission_error_redirect');

		if (empty($pageRedirect))
		{
			if (!$this->Authsome->get('id'))
			{
				//anonymous?
				$actionUrl = $this->params['url']['url'];
				$permissions = $this->User->UserGroup->getPermissions();
				if (!in_array(ucwords($actionUrl), $permissions))
				{
					$this->Session->write('permission_error_redirect','/users/login');
					$this->Session->setFlash('Please login to view this page.');
					$this->redirect('/users/login');
				}
			}
		}
	}
	
	function redirectIrt()
	{
	/*	$expertID = Authsome::get('username');	
		$expertName_first = Authsome::get('first_name');	
		$expertName_last = Authsome::get('last_name');	
		$expertName = $expertName_first." ".$expertName_last;
		$expertEmail = Authsome::get('email');	
		$expertDept = Authsome::get('department');	
		$tcm_right = Authsome::get('tcm_rights');				
		$tcm_right = "tcm_right".$tcm_right;
		
		
		
		$perm = Authsome::get('UserGroup.name');
		var_dump($perm);
		echo "hello";
		$flag="";
		if(strlen($perm) == 4)
			$flag = "four";
		else
			$flag = "five";
		$perm = $array = str_split($perm);
		if($flag == "four")
		{
			$right = $right."0";
			$MOPright = $MOPright.$perm['0'];
			$FLSright = $FLSright.$perm['1'];
			$LTEright = $LTEright.$perm['2'];
			$certRights = $certRights.$perm['3'];
		}
		else
		{
			$right = $right.$perm['0'];
			$MOPright = $MOPright.$perm['1'];
			$FLSright = $FLSright.$perm['2'];
			$LTEright = $LTEright.$perm['3'];
			$certRights = $certRights.$perm['4'];
		}		
		
		$this->Session->write($right,true);
		$this->Session->write($MOPright,true);
		$this->Session->write($FLSright,true);
		$this->Session->write($LTEright,true);
		$this->Session->write($certRights,true);
		$this->Session->write($success,true);
		$this->Session->write('expertID',$expertID);
		$this->Session->write('expertName',$expertName);
		$this->Session->write('expertEmail',$expertEmail);
		$this->Session->write('expertDept',$expertDept);
		$this->Session->write($tcm_right,true);*/
		
		$this->render(false);
		//$this->redirect('http://172.18.84.122:8080/login.php');		
		$this->redirect('http://138.85.162.107/pqr/trunk/source/NDI/login.php');		
			
	}
	
}
?>
