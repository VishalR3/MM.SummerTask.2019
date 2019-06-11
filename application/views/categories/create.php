<?php if ($this->session->userdata('role') == 'admin') {?>
<div class="container">
<h2><?= $title ;?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
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