<style type="text/css">
  /* Post Jumbotron */
  .post-category{
    font-size: 1rem;
  }
  .post-writer{
    font-size: 1rem;
  }
  .post-date{
    font-size: 1rem;
  }

  /* Post Article */
  .post-content-body p{
    font-size: 1.2rem;
  }

  /* Comment Section */
  .comment-list h3 {
    font-size:1.5rem !important;
  }
  .comment-list p{
    font-size: 1.1rem;
  }
  .label-comment-msg{
    font-size:1.5rem;
  }
  .btn-comment-send button{
    font-size:1.1rem;
  }

  /* Bio Section */
  .bio-body p.mb-4{
    font-size:1rem;
  }
  #modal-bio h5{
    font-size:1.5rem;
    font-weight: bold;
  }
  #modal-bio .modal-body p{
    font-size: 1.1rem;
  }

  @media (max-width: 768px) and (min-width: 361px){
    /* Post Jumbotron */
    a.post-title{
      padding-left: 20px;
      padding-right: 20px;
    }
    .post-category{
      font-size: .8rem;
    }
    .post-writer{
      font-size: 1.2rem;
    }
    .post-date{
      font-size: 1.2rem;
    }

    /* Post Content */
    .post-content-body p{
      font-size: 1.7rem;
    }

    /* Comment Section */
    #comment-section h3{
      font-size: 2rem;
    }
    .comment-body{
      width: 95% !important;
      margin-right: -50px;
    }
    .comment-parent{
      padding: 10px 20px !important;
      padding-bottom: 5px !important;
    }
    .comment-list h3 {
      font-size:1.2rem !important;
    }
    .comment-list p{
      font-size: 1rem;
    }
    .comment-date p{
      font-size: .8rem;
      margin-bottom: 0px !important;
    }
    .btn-reply{
      font-size: 1rem;
      padding: 4px 10px;
    }
    .comment-reply-body{
      width: 100% !important;
    }
    .reply-post-date p{
      font-size: .8rem;
      margin-bottom: 0px !important;
    }
    .reply-author{
      font-size: .9rem;
      padding: 4px 10px;
    }
    .comment-add span{
      font-size: 1.2rem !important;
    }
    .comment-add h3{
      font-size: 1.5rem !important;
    }
    .label-comment-msg{
      font-size:1.2rem;
    }
    .btn-comment-send button{
      width:100%;
      margin-bottom:10px;
    }

    /* Bio Section */
    .bio-body p.mb-4{
      font-size:1.3rem;
    }
    a.btn-modal-bio{
      font-size: 1rem;
    }
    #modal-bio h5{
      font-size:1.5rem;
      font-weight: bold;
    }
    #modal-bio .modal-body p{
      font-size: 1.1rem;
    }

    .popular-posts-title{
      font-size: 2rem !important;
    }
    .categories-title{
      font-size: 2rem !important;
    }

  }

  @media (max-width: 360px){
    /* Post Jumbotron */
    .site-cover{
      height: 400px;
    }
    .post-entry{
      margin-top:-100px;
    }
    .post-entry h1{
      line-height: 100%;
    }
    a.post-title{
      font-size: 1.5rem;
      padding-left: 20px;
      padding-right: 20px;
    }
    .post-category{
      font-size: .5rem;
    }
    .post-writer{
      font-size: .8rem;
    }
    .post-date{
      font-size: .8rem;
    }

    /* Post Content */
    .post-content-body p{
      font-size: 1.1rem;
    }

    /* Comment Section */
    #comment-section h3{
      font-size: 1.5rem;
    }
    .comment-body{
      width: 95% !important;
      margin-right: -50px;
    }
    .comment-parent{
      padding: 10px 10px !important;
      padding-bottom: 5px !important;
    }
    .comment-list h3 {
      font-size:1rem !important;
    }
    .comment-list p{
      font-size: .9rem;
    }
    .comment-date p{
      font-size: .7rem;
      margin-bottom: 0px !important;
    }
    .btn-reply{
      font-size: .8rem;
      padding: 4px 10px;
    }
    .comment-reply-body{
      width: 100% !important;
    }
    .reply-post-date p{
      font-size: .7rem;
      margin-bottom: 0px !important;
    }
    .reply-author{
      font-size: .8rem;
      padding: 4px 10px;
    }
    .comment-add span{
      font-size: 1rem !important;
    }
    .comment-add h3{
      font-size: 1.4rem !important;
    }
    .label-comment-msg{
      font-size:1.2rem;
    }
    .btn-comment-send button{
      width:100%;
      margin-bottom:10px;
    }

    .more-related-post{
      font-size: 1.2rem;
    }

    /* Bio Section */
    .bio-body h2{
      font-size: 1.5rem;
    }
    .bio-body p.mb-4{
      font-size:.9rem;
    }
    a.btn-modal-bio{
      font-size: .8rem;
    }
    #modal-bio h5{
      font-size:1.2rem;
      font-weight: bold;
    }
    #modal-bio .modal-body p{
      font-size: .75rem;
    }

  }

