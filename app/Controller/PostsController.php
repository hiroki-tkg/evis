<?php

class PostsController extends AppController{

	public $name = 'Post';
	public $uses = array('Post');
	public $layout = 'post';	

	public function beforeFilter(){
		// $this->Auth->allow(array(''));
	}

	public function index(){

	}

	public function add(){

	}

	public function delete(){
		
	}

	public function comment(){

	}

	public function comment_delete(){

	}



}
