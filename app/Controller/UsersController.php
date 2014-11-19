<?php

class UsersController extends AppController{

	public $name = 'User';
	public $uses = array('User');
	public $layout = 'user';	

	public function beforeFilter(){
		$this->Auth->allow(array('signup', 'confirm'));
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
		        $this->Session->setFlash('Emailとパスワードの組み合わせが正しくありません', 'default', array('class'=> 'alert alert-danger'));
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