<a href=""><?php echo $user['username']; ?></a>

<h2>Tweetする！</h2>
<?php
    echo $this->Form->create('Posts', array('action' => 'add_post'));
    echo $this->Form->hidden('user_id', array('value' => $user['id']));
    echo $this->Form->textarea(__('content'), array('rows'=> 7,'class' => '', 'placeholder' => 'いまどうしてる？'));
    echo $this->Form->submit(__('Submit'), array('class' => ''));
    echo $this->Form->end();
?>


<?php
	foreach ($Posts as $post): 
	echo $post['Post']['content'];	
	echo $post['Post']['created'];
	echo $post['User']['username'];
	if($user['id'] == $post['Post']['user_id']){
		echo "<a href='/evis/posts/delete_post?post_id=" . $post['Post']['id'] . "'>削除</a><br />";
	}
	// 返信リンクを押すとポップアップでwindowひらく
	// 自動で@が入っている
	echo "<a>返信</a>";
	endforeach;
?>



<?php
// パラメータでtweetのIDを取得
// それをhiddenで保存
    echo $this->Form->create('Posts', array('action' => 'add_post'));
    echo $this->Form->hidden('user_id', array('value' => $user['id']));
    // echo $this->Form->hidden('reply_id', array('value' => $reply_id));
    echo $this->Form->textarea(__('content'), array('rows'=> 7,'class' => '', 'placeholder' => 'いまどうしてる？'));
    echo $this->Form->submit(__('Submit'), array('class' => ''));
    echo $this->Form->end();
?>

