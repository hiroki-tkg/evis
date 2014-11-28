<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $name = 'User';

	public function beforesave($options = array()){
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
	}

	public $hasMany = array(
		"Post" => array(
			'className' => 'Post',
			'conditions' => '',
			'order' => '',
			'dependent' => false,
		)
	);

}