</style>

    <!-- Site Cover  -->
    <?= '<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('.base_url('uploads/'.$blog['image']).')">' ?>
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">

              <!-- category bg color -->
              <?php if(strtoupper($blog['category']) == 'POLITIC') : ?>
                <span class="post-category text-white bg-secondary mb-3"><?= $blog['category'] ?></span>
              <?php endif; ?>
              <?php if(strtoupper($blog['category']) == 'TECH') : ?>
                <span class="post-category text-white bg-danger mb-3"><?= $blog['category'] ?></span>
              <?php endif; ?>
              <?php if(strtoupper($blog['category']) == 'ENTERTAINMENT') : ?>
                <span class="post-category text-white bg-success mb-3"><?= $blog['category'] ?></span>
              <?php endif; ?>
              <?php if(strtoupper($blog['category']) == 'TRAVEL') : ?>
                <span class="post-category text-white bg-primary mb-3"><?= $blog['category'] ?></span>
              <?php endif; ?>
              <?php if(strtoupper($blog['category']) == 'SPORT') : ?>
                <span class="post-category text-white bg-warning mb-3"><?= $blog['category'] ?></span>
              <?php endif; ?>

              <!-- Show post title -->
              <h1 class="mb-4"><a href="#" class="post-title"><?= $blog['title'] ?></a></h1>
              <!-- Show writer image, title, and date written -->
              <div class="post-meta align-items-center text-center">
                <?= '<figure class="author-figure mb-0 mr-3 d-inline-block"><img src="'.base_url().'uploads/admins/'.$writer.'" alt="Image" class="img-fluid"></figure>' ?> 
                <span class="post-writer d-inline-block mt-1">By <?= $blog['writer'] ?></span>
                <span class="post-date">&nbsp;-&nbsp; <?= $blog['date'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF Site Cover  -->      

    <!-- Main Section -->
    <section class="site-section py-lg">
      <div class="container">
        <div class="row blog-entries element-animate" style="margin:0 !important;padding:0 !important;">

          <!-- Article and Comment -->
          <div class="col-md-12 col-lg-8 main-content">
            
            <!-- show article paragraphs -->
            <div class="post-content-body">
              <p><?= nl2br($blog['article']) ?></p>
            </div>

            <!-- show article category -->
            <div class="pt-5">
              <p>Category:  <a href="<?= base_url('category/').strtolower($blog['category']) .'/1' ?>"><?= $blog['category'] ?></a></p>
            </div>

            <!-- Comment List -->
            <div class="pt-5" id="comment-section">
              <!-- show counted all comments -->
              <h3 class=""><?= sizeof($parent_comments + $child_comments); ?> Comments</h3>
              
              <ul class="comment-list">

                <?php foreach($parent_comments as $parent_comment) : ?>

                  <li class="comment" style="margin-left:-80px;">
                    <div class="comment-body">

                      <div class="comment-parent" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px 20px; margin-top:20px;">
                        
                        <!-- if admin -> can delete comment -->
                        <?php if($this->session->userdata('role') == '1') : ?>

                          <!-- if admins contain current parent_comment name -->
                          <?php if(in_array($parent_comment['komen_nama'], $user_role_admin)) : ?>

                            <h3 style="color:#2286c3;display: inline;font-weight: bold;"><?= $parent_comment['komen_nama']; ?></h3><a class="btn-primary" style="color:white; padding:5px 15px;margin-left:20px;">Author</a>
                            <a href="<?= base_url('dashboard/deleteParentComment/'.$parent_comment['komen_id'].'/'.$id) ?>" onclick="return confirm('Are you sure want to delete this comment?')" style="float:right;color:#2286c3;">&#x1F5D1</a>
                            
                          <?php else : ?>

                            <h3 style="display: inline"><?= $parent_comment['komen_nama']; ?></h3>
                            <a href="<?= base_url('dashboard/deleteParentComment/'.$parent_comment['komen_id'].'/'.$id) ?>" onclick="return confirm('Are you sure want to delete this comment?')" style="float:right;color:#777;">&#x1F5D1</a>
                            
                          <?php endif; ?>
                        
                        <!-- if NOT admin -> CAN'T delete comment -->
                        <?php else : ?>
                          <!-- if admins contain current parent_comment name -->
                          <?php if(in_array($parent_comment['komen_nama'], $user_role_admin)) : ?>
                            
                            <h3 style="color:#2286c3;display: inline;font-weight: bold;"><?= $parent_comment['komen_nama']; ?></h3><a class="btn-primary" style="color:white; padding:5px 15px;margin-left:20px;">Author</a>
                            
                          <?php else : ?>

                            <h3 style="display: inline"><?= $parent_comment['komen_nama']; ?></h3>
                            
                          <?php endif; ?>
                        <?php endif; ?>

                        <div class="meta comment-date"><p><?= $parent_comment['komen_waktu']; ?></p></div>
                        <p><?= $parent_comment['komen_isi']; ?></p>
                        <p>
                        <!-- Button trigger reply modal -->
                          <button type="button" onclick="checkCommentId('<?= $parent_comment['komen_id'] ?>')" class="btn-reply btn btn-secondary" data-toggle="modal" data-target="#reply-<?= $parent_comment['komen_id'] ?>">
                            Reply
                          </button>
                        </p>
                      </div>
                      
                      <!-- Enable Reply Form if User has Loged in -->
                      <?php if($this->session->userdata('username')) : ?>
                        <!-- Modal Reply -->
                        <div class="modal modal-reply" id="reply-<?= $parent_comment['komen_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="comment-form-wrap pt-5">
                                  <h3 class="mb-5">Reply comment</h3>
                                  <div class="form">
                                    <input type="hidden" name="komen_id" value="<?= $parent_comment['komen_id']; ?>">
                                    <input type="hidden" name="komen_blog" value="<?= $id; ?>">
                                    <div class="form-group">
                                      <label for="message">Message</label>
                                      <textarea autofocus name="<?= 'reply_isi_'.$parent_comment['komen_id'] ?>" cols="10" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <button onclick="addChildComment()" class="btn btn-primary" style="float:right">Send</button>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>    
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php else : ?>
                        <!-- Modal Cannot Reply must Login first -->
                        <div class="modal modal-reply fade" id="reply-<?= $parent_comment['komen_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="comment-form-wrap pt-5 text-center">
                                  <h3 class="text-danger mb-5">You must Login before placing a reply</h3>
                                  <a href="<?= base_url('auth/login') ?>" class="btn btn-primary text-center">Login</a>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>

                      <!-- Replyed Comments -->
                      <?php foreach ($child_comments as $child) : ?>

                        <?php if($child['komen_status'] == $parent_comment['komen_id']) : ?>
                          <div class="comment-body comment-reply-body" style="margin-left:50px">
                            
                            <div class="comment-child" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px 20px;margin-top:10px;">
                              
                              <!-- if admin -> can delete comment -->
                              <?php if($this->session->userdata('role') == '1') : ?>

                                <!-- if admins contain current parent_comment name -->
                                <?php if(in_array($child['komen_nama'], $user_role_admin)) : ?>

                                  <h3 style="color:#2286c3;display: inline;font-weight: bold;"><?= $child['komen_nama']; ?></h3><a class="reply-author btn-primary" style="color:white; padding:5px 15px;margin-left:20px;">Author</a>
                                  <a href="<?= base_url('dashboard/deleteChildComment/'.$child['komen_id'].'/'.$id) ?>" onclick="return confirm('Are you sure want to delete this comment?')" style="float:right;color:#2286c3;">&#x1F5D1</a>
                                  
                                <?php else : ?>

                                  <h3 style="display: inline"><?= $child['komen_nama']; ?></h3>
                                  <a href="<?= base_url('dashboard/deleteChildComment/'.$child['komen_id'].'/'.$id) ?>" onclick="return confirm('Are you sure want to delete this comment?')" style="float:right;color:#777;">&#x1F5D1</a>
                                  
                                <?php endif; ?>
                              
                              <!-- if NOT admin -> CAN'T delete comment -->
                              <?php else : ?>
                                <!-- if admins contain current parent_comment name -->
                                <?php if(in_array($child['komen_nama'], $user_role_admin)) : ?>
                                  
                                  <h3 style="color:#2286c3;display: inline;font-weight: bold;"><?= $child['komen_nama']; ?></h3><a class="reply-author btn-primary" style="color:white; padding:5px 15px;margin-left:20px;">Author</a>
                                  
                                <?php else : ?>

                                  <h3 style="display: inline"><?= $child['komen_nama']; ?></h3>
                                  
                                <?php endif; ?>
                              <?php endif; ?>
                              
                              <div class="meta reply-post-date"><p><?= $child['komen_waktu']; ?></p></div>
                              <p><?= $child['komen_isi']; ?></p>
                            </div>
                          </div>
                        <?php endif; ?>

                      <?php endforeach; ?>

                    </div>
                  </li>
                <?php endforeach; ?>

              </ul>
              <!-- END comment-list -->

              <!-- Enable Comment Form if User has Loged in -->
              <?php if($this->session->userdata('username') != null) : ?>
                <div class="comment-form-wrap pt-5">
                  <h3 class="mb-5">Leave a comment</h3>
                  <div class="form">
                    <input type="hidden" name="komen_blog" value="<?= $id; ?>">
                    <div class="form-group">
                      <label for="message" class="label-comment-msg">Message</label>
                      <textarea name="komen_isi" id="komen_isi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group btn-comment-send">
                      <button onclick="addParentComment()" class="btn btn-primary">Send</button>
                    </div>
                  </div>
                </div>
              <!-- Disable Comment Form if User HASN'T Loged in yet --> 
              <?php else : ?>
                <div class="comment-form-wrap comment-add pt-5">
                  <h3 class="mb-3">Leave a comment</h3>
                  <form method="" action="">
                    <span style="font-size: 1.2rem;"><a href="<?= base_url('auth/login') ?>" class="text-center">Login</a> First Before Leave a Comment</span>
                    <div class="form-group">
                      <label for="message" class="label-comment-msg">Message</label>
                      <textarea disabled cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group btn-comment-send">
                      <input type="submit" class="btn btn-primary">
                    </div>

                  </form>
                </div>
              <?php endif; ?>

            </div>

          </div>
          <!-- END OF Article and Comment -->

          <!-- Sidebar -->
          <div class="col-md-12 col-lg-4 sidebar">

            <!-- writer bio -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <?= '<img src="'.base_url().'uploads/admins/'.$writer.'" alt="'.base_url().'uploads/admins/'.$writer.'" class="img-fluid mt-4 mb-2">' ?>
                <div class="bio-body">
                  <h2><?= $blog['writer'] ?></h2>
                  <p class="mb-4"><?= $bio_desc ?></p>
                  
                  <!-- button trigger modal bio -->
                  <p>
                    <a href="#" class="btn btn-primary btn-sm rounded px-4 py-2 btn-modal-bio" data-toggle="modal" data-target="#modal-bio">
                      Read my bio
                    </a>
                  </p>

                  <!-- modal Bio-->
                  <div class="modal fade" id="modal-bio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Read My Bio</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <table style="text-align:left">
                            <tr>
                              <td>Name:</td>
                              <td>&nbsp;&nbsp;<?= $bio_name ?></td>
                            </tr>
                            <tr>
                              <td>Age:</td>
                              <td>&nbsp;&nbsp;<?= $bio_age ?></td>
                            </tr>
                            <tr>
                              <td>Address:</td>
                              <td>&nbsp;&nbsp;<?= $bio_address ?></td>
                            </tr>
                            <tr>
                              <td>Hobby:</td>
                              <td>&nbsp;&nbsp;<?= $bio_hobby ?></td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END OF modal Bio-->

                </div>
              </div>
            </div>
            <!-- END OF writer bio -->

            <!-- popular posts -->
            <div class="sidebar-box">
              <h3 class="heading popular-posts-title">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>

                  <!-- Loop popular posts -->
                  <?php foreach ($populars as $popular) : ?>
                    <li>
                      <a href="<?= base_url('blog/article/').$popular->id ?>">
                        <img src="<?= base_url('uploads/').$popular->image ?>" alt="Image placeholder" class="mr-4" style="height:80px;">
                        <div class="text">
                          <h4><?= $popular->title ?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?= $popular->date ?> </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  
                </ul>
              </div>
            </div>
            <!-- END OF popular posts -->

            <!-- categories -->
            <div class="sidebar-box">
              <h3 class="heading categories-title">Categories</h3>
              <ul class="categories">

                <?php 
                  $politic = 0; $tech = 0; $entertainment = 0; $travel = 0; $sport = 0;
                  // counting
                  for($i = 0; $i < sizeof($blogs); $i++){
                    if(strtolower($blogs[$i]['category']) == 'politic'){
                      $politic++;
                    }
                  }
                  for($i = 0; $i < sizeof($blogs); $i++){
                    if(strtolower($blogs[$i]['category']) == 'tech'){
                      $tech++;
                    }
                  }
                  for($i = 0; $i < sizeof($blogs); $i++){
                    if(strtolower($blogs[$i]['category']) == 'entertainment'){
                      $entertainment++;
                    }
                  }
                  for($i = 0; $i < sizeof($blogs); $i++){
                    if(strtolower($blogs[$i]['category']) == 'travel'){
                      $travel++;
                    }
                  }
                  for($i = 0; $i < sizeof($blogs); $i++){
                    if(strtolower($blogs[$i]['category']) == 'sport'){
                      $sport++;
                    }
                  }
                ?>

                <!-- show categories with each of their total posts -->
                <li><a href="<?= base_url('category/politic/1') ?>">Politic <span>(<?= $politic ?>)</span></a></li>
                <li><a href="<?= base_url('category/tech/1') ?>">Tech <span>(<?= $tech ?>)</span></a></li>
                <li><a href="<?= base_url('category/entertainment/1') ?>">Entertainment <span>(<?= $entertainment ?>)</span></a></li>
                <li><a href="<?= base_url('category/travel/1') ?>">Travel <span>(<?= $travel ?>)</span></a></li>
                <li><a href="<?= base_url('category/sport/1') ?>">Sport <span>(<?= $sport ?>)</span></a></li>
              </ul>
            </div>
            <!-- END OF categories -->
          
          </div>
          <!-- END OF Sidebar -->

        </div>
      </div>
    </section>
    <!-- END OF Main Section -->

    <!-- Related Posts -->
    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-3">
          <div class="col-12">
            <h2 class="more-related-post">More Related Posts</h2>
          </div>
        </div>

        <div class="row align-items-stretch retro-layout">
          
          <!-- Related: tech -->
          <div class="col-md-5 order-md-2">
            <a href="<?= base_url('blog/article/').$blog_headers['tech']['id']?>" class="hentry img-1 h-100 gradient" style="background-image: url(
              <?= base_url('uploads/').$blog_headers['tech']['image'] ?>
            )">
              <span class="post-category text-white bg-danger"><?= $blog_headers['tech']['category'] ?></span>
              <div class="text">
                <h2><?= $blog_headers['tech']['title'] ?></h2>
                <span><?= $blog_headers['tech']['date'] ?></span>
              </div>
            </a>
          </div>

          <div class="col-md-7">
            
            <!-- Related: entertainment -->
            <a href="<?= base_url('blog/article/').$blog_headers['entertainment']['id']?>" class="hentry img-2 v-height mb30 gradient" style="background-image: url(<?= base_url('uploads/').$blog_headers['entertainment']['image'] ?>);">
              <span class="post-category text-white bg-success"><?= $blog_headers['entertainment']['category'] ?></span>
              <div class="text text-sm">
                <h2><?= $blog_headers['entertainment']['title'] ?></h2>
                <span><?= $blog_headers['entertainment']['date'] ?></span>
              </div>
            </a>
            
            <div class="two-col d-block d-md-flex">
              
              <!-- Related: travel -->
              <a href="<?= base_url('blog/article/').$blog_headers['travel']['id']?>" class="hentry v-height img-2 gradient" style="background-image: url(<?= base_url('uploads/').$blog_headers['travel']['image'] ?>);">
                <span class="post-category text-white bg-primary"><?= $blog_headers['travel']['category'] ?></span>
                <div class="text text-sm">
                  <h2><?= $blog_headers['travel']['title'] ?></h2>
                  <span><?= $blog_headers['travel']['date'] ?></span>
                </div>
              </a>
              
              <!-- Related: sport -->
              <a href="<?= base_url('blog/article/').$blog_headers['sport']['id']?>" class="hentry v-height img-2 ml-auto gradient" style="background-image: url(<?= base_url('uploads/').$blog_headers['sport']['image'] ?>);">
                <span class="post-category text-white bg-warning"><?= $blog_headers['sport']['category'] ?></span>
                <div class="text text-sm">
                  <h2><?= $blog_headers['sport']['title'] ?></h2>
                  <span><?= $blog_headers['sport']['date'] ?></span>
                </div>
              </a>

            </div>  
            
          </div>

        </div>

      </div>
    </div>
    <!-- END OF Related Posts -->
    
