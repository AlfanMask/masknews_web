<style>

	/* Left Side */
	a.btn{
		width:250px;
		box-shadow: 0px 2px 10px #aaa;
		margin-top:20px;
		font-weight: 700;
		margin-bottom: 40px;
	}


</style>


<div class="container">
	
	<h2 class="mt-4 text-center">Profile Setting</h2>

	<div class="row justify-content-center">
		
		<!-- <div class="col-lg-4">
			<img class="mt-4" src="<?= base_url('uploads/users/').$user['image'] ?>" style="border-radius:50%;width:250px;display: block;">
			<form>
			  <div class="form-group">
			    
			    <input type="file" class="form-control-file" id="exampleFormControlFile1">
			  </div>
			</form>
			<a href="<?= base_url('profile/changeImage') ?>" class="btn">CHANGE</a>
		</div> -->

		<div class="col-lg-6 mb-4">
			<?= $this->session->flashdata('update_profile') ?>
			<form action="<?= base_url('profile/updateProfile') ?>" method="post">
				<input type="hidden" name="id" value="<?= $user['id'] ?>">
				<input type="hidden" name="role" value="<?= $user['role'] ?>">
				<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $user['username'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com" value="<?= $user['email'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="password_1">Password</label>
			    <input type="text" class="form-control" id="password_1" name="password_1" placeholder="example137george$@" value="<?= $user['password'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="password_2">Repeat Password</label>
			    <input type="text" class="form-control" id="password_2" name="password_2" placeholder="example137george$@" value="<?= $user['password'] ?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Update Profile</button>
			</form>
		</div>

	</div>

</div>