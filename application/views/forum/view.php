<div class="container" id="thread">
    <h3><?php echo $thread['question']; ?></h3><br>
    <small>Posted on: <?php echo $thread['date']; ?></small><br>
    <br>
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
                        <div class="text-left" id="comment" contenteditable="false" style="width:100%;height:100px;border:2px inset black;padding:3px;"><p class="text-muted" id="placeholder">Reply as <a href=""><b><I><?php echo $this->session->userdata('username'); ?></I></b></a></p></div>
                        <button type="button" class="btn btn-success pull-left" id="comment_btn">Reply</button>
                        
                    <?php } ?>
            </div>

            <br>
            <br>
    
    <?php if ($this->session->userdata('role') == 'admin') {?>
    <br>
    <?php echo form_open('/forum/delete/'.$thread['id']); ?>
    <input type="submit" class="btn btn-danger" value="Delete">
    </form>
    <?php } ?>
    <hr>
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
            var thread_id = "<?php echo $thread['id']; ?>" ;
            var user_role= "<?php echo $this->session->userdata('role'); ?>";
            $.post("<?php echo base_url(); ?>/index.php/Forum/comment",
                    {
                        cmt : comment,
                        user : username,
                        thread : thread_id,
                        role : user_role
                    },function(res,stat){
                        $("#comment").text("");
                        $("#new_comment").append("<h5>"+ username +"</h5><div id='show_comment' style='background-color:#eee;padding: 10px;'><p>"+comment+"</p></div>");
                    });
        })
        //comment box ended;
    })
</script>