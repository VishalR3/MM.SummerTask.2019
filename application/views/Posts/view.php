<div class="container" id="post">
    <br><br><h3><?php echo $post['title'];?></h3>
    <small>Posted on: <?php echo $post['Date']; ?></small><br>
    <br>
    <img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image']; ?>"><br><br>
    <?php echo $post['body']; ?><br> <br>
    <hr>
    <a class="btn btn-default pull-left" href="edit/<?php echo $post['slug']; ?>">Edit Post</a>
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" class="btn btn-danger" value="Delete">
    </form>
    
</div>