<script type="text/javascript">
  
  // tmp parent comment id
  var komen_id_global = 0;

  // get all comment datas when first time load page
  getDatas();

  // get all comment datas
  function getDatas(){
    $.ajax({
      type: 'POST',
      url: '<?= base_url('blog/getAllComments') ?>',
      dataType: 'json',
      success: function(data){
        // html code
      }
    });
  }

  // get all parent comments
  function getParentComments(){
    $.ajax({
      type: 'POST',
      url: '<?= base_url('blog/getParentComments/'.$id) ?>',
      dataType: 'json',
      success: function(data){
        // reload comment section with new datas
        $('#comment-section').load(' #comment-section');
      }
    });
  }

  // get all child comments
  function getChildComments(){
    $.ajax({
      type: 'POST',
      url: '<?= base_url('blog/getChildComments/'.$id) ?>',
      dataType: 'json',
      success: function(data){
        // reload comment section with new datas
        // close modal-reply
        $('#comment-section').load(' #comment-section');
        $('.modal-reply').modal('hide');
      }
    });
  }

  // add parent comment
  function addParentComment(){
    // get input datas
    let komen_blog  = $('[name="komen_blog"]').val();
    let komen_isi   = $('[name="komen_isi"]').val();

    $.ajax({
      type: 'POST',
      data: {komen_blog:komen_blog,komen_isi:komen_isi},
      url: '<?= base_url('blog/addParentComment') ?>',
      dataType: 'json',
      success: function(data){
        // if success -> get all parent comments and reload comment section
        if(data.msg == ''){
          getParentComments();
        }
        
      }

    });

  }

  // add child comment
  function addChildComment(){
    // get input datas
    let komen_blog  = $('[name="komen_blog"]').val();
    let komen_id    = komen_id_global;
    let reply_isi   = $('[name="reply_isi_'+komen_id_global+'"]').val();

    $.ajax({
      type: 'POST',
      data: {komen_blog: komen_blog, komen_id: komen_id, reply_isi: reply_isi},
      url: '<?= base_url('blog/addChildComment') ?>',
      dataType: 'json',
      success: function(data){
        // if success -> get all child comments and reload comment section
        if(data.msg == ''){
          getChildComments();
        } else {
          console.log(data.msg);
        }
      }

    });

  }

  // get parent comment id when click the reply button, save it for a while
  function checkCommentId(id){
    komen_id_global = id;
  }

</script>