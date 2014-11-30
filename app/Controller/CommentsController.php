<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController{

	public $name = 'Comment';
	public $uses = array('Post', 'User', 'Comment');
	// public $layout = 'index';	
	public $components = array('Session');
 	public $helpers = array( 'Js');

	public function beforeFilter(){
	}

	public function add_post(){

		$data = $this->request->data['Comment'];

		$this->Comment->save($data);
		$this->Session->setFlash('保存されました');
		$this->redirect('/posts');
		
	}

	public function delete_post(){
		$this->autoRender = false;
		$this->layout = false;
		$post_id = $this->params['url']['post_id'];
		$data = array(
			'id' => $post_id,
			'delete_flag' => 1
		);

		$this->Post->save($data);
		$this->redirect('/posts');
		
	}


}
