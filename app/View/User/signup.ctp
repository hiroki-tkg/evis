<div class="col-sm-4 col-md-3">
<h2>会員登録</h2>
	<?php

		echo $this->Form->create('User', array('action' => 'signup'));
		echo '<div class="form-group">';
		echo $this->Form->input('username', array('class' => 'form-control','placeholder' => 'ユーザーネーム'));
		echo "</div>";

		echo '<div class="form-group">';
		echo $this->Form->input('email', array('class' => 'form-control','placeholder' => 'Email'));
		echo "</div>";

		// echo '<div class="form-group">';
		// echo $this->Form->input('gender', array('class' => 'form-control','placeholder' => '性別'));
		// echo "</div>";

		echo '<div class="form-group">';
		echo $this->Form->input('password', array('class' => 'form-control','placeholder' => 'パスワード'));
		echo "</div>";

		echo '<div class="form-group">';
		echo $this->Form->input('password_confirm', array('type' => 'password','class' => 'form-control','placeholder' => 'パスワード確認'));
		echo "</div>";
		
		echo "<br />";
		echo $this->Form->submit('登録', array( 'onclick' => "",'class' => 'form-control register_submit'));
		echo $this->Form->end();

	?>

</div>
