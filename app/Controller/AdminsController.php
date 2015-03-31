<?php

App::uses('AppController', 'Controller');

class AdminsController extends AppController{

	public $name = 'Admin';
	public $uses = array('Post', 'User', 'Comment', 'Favorite', 'Album');
	public $layout = 'index';	
	public $components = array('Session', 'Email');
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

		$user = $this->Auth->user();
		$this->set('user', $user);
		// $all = $this->User->find('all', array(
		// 	'conditions' => array(
		// 		'User.is_valid' => 0 
		// 		)
		// ));

		$this->paginate = array(
			'conditions' => array(
				'User.is_valid' => 0
			),
			'order' => array('User.created' => 'DESC'),
			'limit' => 20
		);

		$this->set('Registered', $this->paginate('User'));


		$this->paginate = array(
			'conditions' => array(
				'User.is_valid' => 1,
				// 'Post.is_anonymous' => 0
			),
			'order' => array('User.created' => 'DESC'),
			'limit' => 20
		);

		$this->set('Activated', $this->paginate('User'));

		$this->paginate = array(
			'conditions' => array(
				'User.is_valid' => 9,
			),
			'order' => array('User.created' => 'DESC'),
			'limit' => 20
		);

		$this->set('Declined', $this->paginate('User'));

	}

	public function update(){
		// $this->autoRender = false;
		$user = $this->Auth->user();

		$is_valid = $this->params['url']['is_valid'];
		$id = $this->params['url']['id'];

		$data = array(
			'id' => $id,
			'is_valid' => $is_valid,
		);

		$this->User->id = $this->User->save($data);
		if($this->User->saveField('is_valid', $is_valid)){

			if($is_valid == 2){

				$user = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $id
					))
				);

				// メール送信
	            $url = FULL_BASE_URL;
	            $email_address = $user['User']['email'];
	            $title = "【Evitter】アカウントが有効になりました。";
				$msg = 
					"管理者の許可が出ました！でかいですね。\r".
					"早速Evitterにログインして、わちゃわちゃしましょう\r\r".
					$url.
					"\r\rEvitter Team";
				$email = new CakeEmail('gmail');
				$email -> to($email_address)
					->emailFormat('text')
					->subject($title)
					->send($msg);

			}

		    $this->Session->setFlash('更新しました！', 'default', array('class'=> 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}

	}

}

