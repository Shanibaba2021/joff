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
              <table   class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Roleid</th>
                    <th>Password</th>
                </tr>
                </thead>
                <tbody >
                    <tr>  
                    <?php  
                    foreach ($h->result() as $row)  
                    {  
                        ?><tr>  
                        <td><?php echo $row->id;?></td>  
                        <td><?php echo $row->fname;?></td>  
                        <td><?php echo $row->lname;?></td>  
                        <td><?php echo $row->username;?></td>  
                        <td><?php echo $row->email;?></td>  
                        <td><?php echo $row->address;?></td>  
                        <td><?php echo $row->roleid;?></td>  
                        <td><?php echo $row->password;?></td>  
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


