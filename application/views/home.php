<style type="text/css">
  
  /* Recent Posts */
  .entry2 img{
      height:250px;
      width:100%;
  }

  /* Newsletter */
  .newsletter-desc{
    font-size: 1rem;
  }
  .subscribe-form{
    display: flex;
  }
  .subscribe-form .form-control{
    font-size: 1rem;
  }
  .subscribe-form .btn{
    width: 20%;
    font-size: .9rem;
  }

  @media (max-width: 768px){
    .site-section{
      width: 90%;
      margin:auto;
    }

    /* Jumbotron Posts */
    .jumbotron-img{
      height: 250px !important;
    }

    /* Recent Posts */
    .entry2 img{
      height:300px;
      width:100%;
    }

    /* Newsletter */
    .subscribe-1 h2{
      font-size: 1.8rem;
    }
    .newsletter-desc{
      font-size: 1.2rem;
    }
    .subscribe-form{
      display: flex;
    }
    .subscribe-form .form-control{
      font-size: 1rem;
    }
    .subscribe-form .btn{
      width: 20%;
      font-size: 1rem;
    }

  }

  @media (max-width: 360px){
    /* Jumbotron Posts */
    .post-category{
      font-size: .5rem;
    }
    .site-section .text h2{
      font-size: 1rem;
    }

    /* Recent Posts */
    .recent-posts{
      font-size: 1.5rem;
      font-weight: 500;
    }
    .entry2 img{
      height:200px;
      width:100%;
    }
    .recent-title{
      line-height: 120%;
    }
    .recent-title a{
      font-size: 1.2rem;
    }
    .recent-article{
      font-size: .9rem;
    }
    .recent-readmore a{
      font-size: .9rem;
    }

    /* Newsletter */
    .newsletter-desc{
      font-size: .9rem;
    }
    .subscribe-form{
      display: inline-block;
    }
    .subscribe-form .form-control{
      font-size: .9rem;
    }
    .subscribe-form .btn{
      width: 100%;
      margin-top: 5px;
      font-size: .9rem;
    }

  }

