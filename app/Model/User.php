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
	
	public function afterSave($created, $options = array()){
	    parent::afterSave($created,$options);
	 
	    //updating authentication session
	    App::uses('CakeSession', 'Model/Datasource');
	    CakeSession::write('Auth',$this->findById(AuthComponent::user('id')));
	 
	    return true;
	}


	public function getActivationHash() {
        // ユーザIDの有無確認
        if (!isset($this->id)) {
            return false;
        }
        // 更新日時をハッシュ化
        return Security::hash( $this->field('updated'), 'sha1', true);
    }


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

