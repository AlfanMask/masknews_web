<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mask Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">

    <style type="text/css">
    /* Header */
    .logo-mask, .logo-news{
      font-size: 1.2rem;
    }
    .logo-dot{
      font-size: 2rem;
    }

    @media (max-width: 768px){
      /* Header */
      .logo-mask, .logo-news{
        font-size: 1.2rem;
      }
      .logo-dot{
      font-size: 2rem;
      }
    }

    @media (max-width: 360px){
      /* Header */
      .logo-mask, .logo-news{
        font-size: .9rem;
      }
      .logo-dot{
        font-size: 1rem;
      }

    }

</style>

    <script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>  
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="<?= base_url('blog/searchBlog') ?>">
              <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="<?= base_url() ?>" class="text-black h2 mb-0"><b class="logo-mask">Mask</b><span class="logo-news"> Blog</span> <b class="text-primary logo-dot">.</b></a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="<?= base_url('category/politic') ?>">Politic</a></li>
                <li><a href="<?= base_url('category/tech') ?>">Tech</a></li>
                <li><a href="<?= base_url('category/entertainment') ?>">Entertainment</a></li>
                <li><a href="<?= base_url('category/travel') ?>">Travel</a></li>
                <li><a href="<?= base_url('category/sport') ?>">Sport</a></li>
                <li class="d-none d-lg-inline-block"  id="search-button" onclick="clicked()">
                  <a href="#" class="js-search-toggle">
                    <span class="icon-search"></span>
                  </a>
                </li>
                <?php if($this->session->userdata('username') !== null): ?>
                  <?php if($this->session->userdata('role') == 1) : ?>
                    <li><a href="<?= base_url('dashboard/index/1') ?>">Dashboard</a></li>
                  <?php endif; ?>
                  <li><a href="<?= base_url('profile') ?>"><?= $this->session->userdata('username') ?></a></li>
                  <li><a href="<?= base_url('auth/logout') ?>">| Log out</a></li>
                <?php else: ?>
                  <li><a href="<?= base_url('auth/login') ?>">Log in</a></li>
                <?php endif; ?>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>