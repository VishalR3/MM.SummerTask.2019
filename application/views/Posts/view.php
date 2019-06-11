<div class="container" id="post">
    <br><br><h3><?php echo $post['title'];?></h3>
    <small>Posted on: <?php echo $post['Date']; ?></small><br>
    <br>
    <img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image']; ?>" style="width:80%;" class="img-responsive"><br><br>
    <?php echo $post['body']; ?><br>
    <hr>
    <div id="comments">
    <?php foreach($comments as $comment): ?>
        <h5><?php echo $comment['user']; ?></h5>
        <div id="show_comment" style="background-color:#eee;padding: 10px;">
            <p><?php echo $comment['comment']; ?></p>
        </div>

    <?php endforeach; ?>
    <div id="new_comment">
    </div>
    </div>
    <hr>
            <div id="comment_box">
            <?php if (!$this->session->userdata('logged_in')) { ?>
                <p><a href="<?php echo base_url();?>/index.php/register">Login</a> to comment</p>
            <?php }
                    else { ?>
                        <div class="text-left" id="comment" contenteditable="false" style="width:100%;height:100px;border:2px inset black;padding:3px;"><p class="text-muted" id="placeholder">Comment as <a href=""><b><I><?php echo $this->session->userdata('username'); ?></I></b></a></p></div>
                        <button type="button" class="btn btn-success pull-left" id="comment_btn">Comment</button>
                        
                    <?php } ?>
            </div>

            <br>
            <br>
    
    <?php if ($this->session->userdata('role') == 'admin') {?>
        <hr>
    <a class="btn btn-default pull-left" href="edit/<?php echo $post['slug']; ?>">Edit Post</a>
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" class="btn btn-danger" value="Delete">
    </form>
    <?php } ?>
</div>
<script>
    $(document).ready(function(){
        //Comment Box
        $("#comment").click(function(){
            $("#placeholder").html("");
        }).attr("contenteditable","true");

        $("#comment_btn").click(function(){
            var username= "<?php echo $this->session->userdata('username'); ?>"; 
            var comment= $("#comment").text();
            var post_id = "<?php echo $post['id']; ?>" ;
            var user_role= "<?php echo $this->session->userdata('role'); ?>";
            $.post("<?php echo base_url(); ?>/index.php/Posts/comment",
                    {
                        cmt : comment,
                        user : username,
                        post : post_id,
                        role : user_role
                    },function(res,stat){
                        $("#comment").text("");
                        $("#new_comment").append("<h5>"+ username +"</h5><div id='show_comment' style='background-color:#eee;padding: 10px;'><p>"+comment+"</p></div>");
                    });
        })
        //comment box ended;
        //blockquote
        $("blockquote").prepend("<div class='pull-left' style='font-size:50px;border-right:3px solid purple;'><img src='<?php echo base_url();?>/assets/img/quote.png' width='100px'></div>");
    })
</script>