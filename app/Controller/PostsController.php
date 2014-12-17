<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController{

	public $name = 'Post';
	public $uses = array('Post', 'User', 'Comment', 'Favorite');
	public $layout = 'index';	
	public $components = array('Session');
 	public $helpers = array('Js', 'CreatedTime');

	public function beforeFilter(){
	}

	public function index(){

		$this->Post->recursive = 2;
		$this->paginate = array(
			'conditions' => array(
				'Post.delete_flag' => 0,
				// 'Post.is_anonymous' => 0
			),
			'order' => array('Post.created' => 'DESC'),
			'limit' => 20
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
		$this->Session->setFlash('エビートが保存されました', 'default', array('class'=> 'alert alert-success alert-dismissable'));

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
		$this->Session->setFlash('あなたのエビートは削除されました');		
		$this->redirect('/posts');
		
	}

	public function anonymous(){

		$this->Post->recursive = 2;
		$this->paginate = array(
			'conditions' => array(
				'Post.delete_flag' => 0,
				'Post.is_anonymous' => 1
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

	public function favorite(){
		$this->autoRender = false;
		$user = $this->Auth->user();

 		if($this->request->is('ajax')) {

			$post_id = $this->data['post_id'];
			$user_id = $user['id'];
 			$fav_num = $this->data['fav_num'];
 			
 			// Favoriteしていたら、その情報を入れる
			$fav_on = $this->Favorite->find('all', array(
				'conditions' => array(
					'Favorite.user_id' => $user_id,
					'Favorite.post_id' => $post_id,
					'Favorite.is_done' => 1
					)
			));

			// Favを押していなくても、一度でも押した事があれば、それを取得
			$fav_off = $this->Favorite->find('all', array(
				'conditions' => array(
					'Favorite.user_id' => $user_id,
					'Favorite.post_id' => $post_id)
			));

			// Fav押してある 
			if(!empty($fav_on)){
				$data = array(
					'id' => $fav_on[0]['Favorite']['id'],
					'user_id' => $user_id,
					'is_done' => '0',
				);
				echo "おしてる";
				pr($data);
				$this->Favorite->save($data);

			// Fav押してない
			}elseif(!empty($fav_off)){
				$data = array(
					'id' => $fav_off[0]['Favorite']['id'],
					'user_id' => $user_id,
					'post_id' => $post_id,
					'is_done' => '1',
					'type' => $fav_num					
				);
				echo "おしてない";
				pr($data);
				$this->Favorite->save($data);

			// はじめての場合
			}else{
				$data = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'is_done' => '1',	
					'type' => $fav_num					
				);
				$this->Favorite->save($data);
				echo "はじめて";
				// 保存させる

			}
		}

	}

}