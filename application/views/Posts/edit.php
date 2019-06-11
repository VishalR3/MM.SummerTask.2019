<?php if ($this->session->userdata('role') == 'admin') {?>
<div class="container" id="post">
<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea class="form-control" name="body" rows="4" id="editor2"><?php echo $post['body']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name='category_id' class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </div>
    <div class="form-group">
    <label>Change Image</label>
    <input type="file" name="userfile" size="20">
    </div>
    <input type="submit" value="Submit" class="btn btn-primary">
    
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