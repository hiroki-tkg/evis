<?php
	pr($user);
    $my_post = count($my_post);
    $my_photos = count($my_photos);
    $photos = $my_post - $my_photos;
?>

<div class="col-sm-3 col-md-3">
    <div class="thumbnail">
        <?php 
        echo $this->Html->image('test_profile.jpg', array('alt' => '', 'border' => '0'));
        ?>
        <div class="caption">
            <h3>Hiroki Takagi</h3>
            <div><a href="/users/edit">編集</a></div>
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><span class="badge badge-default">
        <?php echo $my_post; ?></span>投稿数</li>
        <li class="list-group-item"><span class="badge badge-primary"><?php echo $photos; ?></span>画像数</li>
        <li class="list-group-item"><span class="badge badge-success"><?php echo count($comment); ?></span>コメント数</li>
    </ul>
    <div class="profile">
    	<?php echo $user['profile']; ?>
    </div>
</div>

<div class="col-sm-6 col-md-6">

	<?php foreach ($posts as $post): ?>
	<div id="comment_launch_<?php echo $post['Post']['id']; ?>" class="">
		<div class="tweet">
			<div class="tweet_header">
			<?php echo $this->Html->image('default_icon.png', array('class' => 'tweet_icon')); ?>

				<?php echo "<span class='tweet_name'><a href='posts/users/page/" . $post['User']['id'] ."'>" . $post['User']['username'] . "</a></span>"; ?>
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
					if($user['id'] == $post['Post']['user_id']){
						echo "<a onclick='return confirm(delete_message);'　href='/evis/posts/delete_post?post_id=" . $post['Post']['id'] . "'><span class='glyphicon glyphicon-trash'></span></a>";
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="comment_area" id="comment_area_<?php echo $post['Post']['id']; ?>">
	<?php for ($i=0; $i < count($post['Comment']); $i++) { ?>
		<div class="comment_list">
		<?php pr($post); ?>
			<?php echo $post['Comment'][$i]['created']; ?>
			<?php echo $post['Comment'][$i]['content']; ?>
		</div>
	<?php }?>


		<div class="comment_area_inner">
			<?php
			    echo $this->Form->create('Comment', array('action' => 'add_post', 'class' => 'clearfix'));
			    echo $this->Form->hidden('user_id', array('value' => $user['id']));
			    echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
			    echo $this->Form->textarea('content', array('rows'=> 3,'class' => 'form-control', 'placeholder' => 'いまどうしてる？'));
			    echo $this->Form->submit('つぶやく', array('class' => 'btn'));
			    echo $this->Form->end();
			?>
		</div>
	</div>

	<script type="text/javascript">
		$(function(){
		    $(".comment_area").css("display", "none");
		    $("#comment_launch_<?php echo $post['Post']['id']; ?>").click(function(){
		        $("#comment_area_<?php echo $post['Post']['id']; ?>").toggle();
		    });
		});
	</script>

	<?php endforeach; ?>


<script>
	function showlength(str){
	    document.getElementById("count").innerHTML = str.length + "文字";
	}
</script>

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
