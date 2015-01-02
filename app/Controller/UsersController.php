<?php

class UsersController extends AppController{

	public $name = 'User';
	public $uses = array('User', 'Post', 'Comment');
	public $layout = 'login';	
 	public $helpers = array( 'Js');

	public function beforeFilter(){
		$this->Auth->allow(array('*'));
	}

	public function register(){

		$data = $this->Session->read('data');

		$user = $this->User->find("all", array(
            'conditions' => array('User.facebook_id' => $data['facebook_id'])
        ));

		// ログインした事ある
        if(!empty($user)){

	    	if ($this->Auth->login($user)){
		        $this->Session->setFlash('You are Logged in succesfully.', 'default', array('class'=> 'alert alert-success'));			
		        return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
	        }
		   
        // ログインした事ない(初めて)
        }else{

        	$this->User->save($data);
  			$this->Session->setFlash('You are Logged in succesfully.', 'default', array('class'=> 'alert alert-success'));  
     	    return $this->redirect(array('controller' => 'user', 'action' => 'waiting'));       

        }
	}

	public function waiting(){
	}

	public function index(){
		$this->layout = 'index';
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

	public function request(){
	    $url = $this->Facebook->getLoginUrl( array(
	    	'redirect_uri' => '/users/signup/',
	        'scope' => 'user_interests,email,user_likes,user_birthday,user_interests,user_about_me,user_activities',
	        'canvas' => 1,
	        'fbconnect' => 0
	    ));
    	$this->redirect($url);
	}

	public function signup(){

		$user = $this->Facebook->getUser();
        $me = $this->Facebook->api('/me','GET',array('locale'=>'en_US'));
        $me_birth = $this->Facebook->api('/me?fields=birthday');

        $facebook_id = $user;

        $user = '';
        $user = $this->User->find("all", array(
            'conditions' => array('User.facebook_id' => $facebook_id)
        ));

        // $userに値なし。FBログインがはじめてのユーザー
        if (empty($user)) {

    	    $facebook_id = $me['id'];
            $email = $me['email'];
            $first = $me['first_name'];
            $last = $me['last_name'];
            $gender = $me['gender'];
            $link = $me['link'];
            $locale = $me['locale'];
    		$img  = 'https://graph.facebook.com/' . $me["id"]  . '/picture?type=large';
            $username = $me['name'];
            $timezone = $me['timezone'];

            $birthday = $me_birth['birthday'];
			$birthdays = explode('/', $birthday);

            $data = array(
                'facebook_id' => $facebook_id, 
                'email' => $email, 
                'first_name' => $first, 
                'last_name' => $last, 
                'gender' => $gender, 
                'link' => $link,
                'locale' => $locale,
                'img' => $img,
                'name' => $username,
                'birth_month' => $birthdays[0],
                'birth_day' => $birthdays[1],
                'birth_year' => $birthdays[2],
                'timezone' => $timezone
            );     

			$this->User->create();
			$this->User->save($data);		           

			// メール送信
            $email_address = $email;
            $title = "[恵比寿ハウス] Evitterにようこそ";
			$msg = 
				"Evitterにようこそ\r\r".
				"楽しんでってね\r".
				"\r\rEvitter制作チーム";
			$email = new CakeEmail('smtp');
			$email -> to($email_address)
				->emailFormat('text')
				->subject($title)
				->send($msg);

            return $this->redirect(array('action'=>'confirm'));

        }else{
	        $this->Session->setFlash('Your account has not been activated.', 'default', array('class'=> 'alert alert-danger'));			
		}
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
					'Post.delete_flag' => 0,
					'Post.is_anonymous' => 0
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