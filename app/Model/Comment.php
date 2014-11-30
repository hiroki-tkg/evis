<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
	public $name = 'Comment';

	public $belongsTo = array(
		"User" => array(
			'className' => 'User',
			'conditions' => '',
			'order' => '',
			'dependent' => false,
			'foreignKey' => 'user_id'
		)
	);

}

?>