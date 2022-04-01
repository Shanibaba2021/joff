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
                <div class="card-body" style="margin: 0 auto;">
                <a href="<?php echo base_url('index.php/User/details')?>"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>Your Details</button></a>
                <a href="<?php echo base_url('index.php/Login/addoffers'); ?>"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>Add offer</button></a>
                <a href="<?php echo base_url('index.php/User/listoffer'); ?>"<button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>List offer</button></a>
                <a href="<?php echo base_url('index.php/Login/logout_1'); ?>"<button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>logout</button></a>
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