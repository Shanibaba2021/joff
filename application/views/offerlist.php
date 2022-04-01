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
              <h6>Authors table</h6>
            </div>
           
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table   class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Userid</th>
                    <th>Start Date</th>
                    <th>Duration</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody >
                    <tr>  
                    <?php  
                    foreach ($h->result() as $row)  
                    {  
                        ?><tr>  
                        <td><?php echo $row->id;?></td>  
                        <td><?php echo $row->userid;?></td>  
                        <td><?php echo $row->startdate;?></td>  
                        <td><?php echo $row->duration;?></td>  
                        <td>
                        <img src="<?= base_url('uploads/offers/'.$row->userfile) ?>" height="50px" width="50px" alt="not found">
                        </td>  
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
<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/footer_script'); ?>
</body>
</html>


