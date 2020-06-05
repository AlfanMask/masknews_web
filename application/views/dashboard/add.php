<div class="container">

	<div class="row justify-content-center mt-4 mb-4">
	
		<div class="col-lg-10 col-md-10">
			<form method="post" action="<?= base_url('dashboard/add_blog') ?>" enctype="multipart/form-data">
				<div class="form-group col-lg-6 col-md-6">
					<input type="text" required class="form-control form-control-user" placeholder="Title" name="title" id="title" value="<?php if(!$this->session->flashdata('title_blog') == null) {echo $this->session->flashdata('title_blog');} ?>">
					<?= form_error('title','<p class="text-danger">','</p>') ?>
				</div>
				<div class="form-group col-lg-6 col-md-6">
					<select id="category" required name="category">
						<option value="">--Select Category--</option>
						<option value="Politic">Politic</option>
						<option value="Tech">Tech</option>
						<option value="Entertainment">Entertainment</option>
						<option value="Travel">Travel</option>
						<option value="Sport">Sport</option>
					</select>
					<?php if(!$this->session->flashdata('add_blog')==null){echo $this->session->flashdata('add_blog');} ?>
				</div>
				<div class="form-group col-lg-12 col-md-12">
					<textarea name="article" required id="article" placeholder="Write your article here..." rows="10" style="width:100%"><?php if(!$this->session->flashdata('article_blog') == null) {echo $this->session->flashdata('article_blog');}?></textarea>
					<?= form_error('article','<p class="text-danger">','</p>') ?>
				</div>
				<div class="form-group col-lg-6 col-md-6">
					<input type="file" required class="form-control form-control-user" name="image" id="image">
				</div>
				<?php if(!$this->session->flashdata('add_blog')==null){echo $this->session->flashdata('add_blog');} ?>
				<button type="submit" class="btn btn-primary btn-user btn-block col-lg-4 col-md-4 ml-3">
					Add Blog
				</button>
			</form>
		</div>

	</div>

</div>