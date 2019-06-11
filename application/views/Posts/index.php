<div class="container" id="post">
<?php foreach($posts as $post) : ?>
    <div class="post_info">
    <h3><?php echo $post['title'];?></h3>
    <p><small>Posted on: <?php echo $post['Date']; ?> in </small><I><a href="<?php echo site_url();  ?>/posts/categories/<?php echo $post['name'] ?>"><?php  echo $post['name']; ?></I><a></p>
    </div>
    <div class="row clearfix">
        <div class="col-sm-4" style="float:left;">
            <img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image']; ?>" style="width:100%;">
        </div>
        <div class="col-sm-8" style="float:right;">
    
            <?php echo word_limiter($post['body'], 40); ?><p><a href="<?php echo site_url('/posts/'.$post['slug']) ;?>">Read More</a></p>
            
        </div>
    </div>
    
    

<?php endforeach; ?>
</div>