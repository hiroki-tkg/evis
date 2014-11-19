<?php

// App::import('Vendor','facebook/facebook'); 

class UsersController extends AppController{

	public $name = 'User';
	public $uses = array('User');
	public $layout = 'user';	

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


	public function page(){
		$user = $this->Auth->user();
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