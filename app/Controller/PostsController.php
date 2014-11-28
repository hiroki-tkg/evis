<?php

class PostsController extends AppController{

	public $name = 'Post';
	public $uses = array('Post', 'User');
	public $layout = 'post';	
	public $components = array('Session');

	public function beforeFilter(){
	}

	public function index(){

		$this->paginate = array(
			'conditions' => array('Post.delete_flag' => 0),
			'order' => array('Post.created' => 'DESC'),
			'limit' => 30
		);

		$data = $this->paginate('Post');
		$this->set('Posts', $this->paginate('Post'));

		$user = $this->Auth->user();
		$this->set('user', $user);
	}

	public function add_post(){

		$data = $this->data['Posts'];
		$this->Post->save($data);
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

	public function comment(){

	}

	public function comment_delete(){

	}



}
