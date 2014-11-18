<?php

class Post extends AppModel {
	public $name = 'Post';

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