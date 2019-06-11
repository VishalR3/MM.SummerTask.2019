<?php if ($this->session->userdata('role') == 'admin') {?>


<div class="container text-center">
    <h2 class="text-center"><?=$title ; ?></h2>
    <p class="text-center text-muted">(A training ground for testing and creating new features)</p>
    <hr>
    <div class="row">
        <div class="col-sm-3" style="background-color:#eee">
            <h3>Logs</h3>
            <div class="text-left" style="oveerflow:scroll;">
                <dl>
                    <dt>So For now I wanna test AJAX</dt>
                        <dd>AJAX test was successfull</dd>
                    <dt>Now I wanna make it a one time vote only using cookies</dt>
                        <dd>Cookies creation and there use to impose one time voting rule was succesfull</dd>
                    <dt>Trying to add Commenting Featuring</dt>
                        <dd>Comment are now being added.</dd>
                        <dd>Now I need to show the comments at their respected posts.</dd>
                        <dd>That's Done too.</dd>
                </dl>
            </div>
                
        </div>
        <div class="col-sm-9">
            <div class="card-2 col-sm-4" id="poll" style="margin-left:auto;margin-right:auto;">
                    <h4>Poll</h4>
                    <p><strong><?php echo $poll['poll_ques'] ; ?></strong></p>
                    <div class='poll_form text-left'>
                        <?php echo form_open("admin/cast_vote"); ?>
                            <input type="radio" name="vote" value="1"><?php echo $poll['poll_1'] ; ?><br>
                            <input type="radio" name="vote" value="2"><?php echo $poll['poll_2'] ; ?><br>
                            <input type="radio" name="vote" value="3"><?php echo $poll['poll_3'] ; ?><br>
                            <div class="text-center">
                                <input type="submit" value="Vote" class="btn btn-primary" id="voteb">
                            </div>
                        </form>
                    
                    </div>
                    <div class="poll_result" style="display:none;">

                        <p id="data"></p>
                        <button class="btn btn-danger" id="resultbtn">Result</button>
                        <button class="btn btn-danger" id="ansbtn">Answers</button>

                    </div>
            </div>
            <hr>
            <div id="comment_box">
            <?php if (!$this->session->userdata('logged_in')) { ?>
                <p><a href="<?php echo base_url();?>/index.php/register">Login</a> to comment</p>
            <?php }
                    else { ?>
                        <div class="text-left" id="comment" contenteditable="false" style="width:100%;height:100px;border:2px inset black;padding:3px;"><p class="text-muted" id="placeholder">Comment as <a href=""><b><I><?php echo $this->session->userdata('username'); ?></I></b></a></p></div>>
                        <button type="button" class="btn btn-success pull-left" id="comment_btn">Comment</button>
                        
                    <?php } ?>
            </div>
            <p id="test"></p>
        </div>
    </div>

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
            var post_id = "16";
            var user_role= "<?php echo $this->session->userdata('role'); ?>";
            $.post("<?php echo base_url(); ?>/index.php/Posts/comment",
                    {
                        cmt : comment,
                        user : username,
                        post : post_id,
                        role : user_role
                    },function(res,stat){
                        alert("status :"+ stat);
                    });
        })

        

        //AJAX function for cookies
        $.get("<?php echo base_url();?>index.php/admin/get_cookies",function(resp,stats){
                if(resp!="null"){
                    $(".poll_form").hide();
                    $(".poll_result").show();
                    $("#data").load("<?php echo base_url();?>assets/get_result.php");
                }
        });
        //Voting starts
        $("#voteb").click(function(event){
            var data=$("input[name='vote']:checked").val();
            $.post("<?php echo base_url();?>index.php/admin/cast_vote",{
                vote: data
                },function(res,stat){
               if(stat=="success"){
                $(".poll_form").hide();
                $(".poll_result").show();
                $("#data").load("<?php echo base_url();?>assets/get_result.php");
            
               }
               });
               event.preventDefault();
        })
        $("#resultbtn").click(function(){
           $("#data").load("<?php echo base_url();?>assets/get_result.php");
        })
        $("#ansbtn").click(function(){
             $("#data").load("<?php echo base_url();?>assets/get_option.php");
        })
        //Voting Ends
            
    })
</script>




<?php }
  else if(!$this->session->userdata('logged_in') or $this->session->userdata('role') != 'admin'){ ?>
  <div class="container" style="background-color:#eee;padding:10%;">
     <div class="errbox text-center" style="background-color:#bbb;padding:30px;">
     <h1>Sorry! Direct Access is Forbidden</h1>
     <h4>Only Adminstrators can access.</h4>
     </div>
  </div>

  <?php } ?>