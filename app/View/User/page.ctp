<?php

foreach ($posts as $post) {

	echo $post['User']['username'];
	echo $post['Post']['created'];
	echo $post['Post']['content'];
	echo "<br />";

}



?>