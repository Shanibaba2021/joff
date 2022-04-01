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
            <p class="text-lead text-white">Welcome to Joffs world And You Can Add Your Offers Here.</p>
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
              <h5>Add Offers</h5>
            </div>
            <?php
            $this->load->library('form_validation');
            ?>
            <div class="card-body">
            <form id="form" role="form text-left" method="post" action="<?php echo base_url('index.php/Login/addoffers'); ?>" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="mb-3">
                  <input type="hidden" class="form-control" placeholder="Userid" name="userid" aria-label="Name" value="<?php echo $this->session->userdata("id"); ?>" aria-describedby="username" >
                  <?php echo form_error('userid'); ?>
                </div>
                <div class="mb-3">
                <input class="form-control" name="product_image" type="file"  size = "20"  id="fileToUpload" >
                <?php echo form_error('product_image'); ?>
                </div>
                <div class="mb-3">
                  <input type="date" class="form-control" placeholder="Startdate" name="startdate" aria-label="Name" aria-describedby="startdate">
                  <?php echo form_error('startdate'); ?>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Duration" name="duration" aria-label="Duration" aria-describedby="Duration" >
                  <?php echo form_error('duration'); ?>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" id="submit" value="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Add Offers</button>
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