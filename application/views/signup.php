<div class="container">

  <div class="row justify-content-center">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 col-md-10 col-sm-10">
      <div class="card-body p-0">
        
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="p-5">
              
              <!-- Welcome Title -->
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              
              <!-- shows message, if any -->
              <?= $this->session->flashdata('register') ?>
              
              <form class="user" method="post" action="<?= base_url('auth/register') ?>">
                <!-- input: username -->
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Username" name="username" id="username">
                    <?= form_error('username','<p class="text-danger">','</p>') ?>
                </div>
                
                <!-- input: email -->
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" placeholder="Email Address" name="email" id="email">
                  <?= form_error('email','<p class="text-danger">','</p>') ?>
                </div>
                
                <div class="form-group row">
                  <!-- input: password_1 -->
                  <div class="form-group col-sm-12 col-md-6">
                    <input type="password" class="form-control form-control-user" placeholder="Password" name="password_1" id="password_1">
                    <?= form_error('password_1','<p class="text-danger">','</p>') ?>
                  </div>
                  <!-- input: password_2 -->
                  <div class="col-sm-12 col-md-6">
                    <input type="password" class="form-control form-control-user" placeholder="Repeat Password" name="password_2" id="password_2">
                    <?= form_error('password_2','<p class="text-danger">','</p>') ?>
                  </div>
                </div>
                
                <!-- button: register -->
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>

              </form>

              <hr>
              
              <!-- link to login -->
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/login') ?>">Already have an account? Login!</a>
              </div>

            </div>
          </div>
        </div>
        <!-- END OF Nested Row within Card Body -->

      </div>
    </div>

    </div>

  </div>