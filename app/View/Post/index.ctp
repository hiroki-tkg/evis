<h2>Eveetする！</h2>
<?php
    echo $this->Form->create('Posts', array('action' => 'add_post'));
    // echo $this->Form->hidden('user_id', array('value' => $user['id']));
    echo $this->Form->textarea(__('content'), array('rows'=> 7,'class' => '', 'placeholder' => 'いまどうしてる？'));
    echo $this->Form->submit(__('Submit'), array('class' => ''));
    echo $this->Form->end();
?>


<?php
	foreach ($Posts as $post): 
	echo $post['Post']['content'];	
	echo $post['Post']['created'];
	echo $post['User']['username'];
	echo $post['Post']['delete_flag'];
	echo "<a href='/evis/posts/delete_post?post_id=" . $post['Post']['id'] . "'>削除</a><br />";
	endforeach;
?>