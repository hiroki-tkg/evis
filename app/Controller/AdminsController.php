<?php

App::uses('AppController', 'Controller');

class AdminsController extends AppController{

	public $name = 'Admin';
	public $uses = array('Post', 'User', 'Comment', 'Favorite', 'Album');
	// public $layout = 'index';	
	public $components = array('Session');
 	public $helpers = array( 'Js');

	public function beforeFilter(){

		$user = $this->Auth->user();
		// 管理者でない場合(管理者=1)

		if($user['is_admin'] == '0'){
			$this->Session->setFlash('管理者以外は入れない様にしてます');
			return $this->redirect(array('action' => 'login', 'controller' => 'users'));
		}

	}

	public function index(){

		$all = $this->User->find('all', array(
			'conditions' => array(
				'User.is_valid' => 0 
				)
		));

		$this->paginate = array(
			'conditions' => array(
				'User.is_valid' => 0,
				// 'Post.is_anonymous' => 0
			),
			'order' => array('User.created' => 'DESC'),
			'limit' => 20
		);

		$this->set('Users', $this->paginate());

	}

}

