<div class="col-sm-10 col-md-10 album">

	<?php foreach ($Photos as $photo) { ?>

		<a class="album_group" href="/files/post/photo/<?php echo $photo['Post']['id'] . "/" . $photo['Post']['photo'] ?>" title="<?php echo $photo['Post']['content']; ?>">
			<img src="/files/post/photo/<?php echo $photo['Post']['id'] . "/" . $photo['Post']['photo'] ?>">
		</a>

	<?php } ?>

</div>

<script>
	$(document).ready(function(){
		$(".album_group").colorbox({rel:'album_group', transition:"none", width:"75%", height:"75%"});
	});
</script>

<script>
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>