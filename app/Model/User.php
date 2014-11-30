<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $name = 'User';

	public function beforesave($options = array()){
		if (isset($this->data[$this->alias]['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			return true;
		}
	}

	// public $hasMany = array(
	// 	"Post" => array(
	// 		'className' => 'Post',
	// 		'conditions' => '',
	// 		'order' => '',
	// 		'dependent' => false,
	// 	)
	// );

    public $actsAs = [
        'Upload.Upload' => [
            'profile_img' => [
                'fields' => [
                    'dir' => 'img_dir'
                ]
            ]
        ]
    ];



}

