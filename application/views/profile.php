<style>

	/* Left Side */
	.btn-file{
		width:250px;
		box-shadow: 0px 2px 10px #aaa;
		margin-top:20px;
		font-weight: 700;
		margin-bottom: 40px;
		color: #428bca;
	}
	.btn-file:hover{
		background-color: #428bca;
		color: #fff;
	}
	/* hide input type file */
	input[type="file"]{
		display: none;
	}

	@media (max-width: 768px) and (min-width: 361px){
		/* image upload section */
		.img-section{
			text-align: center;
		}
		.img-section img{
			margin:auto;
		}

		.btn-submit{
			width:100%;
		}

  }

  @media (max-width: 360px){
		/* image upload section */
		.img-section{
			text-align: center;
		}
		.img-section img{
			margin:auto;
		}

		.btn-submit{
			width:100%;
		}
  }

</style>


<div class="container">

	<?= $this->session->flashdata('update_profile') ?>

	<!-- If Admin -> More Edit Features -->
	<?php if($this->session->userdata('role') == 1) : ?>

		<div class="row justify-content-center mt-4">
				
			<div class="col-lg-4 img-section">
				<?php if($user['image'] == 'default.png') : ?>
					<img class="mt-4" src="<?= base_url('assets/images/default.png') ?>" style="border-radius:50%;width:250px;display: block;">
				<?php else : ?>
					<img class="mt-4" src="<?= base_url('uploads/admins/').$user['image'] ?>" style="border-radius:50%;width:250px;display: block;">
				<?php endif; ?>
				<label class="btn-file btn">
					<input form="form-profile" type="file" class="form-control form-control-user" name="image" id="image">CHANGE
				</label>
			</div>

			<div class="col-lg-6 mb-4">
			
				<form id="form-profile" action="<?= base_url('profile/updateProfileAdmin') ?>" method="post" enctype="multipart/form-data">
					
					<input type="hidden" name="id" value="<?= $user['id'] ?>">
					<input type="hidden" name="role" value="<?= $user['role'] ?>">
					<h3 class="mt-4" style="font-weight: bold;text-align: center;margin-bottom: -10px;">Your Account</h3>
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

					<h3 class="mt-4" style="font-weight: bold;text-align: center;margin-bottom: -10px;">Your Bio</h3>

					<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" id="name" name="name" placeholder="Write your name here..." value="<?= $user['bio_name'] ?>">
				  </div>
				  <div class="form-group">
						<textarea name="desc" required id="desc" placeholder="Write your description here..." rows="4" style="width:100%"><?= $user['bio_desc'] ?></textarea>
					</div>
				  <div class="form-group">
				    <label for="age">Age</label>
				    <input type="number" class="form-control" id="age" name="age" placeholder="Write your age here..." value="<?= $user['bio_age'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" class="form-control" id="address" name="address" placeholder="Write your address here..." value="<?= $user['bio_address'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="hobby">Hobby</label>
				    <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Write your hobby here..." value="<?= $user['bio_hobby'] ?>">
				  </div>

				  <button type="submit" class="btn btn-primary btn-submit">Update Profile</button>
				
				</form>
			</div>

		</div>

	<!-- if user -->	
	<?php else : ?>

		<div class="row justify-content-center">

			<div class="col-lg-6 mb-4">

				<form id="form-profile" action="<?= base_url('profile/updateProfileUser') ?>" method="post">
					<input type="hidden" name="id" value="<?= $user['id'] ?>">
					<input type="hidden" name="role" value="<?= $user['role'] ?>">
					<h3 class="mt-4" style="font-weight: bold;text-align: center;margin-bottom: -10px;">Your Account</h3>
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
				  <button type="submit" class="btn btn-primary btn-submit">Update Profile</button>
				</form>
				
			</div>

		</div>

	<?php endif; ?>

	

</div>