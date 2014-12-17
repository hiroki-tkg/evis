<div class="col-md-10">

<h2 style="margin-bottom: 20px;
font-weight: 700;
font-size: 18px;
text-shadow: 2px 2px 2px rgba(255,255,255,1);">管理者専用ページ</h2>
<p>
恵比寿ハウスに良く来るメンバーであれば、承認ボタンを押して下さい。<br />
もし違う場合は、拒否して下さい。<br />
拒否しても、この管理画面には残るので、後で承認する事も出来るよ
</p>

	<div class="panel panel-warning" style="margin-top:40px;">
		<div class="panel-heading">承認待ちユーザー</div>
		<table class="table">
			<thead>
				<tr>
				<th>番号</th>
				<th>名前</th>
				<th>性別</th>
				<th>Facebook</th>
				<th>登録日</th>
				<th>承認</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				foreach ($Users as $user) { ?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $user['User']['username']; ?></td>
					<td><?php echo $user['User']['gender']; ?></td>
					<td><?php echo $user['User']['facebook_id']; ?></td>
					<td><?php echo $user['User']['created']; ?></td>
					<td><a href="/admins/update?is_valid=1">承認</a>  <a href="/admins/update?is_valid=3">拒否</a></td>
				</tr>
				
				<?php $i = $i+1; } ?>

			</tbody>
		</table>
	</div>
	
	<div class="panel panel-danger" style="margin-top:40px;">
		<div class="panel-heading">拒否したユーザー</div>
		<table class="table">
			<thead>
				<tr>
				<th>番号</th>
				<th>名前</th>
				<th>性別</th>
				<th>Facebook</th>
				<th>登録日</th>
				<th>承認</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				foreach ($Declines as $user) { ?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $user['User']['username']; ?></td>
					<td><?php echo $user['User']['gender']; ?></td>
					<td><?php echo $user['User']['facebook_id']; ?></td>
					<td><?php echo $user['User']['created']; ?></td>
					<td><a href="/admins/update?is_valid=1">承認</a>  <a href="/admins/update?is_valid=4">削除</a></td>
				</tr>
				
				<?php $i = $i+1; } ?>

			</tbody>
		</table>
	</div>


</div>