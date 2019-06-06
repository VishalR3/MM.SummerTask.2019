<div class="container" id="post">
<?php foreach($posts as $post) : ?>
    <div class="post_info">
    <br><br><h3><?php echo $post['title'];?></h3>
    <small>Posted on: <?php echo $post['Date']; ?> in </small><I><?php  echo $post['name']; ?></I>

    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image']; ?>" style="width:100%;object-fit:cover;height:300px;">
        </div>
        <div class="col-sm-8">
    
            <?php echo word_limiter($post['body'], 40); ?><p><a href="<?php echo site_url('/posts/'.$post['slug']) ;?>">Read More</a></p>
            
        </div>
    

<?php endforeach; ?>
</div>