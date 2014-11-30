<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController{

	public $name = 'Post';
	public $uses = array('Post', 'User', 'Comment');
	public $layout = 'index';	
	public $components = array('Session');
 	public $helpers = array( 'Js');

	public function beforeFilter(){
	}

	public function index(){

		$this->Post->recursive = 2;
		$this->paginate = array(
			'conditions' => array(
				'Post.delete_flag' => 0
			),
			'order' => array('Post.created' => 'DESC'),
			'limit' => 30
		);

		$data = $this->paginate('Post');
		$this->set('Posts', $this->paginate('Post'));

		$user = $this->Auth->user();
		$this->set('user', $user);

		// 投稿数
		$my_post = $this->Post->find('all', array(
			'conditions' => array(
				'Post.user_id' => $user['id']
			)
		));

		// 画像数
		$my_photos = $this->Post->find('all', array(
			'conditions' => array(
				'Post.user_id' => $user['id'],
				'Post.photo' => NULL
			)
		));
		
		// コメント数
		$comment = $this->Comment->find('all', array(
			'conditions' => array(
				'Comment.user_id' => $user['id']
			)
		));

		$this->set('my_post', $my_post);
		$this->set('my_photos', $my_photos);
		$this->set('comment', $comment);
	}

	public function add_post(){

		$data = $this->request->data['Posts'];

		$this->Post->save($data);
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

	public function comment(){

	}

	public function comment_delete(){

	}



}
