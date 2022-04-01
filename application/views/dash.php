<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('inc/header'); ?>


<body>

    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" ">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
        </div>

        <section class="section dashboard">
        <div class="row">

        <div class="card-body">
            <h5 class="card-title">Icon Buttons</h5>
            <a href="<?php echo base_url('index.php/User/userlist'); ?>"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>Vendor List</button></a>
            <a href="<?php echo base_url('index.php/User/offerlist'); ?>"<button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>Offers List</button></a>
            <a href="<?php echo base_url('index.php/Login/logout'); ?>"<button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>logout</button></a>
            </div>

        </div>
        </section>

    </main>

    
    <?php $this->load->view('inc/footer'); ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php $this->load->view('inc/footer_script'); ?>

    

</body>

</html>