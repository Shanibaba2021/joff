<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('inc/header'); ?>

<body class="g-sidenav-show  bg-gray-100">
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url(<?php echo base_url('assets/img/curved-images/curved14.jpg'); ?>">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Welcome to Joffs world.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>sign_up</h5>
            </div>
            <?php
              $this->load->library('form_validation');
            ?>
            <div class="card-body">
            <form id="form" role="form text-left" method="post" action="<?php echo base_url('index.php/Login/vender_sign'); ?>" onsubmit="return validateForm()">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="First_name" name="fname" aria-label="Name" aria-describedby="username" value="<?php echo set_value("fname"); ?>">
                  <?php echo form_error('fname'); ?>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Last_name" name="lname" aria-label="Name" aria-describedby="username" value="<?php echo set_value("lname"); ?>">
                  <?php echo form_error('lname'); ?>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="username" name="username" aria-label="Name" aria-describedby="username" value="<?php echo set_value("username"); ?>">
                  <?php echo form_error('username'); ?>
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Name" aria-describedby="username" value="<?php echo set_value("email"); ?>">
                  <?php echo form_error('email'); ?>
                </div>
                <div class="mb-3">
                  <input type="address" class="form-control" placeholder="address" name="address" aria-label="Name" aria-describedby="username" value="<?php echo set_value("address"); ?>">
                  <?php echo form_error('address'); ?>
                </div>
                <div class="mb-3">
                <select class="form-select" id="roleid" name="roleid" aria-label="Default select example" > 
                    <option value="" >select value</option>
                      <?php foreach ($student as $ss) { ?>
                      <option value="<?php  echo $ss['role']; ?>" ><?php echo $ss['role'];?></option>
                      <?php  } ?>
                    </select>
                    <?php echo form_error('roleid'); ?>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon" value="<?php echo set_value("password"); ?>">
                  <?php echo form_error('password'); ?>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" id="submit" value="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">sign_up</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/footer_script'); ?>
</body>
</html>