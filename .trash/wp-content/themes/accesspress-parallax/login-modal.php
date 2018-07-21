<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="container-fluid">
					<button type="button" class="close" id="close-modal" data-dismiss="modal">×</button>
					<b><h4>LOGIN</h4></b>
				</div>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Roll:</label>
						<input type="number" class="form-control" id="roll" name="roll" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<input type="hidden" name="login" value="Yes">
					
					<button type="submit" class="btn btn-block">Login</button>
				</form>
				<br>
				<p><a href="<?php echo get_home_url(); ?>/reset-your-password/">Forgot Password</a></p>
			</div>
		</div>
	</div>
</div>

<style>

</style>
