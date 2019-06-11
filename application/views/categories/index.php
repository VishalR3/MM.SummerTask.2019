<div class="container">
<h2><?= $title ; ?></h2>
<ul class="list-group">
	<?php foreach($categories as $category) : ?>
		<li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a></li>
	<?php endforeach ; ?>
</ul>
</div>
<?php if ($this->session->userdata('role') == 'admin') {?>
<div class="container">
<h2>Create categories</h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  <?php } ?>