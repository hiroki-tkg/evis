<?php

App::uses('AppController', 'Controller');

class AlbumsController extends AppController{

	public $name = 'Album';
	public $uses = array('Post', 'User', 'Comment', 'Favorite', 'Album');
	public $layout = 'index';	
	public $components = array('Session');
 	public $helpers = array( 'Js');

	public function beforeFilter(){
	}

	public function index(){
		$user = $this->Auth->user();
		$this->set('user', $user);

		// $this->Post->recursive = 0;
		$this->paginate = array(
			'conditions' => array(
				'Post.delete_flag' => 0,
				'NOT' => array(
					'photo' => ''
				)
			),
			'order' => array('Post.created' => 'DESC'),
			'limit' => 30
		);
		$data = $this->paginate('Post');
		$this->set('Photos', $this->paginate('Post'));
	}

}

