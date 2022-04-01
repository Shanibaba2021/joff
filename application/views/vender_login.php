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
              <h5>Login with</h5>
            </div>
            <div class="card-body">
            <form id="form" role="form text-left" method="post" action="<?php echo base_url('index.php/Login/check_login'); ?>" name="myForm" onsubmit="return validateForm()">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="username" name="username" aria-label="Name" aria-describedby="username">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" id="submit" value="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button>
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
<script>
  $(document).ready(function(){
    $('#submit').click(function(event){
      event.preventDefault();
      $.ajax({
        url:"<?php echo base_url('index.php/Login/check_login'); ?>",
        type:"POST",
        dataType :'json',
        data:$('form').serialize(),
        success:function(data){
          console.log(data.msg);
          if(data.status == '1'){
            window.location.href = "<?php echo base_url(); ?>index.php/Login/store1";
          }
          else if(data.status == '2')
          {
            window.location.href = "<?php echo base_url(); ?>index.php/Login/store";
          }
          else{
            alert('Please enter Valid Username and Password');
          }
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
      });
    });
  });
</script>
</body>
</html>