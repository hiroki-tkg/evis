<?php

class UsersController extends AppController{

	public $name = 'User';
	public $uses = array('User');
	public $layout = 'user';	

	public function beforeFilter(){
		// $this->Auth->allow(array(''));
	}

	public function index(){
		// サービス紹介とかなので、あんま使わない
	}

	public function login(){
		// ログイン処理
	}

	public function signup(){
		// 登録処理
		// メール送信
	}

	public function thanks(){
		// sessionメッセージ表示してリダイレクトするだけ。できれば時限にしたい
	}

	public function activate(){
		// メールに乗せたアクティベートリンクを踏んだらここに来る。paramsでユーザーのis_valid絡むをupdate
	}

	public function logout(){

	}

	public function delete(){
		// 今回は物理削除じゃなくて論理削除にしよう
	}


}