</style>
    
    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch retro-layout-2">
          <div class="col-md-4">
            <a href="<?= base_url('blog/article/').$blog_headers['politic']['id']?>" class="h-entry jumbotron-img mb-30 v-height gradient" style="background-image: url(
              <?= base_url('uploads/').$blog_headers['politic']['image'] ?>
            )">
              
            <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-secondary"><?= $blog_headers['politic']['category'] ?></span>
                </div>
                <h2><?= $blog_headers['politic']['title'] ?></h2>
                <span class="date"><?= $blog_headers['politic']['date'] ?></span>
              </div>
            </a>

            <a href="<?= base_url('blog/article/').$blog_headers['tech']['id']?>" class="h-entry jumbotron-img mb-30 v-height gradient" style="background-image: url(
              <?= base_url('uploads/').$blog_headers['tech']['image'] ?>
            )">
              
            <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-danger"><?= $blog_headers['tech']['category'] ?></span>
                </div>
                <h2><?= $blog_headers['tech']['title'] ?></h2>
                <span class="date"><?= $blog_headers['tech']['date'] ?></span>
              </div>
            </a>
          </div>

          <div class="col-md-4">
            <a href="<?= base_url('blog/article/').$blog_headers['entertainment']['id']?>" class="h-entry jumbotron-img img-5 h-100 gradient" style="background-image: url(
              <?= base_url('uploads/').$blog_headers['entertainment']['image'] ?>
            )">
              
              <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-success"><?= $blog_headers['entertainment']['category'] ?></span>
                </div>
                <h2><?= $blog_headers['entertainment']['title'] ?></h2>
                <span class="date"><?= $blog_headers['entertainment']['date'] ?></span>
              </div>
            </a>
          </div>

          <div class="col-md-4">
            <a href="<?= base_url('blog/article/').$blog_headers['travel']['id']?>" class="h-entry jumbotron-img mb-30 v-height gradient" style="background-image: url(
              <?= base_url('uploads/').$blog_headers['travel']['image'] ?>
            )">

            <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-primary"><?= $blog_headers['travel']['category'] ?></span>
                </div>
                <h2><?= $blog_headers['travel']['title'] ?></h2>
                <span class="date"><?= $blog_headers['travel']['date'] ?></span>
              </div>
            </a>

            <a href="<?= base_url('blog/article/').$blog_headers['sport']['id']?>" class="h-entry jumbotron-img mb-30 v-height gradient" style="background-image: url(
              <?= base_url('uploads/').$blog_headers['sport']['image'] ?>
            )">
              
            <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-warning"><?= $blog_headers['sport']['category'] ?></span>
                </div>
                <h2><?= $blog_headers['sport']['title'] ?></h2>
                <span class="date"><?= $blog_headers['sport']['date'] ?></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2 class="recent-posts">Recent Posts</h2>
          </div>
        </div>

        <div class="row recent-section">

          <?php foreach($recents as $recent) : ?>
            <div class="col-lg-4 mb-4">
              <div class="entry2">
                <a href="<?= base_url('blog/article/').$recent['id']?>">
                  <img src="<?= base_url('uploads/').$recent['image'] ?>" alt="Image" class="img-fluid rounded">
                </a>
                <div class="excerpt">
                <?php if(strtoupper($recent['category']) == 'POLITIC') : ?>
                  <span class="post-category text-white bg-secondary mb-3"><?= $recent['category'] ?></span>
                <?php endif; ?>
                <?php if(strtoupper($recent['category']) == 'TECH') : ?>
                  <span class="post-category text-white bg-danger mb-3"><?= $recent['category'] ?></span>
                <?php endif; ?>
                <?php if(strtoupper($recent['category']) == 'ENTERTAINMENT') : ?>
                  <span class="post-category text-white bg-success mb-3"><?= $recent['category'] ?></span>
                <?php endif; ?>
                <?php if(strtoupper($recent['category']) == 'TRAVEL') : ?>
                  <span class="post-category text-white bg-primary mb-3"><?= $recent['category'] ?></span>
                <?php endif; ?>
                <?php if(strtoupper($recent['category']) == 'SPORT') : ?>
                  <span class="post-category text-white bg-warning mb-3"><?= $recent['category'] ?></span>
                <?php endif; ?>
                

                <h2 class="recent-title"><a href="<?= base_url('blog/article/').$recent['id']?>"><?= $recent['title'] ?></a></h2>
                <div class="post-meta align-items-center text-left clearfix">
                  <figure class="author-figure mb-0 mr-3 float-left"><?= '<img src="'.base_url().'uploads/admins/'.$recent['image_writer'].'" alt="'.base_url().'uploads/admins/'.$recent['image_writer'].'" class="img-fluid" style="height:100%;">' ?></figure>
                  <span class="d-inline-block mt-1">By <a href="#"><?= $recent['writer'] ?></a></span>
                  <span>&nbsp;-&nbsp; <?= $recent['date'] ?></span>
                </div>
                
                  <p class="recent-article"><?= substr($recent['article'],0,100).'...' ?></p>
                  <p class="recent-readmore"><a href="<?= base_url('blog/article/').$recent['id']?>">Read More</a></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            
            <button href="" id="load-more" class="btn btn-primary" onclick="loadMore()">Load More</button>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row align-items-stretch retro-layout">
          
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
            
            <a href="<?= base_url('blog/article/').$blog_headers['entertainment']['id']?>" class="hentry img-2 v-height mb30 gradient" style="background-image: url(<?= base_url('uploads/').$blog_headers['entertainment']['image'] ?>);">
              <span class="post-category text-white bg-success"><?= $blog_headers['entertainment']['category'] ?></span>
              <div class="text text-sm">
                <h2><?= $blog_headers['entertainment']['title'] ?></h2>
                <span><?= $blog_headers['entertainment']['date'] ?></span>
              </div>
            </a>
            
            <div class="two-col d-block d-md-flex">
              <a href="<?= base_url('blog/article/').$blog_headers['travel']['id']?>" class="hentry v-height img-2 gradient" style="background-image: url(<?= base_url('uploads/').$blog_headers['travel']['image'] ?>);">
                <span class="post-category text-white bg-primary"><?= $blog_headers['travel']['category'] ?></span>
                <div class="text text-sm">
                  <h2><?= $blog_headers['travel']['title'] ?></h2>
                  <span><?= $blog_headers['travel']['date'] ?></span>
                </div>
              </a>
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

