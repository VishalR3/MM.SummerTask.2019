<div class="container" id="post">
<?php foreach($posts as $post) : ?>
    <br><br><h3><?php echo $post['title'];?></h3>
    <small>Posted on: <?php echo $post['Date']; ?></small><br>
    <I><?php  echo $post['name']; ?></I>
    <br>
    <img src="<?php echo base_url(); ?>assets/img/blue.png"><br><br>
    <?php echo word_limiter($post['body'], 15); ?><br> <br>
    <p><a href="<?php echo site_url('/posts/'.$post['slug']) ;?>">Read More</a></p>

<?php endforeach; ?>
</div>