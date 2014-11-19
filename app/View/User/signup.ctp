<?php

    $fb = $this->Session->read('data');

	echo $this->Form->create('User', array('action' => 'signup'));
	echo $this->Form->input('username', array('class' => ''));
	echo $this->Form->input('email', array('class' => ''));
	echo $this->Form->input('password', array('class' => ''));
	echo $this->Form->input('password_confirm', array('type' => 'password','class' => ''));
	
	echo "<br />";
	echo $this->Form->submit(__('Add'), array('div' => false, 'onclick' => "",'class' => ''));
	echo $this->Form->end();

?>



