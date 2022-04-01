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
                    <h5>Register with</h5>
                    <!-- </div>
                    <?php  
                    foreach ($data->result() as $row)  
                    {  
                        ?> -->
                    <div class="card-body">
                    <form id="form" role="form text-left" method="post" action="<?php echo base_url().'index.php/User/updated?id='.$row->id;?>" enctype="multipart/form-data">
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Shopname" name="name" aria-label="Password" aria-describedby="name-addon" <?php echo $row->name;?>>
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Address" name="address" aria-label="Password" aria-describedby="name-addon" <?php echo $row->address;?> value="<?php echo set_value("address"); ?>">
                        <?php echo form_error('address'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Lat" name="lat" aria-label="Password" aria-describedby="name-addon" <?php echo $row->lat;?> value="<?php echo set_value("lat"); ?>">
                        <?php echo form_error('lat'); ?>
                        </div> 
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Long" name="longg" aria-label="longg" aria-describedby="longg" <?php echo $row->longg;?> value="<?php echo set_value("longg"); ?>">
                        <?php echo form_error('longg'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Category" name="category" aria-label="category" aria-describedby="category" <?php echo $row->category;?> value="<?php echo set_value("category"); ?>">
                        <?php echo form_error('category'); ?>
                        </div>
                        <div class="mb-3">
                        <input class="form-control" name="product_image" type="file"  size = "20"  id="fileToUpload" <?php echo $row->userfile;?> value="<?php echo set_value("product_image"); ?>">
                        <?php echo form_error('product_image'); ?>
                        </div>
                        <div class="text-center">
                        <button type="submit" name="submit" id="submit" value="upload" class="btn bg-gradient-dark w-100 my-4 mb-2">submit</button>
                        </div>
                    </form>
                    </div>
                    <!-- <?php }  
                    ?>   -->
                </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('inc/footer'); ?>
    <?php $this->load->view('inc/footer_script'); ?>
</body>
</html>