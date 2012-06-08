<?php
class UserPermissions extends SparkPlugAppController {
	var $name = 'UserPermissions';
	var $uses = array('SparkPlug.UserPermissions');
        var $paginate = array('limit'=>50);

	function add()
	{
		//$this->layout = Configure::read('dashboard_layout');
		$userpermissions = $this->UserPermissions->find('list');
		$this->set('userGroups',$userGroups);
	}

	function edit($id=null)
	{
		//$this->layout = Configure::read('dashboard_layout');
		$userGroups = $this->UserGroup->find('list');

		$this->set('userGroups',$userGroups);

		if (!empty($this->data))
		{
			if ($this->UserGroupPermission->save($this->data))
			{
				$this->Session->setFlash('User Group Permission is saved. Rules cache optimized.');
				$this->redirect('/user_group_permissions/index');
			}
		}
		else
		{
			$this->data = $this->UserGroupPermission->read(null,$id);
		}
	}

	function index()
	{
		//$this->layout = Configure::read('dashboard_layout');
		$permissions = $this->paginate('UserGroupPermission');
		$this->set('permissions',$permissions);
	}

}
?>
