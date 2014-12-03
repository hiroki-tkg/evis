<?php

class Favorite extends AppModel {
	public $name = 'Favorite';

	public $belongsTo = array(
		"Post" => array(
			'className' => 'Post',
			'conditions' => '',
			'order' => '',
			'dependetn' => false,
			'foreignKey' => 'post_id'
			)
		);	

}