<?php if ($this->session->userdata('role') == 'admin') {?>
<div class="container">
<div class="Users">
<h4>Users</h4>
<div class="holder">
    <table class="table-bordered table-striped table-responsive">
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php foreach($users as $user) : ?>
        <tr>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td><a class="btn btn-primary" href="<?php echo base_url(); ?>/index.php/admin/make_admin/<?php echo $user['username']; ?>">Make Admin</td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
<div class="Users">
<h4>Admins</h4>
<div class="holder">
    <table class="table-bordered table-striped table-responsive">
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php foreach($admins as $user) : ?>
        <tr>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td><a class="btn btn-primary" href="<?php echo base_url(); ?>/index.php/admin/remove_admin/<?php echo $user['username']; ?>">Remove Admin</td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
</div>



</div>


<?php }
  else if(!$this->session->userdata('logged_in') or $this->session->userdata('role') != 'admin'){ ?>
  <div class="container" style="background-color:#eee;padding:10%;">
     <div class="errbox text-center" style="background-color:#bbb;padding:30px;">
     <h1>Sorry! Direct Access is Forbidden</h1>
     <h4>Only Adminstrators can access.</h4>
     </div>
  </div>

  <?php } ?>