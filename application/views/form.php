<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php $this->load->view('inc/header'); ?>

<body>
    <main id="main" class="main">
      <div class="col-lg-12">

      <div class="card">
        <div class="card-body" style="margin: 0 auto;">
          <h5 class="card-title">General Form Elements</h5>

            <!-- <?php echo validation_errors(); ?> -->
          <!-- General Form Elements -->
          <form id="createForm" method="post">
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="First_Name" name="fname" aria-label="Password" aria-describedby="name-addon" >
            <span id="fname"></span>
            </div>
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="Last_Name" name="lname" aria-label="Password" aria-describedby="name-addon" >
            <span id="lname"></span>
            </div>
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Password" aria-describedby="name-addon" >
            <span id="username"></span>
            </div> 
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email" aria-label="Password" aria-describedby="name-addon" >
            <span id="email"></span>
            </div> 
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="Mobile" name="mobile" aria-label="Password" aria-describedby="name-addon" >
            <span id="mobile"></span>
            </div> 
            <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="name-addon" >
            <span id="password"></span>
            </div> 
            <div class="text-center">
            <button type="submit" name="submit" id="submit" value="upload" class="btn bg-gradient-dark w-100 my-4 mb-2">submit</button>
            </div>
          </form>
          <br>

          <div class="container">
            <table id="example1" class="table table-striped">
            <div class="container mt-4">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>First_name</th>
                      <th>Last_name</th>
                      <th>username</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Password</th>
                  </tr>
              </thead>
              <tbody id="table">
            
              </tbody>
            </table>
        </div>
        </div>
      </div>

      </div>

    </main>
    <?php $this->load->view('inc/footer'); ?>
    <?php $this->load->view('inc/footer_script'); ?>

<script>
  $("#createForm").submit(function(event) {
    event.preventDefault();
    $.ajax
    ({
      url : '<?php echo base_url('index.php/User/form'); ?>',
      data : $('#createForm').serialize(),
      type : "post",
      dataType : 'json',
      success: function(data)
      {
        console.log(data.msg);
        if(data.status == '1')
        {
          $('#createForm')[0].reset();
          $('#example1').DataTable().ajax.reload();
          alert("Data Successfully submitted!");
        } 
        $("#fname").html(data.fname);   
        $("#lname").html(data.lname);  
        $("#username").html(data.username);   
        $("#mobile").html(data.mobile);   
        $("#email").html(data.email);   
        $("#password").html(data.password);  

      },
      error: function(errorThrown)
      {
          console.log(errorThrown);
      }
    });   
  });


  $(document).ready(function(){
			$('#example1').DataTable({
				"ajax" : "<?php echo base_url('index.php/User/fetchdata'); ?>",
				"order": [],
			});
		});

</script>

</body>
</html>











