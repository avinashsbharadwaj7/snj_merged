<?php
class UserGroupPermissionsController extends SparkPlugAppController {
	var $name = 'UserGroupPermissions';
	var $uses = array('SparkPlug.UserGroupPermission','SparkPlug.UserGroup');
        var $paginate = array('limit'=>50);

	function add()
	{
		//$this->layout = Configure::read('dashboard_layout');
		$userGroups = $this->UserGroup->find('list');
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