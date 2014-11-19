<?php
	if($this->Session->check('Message.auth'))
	echo $this->Session->flash('auth');

	echo $this->Form->create('User', array('action' => 'login', 'class'=>''));
	echo $this->Form->input('email', array('class' => ''));
	echo $this->Form->input('password', array('class' => ''));
	echo $this->Form->submit('login', array('class'=>''));
	echo $this->Form->end();
?>
