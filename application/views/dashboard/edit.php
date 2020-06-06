<div class="container">

	<div class="row justify-content-center mt-4 mb-4">
	
		<div class="col-lg-10 col-md-10">
			
			<form method="post" action="<?= base_url('dashboard/update_blog') ?>" enctype="multipart/form-data">
				
				<!-- input: blog_id (hidden -> used in the controller) -->
				<input type="hidden" value="<?= $blog['id'] ?>" name="id" id="id">
                
                <!-- input: blog_title -->
                <div class="form-group col-lg-6 col-md-6">
					<input type="text" class="form-control form-control-user" placeholder="Title" name="title" id="title" value="<?= $blog['title'] ?>">
					<?= form_error('title','<p class="text-danger">','</p>') ?>
				</div>
				
				<!-- select: blog_category -->
				<div class="form-group col-lg-6 col-md-6">
					<!-- select current category from data -->
					<select id="category" name="category">
						<?php switch($blog['category']) {
							case 'Politic':
								echo '
								<option value="">--Select Category--</option>
								<option value="Politic" selected>Politic</option>
								<option value="Tech">Tech</option>
								<option value="Entertainment">Entertainment</option>
								<option value="Travel">Travel</option>
								<option value="Sport">Sport</option>';
								break;
							
							case 'Tech': 
								echo '
								<option value="">--Select Category--</option>
								<option value="Politic">Politic</option>
								<option value="Tech" selected>Tech</option>
								<option value="Entertainment">Entertainment</option>
								<option value="Travel">Travel</option>
								<option value="Sport">Sport</option>';
								break;
							
							case 'Entertainment': 
								echo '
								<option value="">--Select Category--</option>
								<option value="Politic">Politic</option>
								<option value="Tech">Tech</option>
								<option value="Entertainment" selected>Entertainment</option>
								<option value="Travel">Travel</option>
								<option value="Sport">Sport</option>';
								break;
							
							case 'Travel': 
								echo '
								<option value="">--Select Category--</option>
								<option value="Politic">Politic</option>
								<option value="Tech">Tech</option>
								<option value="Entertainment">Entertainment</option>
								<option value="Travel" selected>Travel</option>
								<option value="Sport">Sport</option>';
								break;
							
							case 'Sport': 
								echo '
								<option value="">--Select Category--</option>
								<option value="Politic">Politic</option>
								<option value="Tech">Tech</option>
								<option value="Entertainment">Entertainment</option>
								<option value="Travel">Travel</option>
								<option value="Sport" selected>Sport</option>';
								break;
							
							default : 
								echo '
								<option value="" selected>--Select Category--</option>
								<option value="Politic">Politic</option>
								<option value="Tech">Tech</option>
								<option value="Entertainment">Entertainment</option>
								<option value="Travel">Travel</option>
								<option value="Sport">Sport</option>';
								break;
							} ?>
					</select>
					<?php if(!$this->session->flashdata('add_blog')==null){echo $this->session->flashdata('add_blog');} ?>
				</div>

				<!-- textarea: blog_article -->
				<div class="form-group col-lg-12 col-md-12">
					<textarea name="article" id="article" placeholder="Write your article here..." id="article" rows="10" style="width:100%"><?= $blog['article'] ?></textarea>
					<?= form_error('article','<p class="text-danger">','</p>') ?>
				</div>

				<!-- file: blog_image -->
				<div class="form-group col-lg-6 col-md-6">
					<input type="file" class="form-control form-control-user" name="image" id="image">
				</div>

				<!-- button: update blog -->
				<button type="submit" class="btn btn-primary btn-user btn-block col-lg-4 col-md-4 ml-3">
					Update Blog
				</button>

			</form>

		</div>

	</div>

</div>