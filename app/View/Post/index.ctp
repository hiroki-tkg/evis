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
            <h3>Hiroki Takagi</h3>
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><span class="badge badge-warning">
        <?php echo $my_post; ?></span>投稿数</li>
        <li class="list-group-item"><span class="badge badge-primary"><?php echo $photos; ?></span>画像数</li>
        <li class="list-group-item"><span class="badge badge-success"><?php echo count($comment); ?></span>コメント数</li>
    </ul>
</div>

<div class="col-sm-6 col-md-6">

<?php
    echo $this->Form->create('Posts', array('action' => 'add_post', 'type' => 'file', 'class' => 'clearfix'));
    echo $this->Form->hidden('user_id', array('value' => $user['id']));
    echo $this->Form->textarea('content', array('rows'=> 4,'class' => '', 'placeholder' => 'いまどうしてる？', 'class' => 'form-control', 'onkeyup'=> 'showlength(value)'));
    ?>
    <div class='preview clearfix'>
	<img src="" id="preview" style="display:none;">
	</div>
    
    <div class="file_frame">
		<span class="glyphicon glyphicon-camera"></span>画像を選択
		<?php echo $this->Form->input('photo', array('type' => 'file', 'label' => false, 'class' => '')); ?>
	</div>

	<?php
    echo $this->Form->input('photo_dir', array('type' => 'hidden', 'class' => 'form-control'));

    echo $this->Form->submit('エビート', array('class' => 'form-control btn btn-primary btn-block', 'style' => 'width:150px;'));
	echo '<div id="count"></div>';
    echo $this->Form->end();

?>

	<?php foreach ($Posts as $post): ?>
	<div id="comment_launch_<?php echo $post['Post']['id']; ?>" class="">
		<div class="tweet">
			<div class="tweet_header">
				<div class="tweet_icon_box">
				<?php 
					if($post['User']['profile_img']){
						echo $this->Html->image('/files/user/profile_img/' . $post["User"]["id"] ."/". $post["User"]["profile_img"], array('class' => 'tweet_icon'));
					}else{
						echo $this->Html->image('default_icon.png', array('class' => 'tweet_icon'));
					}
				?>
				</div>
				<span class='tweet_name'>
				<?php 
					if(!$post['User']['username']){
						echo "存在しないユーザー";
					}else{
						echo "<a href='posts/users/page/" . $post['User']['id'] ."'>" . $post['User']['username'] . "</a>"; 
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
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
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
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
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

	<script type="text/javascript">
		$(function(){
		    $(".comment_area").css("display", "none");
		    $("#comment_launch_<?php echo $post['Post']['id']; ?>").click(function(){
		        $("#comment_area_<?php echo $post['Post']['id']; ?>").toggle();
		        $("#comment_area_<?php echo $post['Post']['id']; ?>").css({"margin-bottom":"10px"});
		        $("#comment_area_<?php echo $post['Post']['id']; ?> .comment_area_inner").css({"border-radius":"0  0 10px 10px"});

		    });
		});
	</script>

	<?php endforeach; ?>


<script>
	function showlength(str){
	    document.getElementById("count").innerHTML = str.length + "文字";
	}
</script>

<!-- 写真アップロードサムネイル -->
<script type="text/javascript">
$(function(){
	$('#PostsPhoto').change(
	    function() {
	        if ( !this.files.length ) {
	            return;
	        }
	 
	        var file = $(this).prop('files')[0];
	        var fr = new FileReader();
	        fr.onload = function() {
	            $('#preview').attr('src', fr.result ).css('display','inline');
	        }
	        fr.readAsDataURL(file);
    	})
	});

</script>

</div>