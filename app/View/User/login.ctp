<div class="front-signup js-front-signup">
	<h2>
		<strong>Evitter始めませんか?</strong>  <a href="/users/signup">登録する</a>
	</h2>
	<!-- <a href="/users/request"><button type="submit" class="btn signup-btn u-floatRight">Evitterに登録する</button></a> -->

      <?php
      if($this->Session->check('Message.auth'))
      
      echo $this->Session->flash('auth');
      echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-horizontal'));
      echo '<div class="js-float-label-wrapper">';
      echo $this->Form->input('email', array('class' => 'form-control'));
      echo '</div>';
      echo '<div class="js-float-label-wrapper">';
      echo $this->Form->input('password', array('class' => 'form-control'));
      echo '</div>';
      echo $this->Form->submit('ログイン', array('class'=>'btn btn-default'));
      echo $this->Form->end();
    ?>


</div>
