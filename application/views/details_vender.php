<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('inc/header'); ?>

<body class="g-sidenav-show  bg-gray-100">
<div class="row">
        <div class="col-12">
          <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Details</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table   class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Userid</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody >
                    <tr>  
                    <?php  
                    foreach ($h->result() as $row)  
                    {  
                        ?><tr>  
                        <td id="id_<?php echo $row->id;?>"><?php echo $row->id;?></td>  
                        <td id="userid_<?php echo $row->id;?>"><?php echo $row->userid;?></td>  
                        <td id="name_<?php echo $row->id;?>"><?php echo $row->name;?></td>  
                        <td id="address_<?php echo $row->id;?>"><?php echo $row->address;?></td>  
                        <td id="lat_<?php echo $row->id;?>" ><?php echo $row->lat;?></td>  
                        <td id="longg_<?php echo $row->id;?>"><?php echo $row->longg;?></td>  
                        <td id="category_<?php echo $row->id;?>"><?php echo $row->category;?></td>  
                        <td>
                        <img id="product_image_<?php echo $row->id?>" src="<?= base_url('uploads/'.$row->userfile) ?>" height="50px" width="50px" alt="not found">
                        </td>  
                        <td><button class="btn bg-gradient-dark w-50 my-2 mb-1" onclick="myfunctions(<?php echo $row->id; ?>)">Edit</button></td>
                        </tr>  
                    <?php }  
                    ?>  
                </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<div id="dataModal" class="modal fade" id="modalDialogScrollable" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal Dialog Scrollable</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="form" method="post" onsubmit="return myfrom();" enctype="multipart/form-data">
                      <input type="hidden" id="id" name="id" value=""> 
                        <input type="hidden" id="userid" name="userid" value=""> 
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Shopname" id="name" name="name" aria-label="Password" aria-describedby="name-addon" value="">
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Address" id="address" name="address" aria-label="Password" aria-describedby="name-addon" value="">
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Lat" id="lat" name="lat" aria-label="Password" aria-describedby="name-addon" value="">
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Long" id="longg" name="longg" aria-label="Password" aria-describedby="name-addon" value="">
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Category" id="category" name="category" aria-label="Password" aria-describedby="name-addon" value="">
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                        <img id="product_image_<?php echo $row->id?>" src="<?= base_url('uploads/'.$row->userfile) ?>" height="50px" width="50px" alt="not found">
                        <input type="file" class="form-control" placeholder="image" name="product_image" size = "20" id="fileToUpload" aria-label="Password" aria-describedby="name-addon" value="">
                        <?php echo form_error('name'); ?>
                        </div>
                        <div class="text-center">
                        <button type="submit" name="submit" id="submit" value="upload" class="btn bg-gradient-dark w-100 my-4 mb-2">Update</button>
                        </div>
                    </form>  
                    </div>
              </div>
              </div>
</div>
<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/footer_script'); ?>

<script>
  function myfunctions(id)
  {
    $("#id").val($("#id_"+id).html());
    $("#userid").val($("#userid_"+id).html());
    $("#name").val($("#name_"+id).html());
    $("#address").val($("#address_"+id).html());
    $("#lat").val($("#lat_"+id).html());
    $("#longg").val($("#longg_"+id).html());
    $("#category").val($("#category_"+id).html());
    $("#userfile").val($("#product_image_"+id).html());
    $('#dataModal').modal('show');
  }
  function myfrom(){
        $.ajax({
            url:"<?php echo base_url('index.php/User/updated'); ?>",
            type : 'POST',
            dataType : 'json',
            data :$('#form').serialize(),
            success:function(data){
                console.log(data.msg);
                if(data.status == '1')
                {
                    //fetch data without refreshing page;
                    var id = $("#id").val();
                    var fname = $("#name").val();
                    var lname = $("#address").val();
                    var username = $("#lat").val();
                    var salary = $("#longg").val();
                    var address = $("#category").val();
                    var mobile = $("#userfile").val();
                    

                    $('#id_' + id).html(id);
                    $('#name_' + id).html(fname);
                    $('#address_' + id).html(lname);
                    $('#lat_'+ id).html(username);
                    $('#longg_' + id).html(salary);
                    $('#address_' + id).html(address);
                    $('#category_' + id).html(mobile);
                    $('#userfile_' + id).html(Roleid);

                    alert("Your data Updated!");

                }
                else{
                    alert('Please enter valid data!');
                }
            },
            error:function(errorThrown){
                // console.log(errorThrown);
            }
        });
    return false;
  }
</script>
</body>
</html>


