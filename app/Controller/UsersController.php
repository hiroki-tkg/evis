<?php

// App::import('Vendor','facebook/facebook'); 

class UsersController extends AppController{

	public $name = 'User';
	public $uses = array('User', 'Post', 'Comment');
	// public $layout = 'user';	
 	public $helpers = array( 'Js');

	// public $paginate = array(
 //            'User' => array(
 //                'limit' => 10,
 //                'order' => array('id' => 'asc'),
 //            )
 //        );


	public function beforeFilter(){
		$this->Auth->allow(array('signup', 'confirm'));
		// $this->Facebook = new Facebook(array(
  //           'appId' => '1492040851061804',
  //           'secret' => 'e999384ca4b475d5b5c4b2a7315e92be',
  //           'cookie' => true,
  //       ));

	}

	public function index(){
		// サービス紹介とかなので、あんま使わない
	}

	public function login(){
		// ログイン処理
		if ($this->request->is('post')){
			if ($this->Auth->login()){
				return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
			} else {
		        // Userのis_validを取得
		        $user_state = $this->User->field( 'is_valid', array( 'email' => $this->data['User']['email']));
		        if ($user_state == 0){
		            $this->Session->setFlash( '現在、管理者の承認待ちです。もう少し待ってね');
		        } else {
		            $this->Session->setFlash( 'ユーザ名もしくはパスワードが違います');
		        }
		    }
		}
	}

	public function signup(){
		// 登録処理
		if(!empty($this->data)){
			if($this->data){
				$this->User->create();
				$this->User->save($this->data);
				$this->redirect(array('action'=>'confirm'));
			}
		}
		// メール送信
	}

	public function confirm(){

	}


	public function page($user_id = null){
		$this->layout = 'index';

		$user = $this->Auth->user();
		$this->set('user', $user);

		// 現在のUser_id
		$now = $this->params['pass'][0];
		$this->set('now', $now);



		// 投稿数
		$my_post = $this->Post->find('all', array(
			'conditions' => array(
				'Post.user_id' => $now
			)
		));

		// 画像数
		$my_photos = $this->Post->find('all', array(
			'conditions' => array(
				'Post.user_id' => $now,
				'Post.photo' => NULL
			)
		));
		
		// コメント数
		$comment = $this->Comment->find('all', array(
			'conditions' => array(
				'Comment.user_id' => $now
			)
		));

		$this->set('my_post', $my_post);
		$this->set('my_photos', $my_photos);
		$this->set('comment', $comment);

		if(!empty($user_id)){

			$this->paginate = array(
				'conditions' => array(
					'User.id' => $now,
					'Post.delete_flag' => 0
				),
				'order' => array('Post.created' => 'DESC'),
				'limit' => 20
			);

			$this->set('posts', $this->paginate('Post'));

			$user_data = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $now
				)
			));

			$this->set('user_data', $user_data);

		}else{
			throw new NotFoundException();				
		}

	}

	public function edit(){
		$this->layout = 'index';
	 	$user = $this->Auth->user();
		$id = $user['id'];
		
		$this->paginate = array(
			'conditions' => array(
				'User.id' => $user['id'],
				'Post.delete_flag' => 0
			),
			'order' => array('Post.created' => 'DESC'),
			'limit' => 20
		);

			$this->set('posts', $this->paginate('Post'));


	    if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){

	        if( $this->User->save( $this->request->data ) ){

		        $this->Session->setFlash('プロフィール編集しました', 'default', array('class'=> 'alert alert-success'));         
	            $this->redirect(array('action' => 'page', $id));

	        }else{
		        $this->Session->setFlash('なんか知らんけど、編集できなかったよ', 'default', array('class'=> 'alert alert-danger'));
	        }
	         
	    }else{
	     
	        $this->request->data = $this->User->read();
	    }

		$this->set('user', $user);
	}

	public function thanks(){
		// sessionメッセージ表示してリダイレクトするだけ。できれば時限にしたい
	}

	public function activate(){
		// メールに乗せたアクティベートリンクを踏んだらここに来る。paramsでユーザーのis_valid絡むをupdate
	}

	public function logout(){
		if($this->Auth->logout()){
		    $this->Session->destroy();
	    	// $this->Facebook->destroySession();
	        $this->Session->setFlash('ログアウトしました', 'default', array('class'=> ''));
			return $this->redirect(array('action' => 'index', 'controller' => 'users'));
		}
	}

	public function delete(){
		// 今回は物理削除じゃなくて論理削除にしよう
	}


}