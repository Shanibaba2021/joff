<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php $this->load->view('inc/header'); ?>

<body>
    <main id="main" class="main">
      <div class="col-lg-12">

      <div class="card">
        <div class="card-body" style="margin: 0 auto;">
          <h5 class="card-title">General Form Elements</h5>
          <!-- General Form Elements -->
        
          <div class="container">
            <table id="example1" class="display table">
              <thead>
                  <tr>
                      <th>S.No</th>
                      <th>First_name</th>
                      <th>Last_name</th>
                      <th>username</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Password</th>
                  </tr>
              </thead>
              <tbody id="table">
              <?php  
                    foreach ($student as $row)  
                    {  
                        ?><tr>  
                        <td id="id_<?php echo $row->id;?>"><?php echo $row->id;?></td>  
                        <td id="fname_<?php echo $row->id;?>"><?php echo $row->fname;?></td> 
                        <td id="lname_<?php echo $row->id;?>"><?php echo $row->lname;?></td> 
                        <td id="username_<?php echo $row->id;?>"><?php echo $row->username;?></td>  
                        <td id="email<?php echo $row->id;?>"><?php echo $row->email;?></td> 
                        <td id="mobile_<?php echo $row->id;?>"><?php echo $row->mobile;?></td>  
                        <td id="password_<?php echo $row->id;?>"><?php echo $row->password;?></td> 
                        <!-- <td><button onclick="myfunctions(<?php echo $row->id; ?>)">Edit</button></td>
                        <td><button onclick="myfuction(<?php echo $row->id; ?>)">Delete</button></td> 
                        <td><button onclick="myfact(<?php echo $row->id; ?>)">View</button></td>  -->
                        </tr>  
                    <?php }  
                    ?> 
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
	$.ajax({
		url: "<?php echo base_url("index.php/User/viewajax");?>",
		type: "POST",
        dataType : 'json',
		success: function(data){
			//alert(data);
			// $('#table').html(data);
        var result = data.data ;
        // var html = ""; 
        result.forEach(element => {
            html +='<tr>';  
            html +='<td id="id">'+element.id+'</td>';  
            html +='<td id="fname">'+element.fname+'</td>'; 
            html +='<td id="lname">'+element.lname+'</td>'; 
            html +='<td id="username">'+element.username+'</td>';  
            html +='<td id="email">'+element.email+'</td>'; 
            html +='<td id="mobile">'+element.mobile+'</td>';  
            html +='<td id="password">'+element.password+'</td>'; 
            html +='</tr>';
      });
      $("#table").html(""); //for clearing previous data
      $("#table").html(html);
		}
	});
</script>
</body>
</html>













