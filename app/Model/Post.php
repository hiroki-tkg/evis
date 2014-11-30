<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {
	public $name = 'Post';

    // public $actsAs = array(
	   //  'Upload.Upload' => array(
	   //      'photo' => array(
	   //          'fields' => array(
	   //              'dir' => 'photo_dir'
	   //  		)
	   //      )
	   //  )
    // );
    public $actsAs = [
        'Upload.Upload' => [
            'photo' => [
                'fields' => [
                    'dir' => 'photo_dir'
                ]
            ]
        ]
    ];

	public $belongsTo = array(
		"User" => array(
			'className' => 'User',
			'conditions' => '',
			'order' => '',
			'dependent' => false,
			'foreignKey' => 'user_id'
		)
	);

	public $hasMany = array(
		"Comment" => array(
			'className' => 'Comment',
			'conditions' => '',
			'order' => '',
			'dependent' => false,
			'foreignKey' => 'post_id'
		)
	);

}



?>