<!-- 
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5 newsletter-desc">Ingin mendapatkan notifikasi berita baru Mask News dan tetap up to date? Subscribe sekarang</p>
              <form action="#" class="subscribe-form">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    
<script type="text/javascript">
  // abandoned dulu, masih bingung buat fitur load more nya :(
  // insyaaAllah sudah clear fitur load morenya, Alhamdulillah
  let load_more_index = 1;

  function loadMore(){

    // set #load-more text to loading
    $('#load-more').html('Loading...');

    $.ajax({
      type: 'POST',
      url: '<?= base_url('home/loadMore/') ?>' + load_more_index,
      dataType: 'json',
      success: function(data){
        
        // set #load-more text (from: loading) to "load more"
        $('#load-more').html('Load More');

        let category_color_0;
        let category_color_1;
        let category_color_2;

        // set category badge color
        if(data[0] != null){
          if(data[0].category.toUpperCase() == 'POLITIC'){
            category_color_0 = 'bg-secondary';
          } else if(data[0].category.toUpperCase() == 'TECH'){
            category_color_0 = 'bg-danger';
          } else if(data[0].category.toUpperCase() == 'ENTERTAINMENT'){
            category_color_0 = 'bg-success';
          } else if(data[0].category.toUpperCase() == 'TRAVEL'){
            category_color_0 = 'bg-primary';
          } else if(data[0].category.toUpperCase() == 'SPORT'){
            category_color_0 = 'bg-warning';
          }
        }

        if(data[1] != null) {
          if(data[1].category.toUpperCase() == 'POLITIC'){
            category_color_1 = 'bg-secondary';
          } else if(data[1].category.toUpperCase() == 'TECH'){
            category_color_1 = 'bg-danger';
          } else if(data[1].category.toUpperCase() == 'ENTERTAINMENT'){
            category_color_1 = 'bg-success';
          } else if(data[1].category.toUpperCase() == 'TRAVEL'){
            category_color_1 = 'bg-primary';
          } else if(data[1].category.toUpperCase() == 'SPORT'){
            category_color_1 = 'bg-warning';
          }
        }

        if(data[2] != null){
          if(data[2].category.toUpperCase() == 'POLITIC'){
            category_color_2 = 'bg-secondary';
          } else if(data[2].category.toUpperCase() == 'TECH'){
            category_color_2 = 'bg-danger';
          } else if(data[2].category.toUpperCase() == 'ENTERTAINMENT'){
            category_color_2 = 'bg-success';
          } else if(data[2].category.toUpperCase() == 'TRAVEL'){
            category_color_2 = 'bg-primary';
          } else if(data[2].category.toUpperCase() == 'SPORT'){
            category_color_2 = 'bg-warning';
          }
        }


        if(load_more_index == 1){
          if(data.length == 3){
            $('.recent-section').after(
            '<div class="row recent-section-' + load_more_index + '"><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '"><img src="<?= base_url('uploads/')?>' + data[0].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_0 + ' mb-3">' + data[0].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[0].id + '">' + data[0].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[0].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[0].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[0].date + '</span></div><p class="recent-article">' + data[0].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '">Read More</a></p></div></div></div><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '"><img src="<?= base_url('uploads/')?>' + data[1].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_1 + ' mb-3">' + data[1].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[1].id + '">' + data[1].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[1].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[1].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[1].date + '</span></div><p class="recent-article">' + data[1].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '">Read More</a></p></div></div></div><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[2].id + '"><img src="<?= base_url('uploads/')?>' + data[2].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_2 + ' mb-3">' + data[2].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[2].id + '">' + data[2].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[2].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[2].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[2].date + '</span></div><p class="recent-article">' + data[2].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[2].id + '">Read More</a></p></div></div></div></div>');
          } else if (data.length == 2){
            $('.recent-section').after(
          '<div class="row recent-section-' + load_more_index + '"><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '"><img src="<?= base_url('uploads/')?>' + data[0].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_0 + ' mb-3">' + data[0].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[0].id + '">' + data[0].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[0].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[0].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[0].date + '</span></div><p class="recent-article">' + data[0].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '">Read More</a></p></div></div></div><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '"><img src="<?= base_url('uploads/')?>' + data[1].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_1 + ' mb-3">' + data[1].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[1].id + '">' + data[1].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[1].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[1].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[1].date + '</span></div><p class="recent-article">' + data[1].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '">Read More</a></p></div></div></div></div>');
          } else if (data.length == 1){
            $('.recent-section').after(
            '<div class="row recent-section-' + load_more_index + '"><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '"><img src="<?= base_url('uploads/')?>' + data[0].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_0 + ' mb-3">' + data[0].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[0].id + '">' + data[0].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[0].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[0].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[0].date + '</span></div><p class="recent-article">' + data[0].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '">Read More</a></p></div></div></div></div>');
          }
          
        
        } else {
          if(data.length == 3){
            $('.recent-section-' + (load_more_index-1)).after(
            '<div class="row recent-section-' + load_more_index + '"><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '"><img src="<?= base_url('uploads/')?>' + data[0].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_0 + ' mb-3">' + data[0].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[0].id + '">' + data[0].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[0].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[0].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[0].date + '</span></div><p class="recent-article">' + data[0].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '">Read More</a></p></div></div></div><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '"><img src="<?= base_url('uploads/')?>' + data[1].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_1 + ' mb-3">' + data[1].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[1].id + '">' + data[1].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[1].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[1].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[1].date + '</span></div><p class="recent-article">' + data[1].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '">Read More</a></p></div></div></div><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[2].id + '"><img src="<?= base_url('uploads/')?>' + data[2].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_2 + ' mb-3">' + data[2].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[2].id + '">' + data[2].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[2].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[2].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[2].date + '</span></div><p class="recent-article">' + data[2].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[2].id + '">Read More</a></p></div></div></div></div>');
          } else if (data.length == 2){
            $('.recent-section-' + (load_more_index-1)).after(
          '<div class="row recent-section-' + load_more_index + '"><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '"><img src="<?= base_url('uploads/')?>' + data[0].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_0 + ' mb-3">' + data[0].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[0].id + '">' + data[0].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[0].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[0].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[0].date + '</span></div><p class="recent-article">' + data[0].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '">Read More</a></p></div></div></div><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '"><img src="<?= base_url('uploads/')?>' + data[1].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_1 + ' mb-3">' + data[1].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[1].id + '">' + data[1].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[1].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[1].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[1].date + '</span></div><p class="recent-article">' + data[1].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[1].id + '">Read More</a></p></div></div></div></div>');
          } else if (data.length == 1){
            $('.recent-section-' + (load_more_index-1)).after(
            '<div class="row recent-section-' + load_more_index + '"><div class="col-lg-4 mb-4"><div class="entry2"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '"><img src="<?= base_url('uploads/')?>' + data[0].image + '" alt="Image" class="img-fluid rounded"></a><div class="excerpt"><span class="post-category text-white ' + category_color_0 + ' mb-3">' + data[0].category + '</span><h2 class="recent-title"><a href="<?= base_url('blog/article/')?>' + data[0].id + '">' + data[0].title + '</a></h2><div class="post-meta align-items-center text-left clearfix"><figure class="author-figure mb-0 mr-3 float-left"><img src="uploads/admins/'+ data[0].image_writer +'" alt="Image" class="img-fluid" style="height:100%;"></figure><span class="d-inline-block mt-1">By <a href="#">' + data[0].writer + '</a></span><span>&nbsp;-&nbsp; ' + data[0].date + '</span></div><p class="recent-article">' + data[0].article.substring(0,100) + '...' + '</p><p class="recent-readmore"><a href="<?= base_url('blog/article/') ?>' + data[0].id + '">Read More</a></p></div></div></div></div>');
          }
          
        } 

        load_more_index++;

        }


    });

  }


</script>