恵比寿ハウスに良く来るメンバーであれば、承認ボタンを押して下さい。<br />
もし違う場合は、拒否して下さい。<br />
拒否しても、この管理画面には残るので、後で承認する事も出来るよ

<?php 
	foreach ($Users as $user) {

		echo $user['User']['username'];
		echo $user['User']['gender'];
		echo $user['User']['facebook_id'];

		// echo $user['User']['link'];

	}

?>