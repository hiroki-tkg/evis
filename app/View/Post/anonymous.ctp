<?php
    $my_post = count($my_post);
    $my_photos = count($my_photos);
    $photos = $my_post - $my_photos;
?>

<div class="col-sm-3 col-md-3 colum-left">
    <div class="thumbnail">
    <?php
        if(empty($user['profile_img'])){
	        echo $this->Html->image('default_icon.png', array('alt' => '', 'border' => '0'));
    	}else{
        ?>
        <img src="/files/user/profile_img/<?php echo $user['id']; ?>/<?php echo $user['profile_img']; ?>">
        <?php } ?>
	<div class="caption">
            <h3><a href="/users/page/<?php echo $user['id']; ?>"><?php echo $user['username']?></a></h3>
        </div>
    </div>
    <ul class="list-group">
        <a href="/users/page/<?php echo $user['id']; ?>"><li class="list-group-item"><span class="badge badge-warning">
        <?php echo $my_post; ?></span>投稿数</li></a>
        <a href="/users/page/<?php echo $user['id']; ?>"><li class="list-group-item"><span class="badge badge-primary"><?php echo $photos; ?></span>画像数</li></a>
        <a href="/users/page/<?php echo $user['id']; ?>"><li class="list-group-item"><span class="badge badge-success"><?php echo count($comment); ?></span>コメント数</li></a>
    </ul>
</div>

<div class="col-sm-6 col-md-6">

<div id="content_load">
	<?php foreach ($Posts as $post): ?>

	<div id="content_index">

		<div onclick="comment_launch(<?php echo $post['Post']['id']; ?>);" class="">
			<div class="tweet">
				<div class="tweet_header">
					<div class="tweet_icon_box">
					<?php 
						if($post['Post']['is_anonymous'] == 1){

								echo $this->Html->image('anonymous.png', array('class' => 'tweet_icon'));

						}else{

							if($post['User']['profile_img']){
								echo $this->Html->image('/files/user/profile_img/' . $post["User"]["id"] ."/". $post["User"]["profile_img"], array('class' => 'tweet_icon'));
							}else{
								echo $this->Html->image('default_icon.png', array('class' => 'tweet_icon'));
							}
						}
					?>
					</div>
					<span class='tweet_name'>
					<?php 
						if($post['Post']['is_anonymous'] == 1){
						
							echo "名無しの恵比寿さん";
							echo '<span class="label label-warning is_anonymous_badge">秘密</span>';

						}else{

							if(!$post['User']['username']){
								echo "存在しないユーザー";
							}else{
								echo "<a href='/users/page/" . $post['User']['id'] ."'>" . $post['User']['username'] . "</a>";
							}
						}
					?>
					</span>
					<?php echo "<span class='tweet_created'>".$post['Post']['created'] . "</span>"; ?>
				</div>
				<div class="tweet_bottom">
					<p class="tweet_content"><?php echo $post['Post']['content']; ?></p>
					<?php if($post['Post']['photo']){ ?>
						<div class="tweet_photo">
							<?php echo $this->Html->image('/files/post/photo/'. $post['Post']['id'] .'/'. $post['Post']['photo'], array('border' => '0')); ?>
						</div>
					<?php } ?>
					<div class="tweet_bottom_meta clearfix">
						<div class="tweet_bottom_meta_left">
							<div class="left_comment">
								<a id="comment_launch_<?php echo $post['Post']['id']; ?>"><span class="glyphicon glyphicon-comment"></span></a>
								<span class="count"><?php echo count($post['Comment']); ?></span>
							</div>				
							<div class="right_others clearfix">				
								<a onclick="favorite(<?php echo $post['Post']['id']; ?>, '1');"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

								<a onclick="favorite(<?php echo $post['Post']['id']; ?>, '2');"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

								<a onclick="favorite(<?php echo $post['Post']['id']; ?>, '3');"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

								<a onclick="favorite(<?php echo $post['Post']['id']; ?>, '4');"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

								<a onclick="favorite(<?php echo $post['Post']['id']; ?>, '5');"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

							</div>
						</div>
						<div class="tweet_bottom_meta_right">
						<?php
						if($user['id'] == $post['Post']['user_id']){ ?>
							<a href="/posts/delete_post?post_id=<?php echo $post['Post']['id']; ?>" onclick="return confirm('本当にいいですか？')"><span class='glyphicon glyphicon-trash'></span></a>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- コメント -->
		<div class="comment_area" id="comment_area_<?php echo $post['Post']['id']; ?>">
		<?php for ($i=0; $i < count($post['Comment']); $i++) { ?>
			<div class="comment_list">
						<div class="tweet_header">
					<div class="tweet_icon_box">
					<?php 
						if(!empty($post['Comment'][$i]['User']['profile_img'])){
							echo $this->Html->image('/files/user/profile_img/' . $post['Comment'][$i]["User"]["id"] ."/". $post['Comment'][$i]["User"]["profile_img"], array('class' => 'tweet_icon'));
						}else{
							echo $this->Html->image('default_icon.png', array('class' => 'tweet_icon'));
						}
					?>
					</div>
					<span class='tweet_name'>
					<?php 
						if(empty($post['Comment'][$i]['User']['username'])){
							echo "存在しないユーザー";
						}else{
							echo "<a href='posts/users/page/" . $post['Comment'][$i]['User']['id'] ."'>" . $post['Comment'][$i]['User']['username'] . "</a>"; 
						}
						?>
					</span>
					<?php echo "<span class='tweet_created'>".$post['Comment'][$i]['created'] . "</span>"; ?>
				</div>
				<div class="tweet_bottom">
					<p class="tweet_content"><?php echo $post['Comment'][$i]['content']; ?></p>
					<?php if($post['Comment'][$i]['photo']){ ?>
						<div class="tweet_photo">
							<?php echo $this->Html->image('/files/post/photo/'. $post['Comment'][$i]['Post']['id'] .'/'. $post['Comment'][$i]['Post']['photo'], array('border' => '0')); ?>
						</div>
					<?php } ?>
					<div class="tweet_bottom_meta clearfix">
						<div class="tweet_bottom_meta_left">
							<div class="left_comment">
	<!-- 							<a id="comment_launch_<?php echo $post['Comment'][$i]['id']; ?>"><span class="glyphicon glyphicon-comment"></span></a>
								<span class="count"><?php echo count($post['Comment']); ?></span> -->
							</div>				
							<div class="right_others clearfix">				
								<!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span> -->
							</div>
						</div>
						<div class="tweet_bottom_meta_right">
						<?php
						if($user['id'] == $post['Comment'][$i]['user_id']){ ?>
							<a href="/posts/delete_post?post_id=<?php echo $post['Post']['id']; ?>" onclick="return confirm('本当にいいですか？')"><span class='glyphicon glyphicon-trash'></span></a>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php }?>

			<div class="comment_area_inner">
				<?php
				    echo $this->Form->create('Comment', array('action' => 'add_post', 'class' => 'clearfix'));
				    echo $this->Form->hidden('user_id', array('value' => $user['id']));
				    echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
				    echo $this->Form->textarea('content', array('rows'=> 3,'class' => 'form-control', 'placeholder' => 'コメントする'));
				    echo $this->Form->submit('エビート', array('class' => 'btn'));
				    echo $this->Form->end();
				?>
			</div>
		</div>                                    

	</div> <!-- content_index -->

	<?php endforeach; ?>

    <div id="page-nav">
        <?php echo $this->Paginator->next('次のページ',array('class'=>'next')); ?>
    </div>

</div><!-- content_load -->
</div>