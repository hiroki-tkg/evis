<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController{

	public $name = 'Post';
	public $uses = array('Post', 'User', 'Comment', 'Favorite');
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


 	// 	if($this->request->is('ajax')) {

		// 	$postid = $this->data['postid'];
			
		// 	// ログインユーザーがこの記事に対して、バケツを押していたらその情報を入れる
		// 	$wish_on = $this->Wish->find('all', array(
		// 		'conditions' => array(
		// 			'Wish.user_id' => $user['id'],
		// 			'Wish.post_id' => $postid,
		// 			'Wish.is_done' => 1)
		// 	));

		// 	$wish_colum = $this->Wish->find('all', array(
		// 		'conditions' => array(
		// 			'Wish.user_id' => $user['id'],
		// 			'Wish.post_id' => $postid)
		// 	));

		// 	// Wish押してある 
		// 	if(!empty($wish_on)){
		// 		$data = array(
		// 			'id' => $wish_on[0]['Wish']['id'],
		// 			'user_id' => $user['id'],
		// 			'post_id' => $postid,
		// 			'is_done' => '0',
		// 		);
		// 		$this->Wish->save($data);
		// 		// echo "this event is got rid of your wish list";
		// 		// 増減値を$updateに代入
		// 		$update = -1;

		// 		// 経験値テーブルから現在の経験値を取得
		// 		$experience = $this->Experience->find('first', array(
		// 			'conditions' => array(
		// 				'Experience.user_id' => $user['id']
		// 			))
		// 		);

		// 		if(empty($experience)){
		// 			$experience_now = 0;
		// 			// 現状の経験値に、増減分をプラス、保存
		// 			$point = $experience_now + $update;
		// 			$experience_score = array(
		// 				'user_id' => $user['id'],
		// 				'experience' => $point
		// 			);		

		// 		}else{
		// 			$experience_now = $experience['Experience']['experience'];
		// 			// 現状の経験値に、増減分をプラス、保存
		// 			$point = $experience_now + $update;
		// 			$experience_score = array(
		// 				'id' => $experience['Experience']['id'],
		// 				'user_id' => $user['id'],
		// 				'experience' => $point
		// 			);
		// 		}
				
		// 		$this->Experience->save($experience_score);

		// 	}else{

		// 		// wishを一度も押してない
		// 		if (empty($wish_colum)){
		// 			$data =  array(
		// 				'user_id' => $user['id'],
		// 				'post_id' => $postid,
		// 				'is_done' => '1'
		// 			);					
		// 			$this->Wish->save($data);

		// 		}else{
		// 		// wishを一回以上押した事あるが、今は押された状態にない
		// 			$data = array(
		// 				'id' => $wish_colum[0]['Wish']['id'],
		// 				'user_id' => $user['id'],
		// 				'post_id' => $postid,
		// 				'is_done' => '1',
		// 			);
		// 			$this->Wish->save($data);
		// 		}

		// 		// echo "this event is in your wish list";

				
		// 		}				
		// 	}
		// }

