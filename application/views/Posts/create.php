<?php if ($this->session->userdata('role') == 'admin') {?>

<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
	  <label>Category</label>
	  <select name="category_id" class="form-control">
		  <?php foreach($categories as $category): ?>
		  	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
    <label>Upload Image :</label>
    <br>
	  <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php }
  else if(!$this->session->userdata('logged_in') or $this->session->userdata('role') != 'admin'){ ?>
  <div class="container" style="background-color:#eee;padding:10%;">
     <div class="errbox text-center" style="background-color:#bbb;padding:30px;">
     <h1>Sorry! Direct Access is Forbidden</h1>
     <h4>Only Adminstrators can access.</h4>
     </div>
  </div>

  <?php } ?>
     