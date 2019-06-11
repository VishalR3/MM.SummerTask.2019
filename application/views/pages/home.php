<div class="container" id="slider">
            <div class="carousel slide" data-ride="carousel" id="myslide">
                <ol class="carousel-indicators">
                    <li data-target="#myslide" data-slide-to="0" class="active"></li>
                    <li data-target="#myslide" data-slide-to="1"></li>
                    <li data-target="#myslide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php foreach($highlights as $post) : ?>
                    <div class="carousel-item">
                            <img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image'] ;?>" style="object-fit: cover;width:100%;height:300px;">
                            <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $post['slug'] ; ?>" >
                            <div class="carousel-caption">
                                    <h3><?php echo $post['title'] ;?></h3>
                                    <p><?php echo word_limiter($post['body'],18) ; ?></p>
                                    <p style="font-size:10px;"><i class="fa fa-eye"></i> <?php echo $post['views']; ?> <i class="fa fa-comment"></i> <?php echo $post['comments']; ?></p>
                            </div>
                            </a>
                    </div>
                
                    <?php endforeach ; ?>
                </div>
                <a class="carousel-control-prev" href="#myslide" data-slide="prev"><i class="carousel-control-prev-icon"></i></a>
                <a class="carousel-control-next" href="#myslide" data-slide="next"><i class="carousel-control-next-icon"></i></a>
            </div>
        </div>
        <div class="container" id="latest">
                <div class="title">Latest News</div>
                <div class="row">
                <?php foreach($latest as $post) : ?>
                <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image'] ; ?>" style="object-fit: cover; width:inherit;height:300px;;" alt="<?php echo $post['post_image'] ; ?>">
                    <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $post['slug'] ; ?>" >
                    <div class="data" style="color:black;">
                        
                            <h4><?php echo $post['title'] ; ?></h4>
                            <p><?php echo word_limiter($post['body'],18) ; ?></p>
                          </div>
                          </a>
                          <p class="text-muted pull-left" style="font-size:10px;"><i class="fa fa-eye"></i> <?php echo $post['views']; ?> <i class="fa fa-comment"></i> <?php echo $post['comments']; ?></p>
                    </div>
                    <?php endforeach ; ?>
                
                </div>
        </div>
        <div class="container" id="grid">
        <div class="row">
            <div class="col-sm-9" id="Content">
                <div class="title">Editorial</div>
                <div class="row" id="editorial">
                <?php foreach($editorial as $epost) : ?>
                <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $epost['post_image'] ; ?>" style="object-fit: cover; width:inherit;height:300px;;" alt="<?php echo $epost['post_image'] ; ?>">
                    <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $epost['slug'] ; ?>" >
                    <div class="data" style="color:black;">
                        
                            <h4><?php echo $epost['title'] ; ?></h4>
                            <p><?php echo word_limiter($epost['body'],18) ; ?></p>
                          </div>
                          </a>
                          <p class="text-muted pull-left" style="font-size:10px;"><i class="fa fa-eye"></i> <?php echo $epost['views']; ?> <i class="fa fa-comment"></i> <?php echo $epost['comments']; ?></p>
                    </div>
                    <?php endforeach ; ?>

                </div>
                <div class="title">Most Popular</div>
                <div class="row" id="Popular">
                    <?php foreach($featured as $fpost) : ?>
                    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $fpost['post_image'] ; ?>" style="object-fit: cover; width:inherit;height:300px;;" alt="<?php echo $fpost['post_image'] ; ?>">
                    <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $fpost['slug'] ; ?>" >
                    <div class="data" style="color:black;">
                        
                            <h4><?php echo $fpost['title'] ; ?></h4>
                            <p><?php echo word_limiter($fpost['body'],18) ; ?></p>
                          </div>
                          </a>
                          <p class="text-muted pull-left" style="font-size:10px;"><i class="fa fa-eye"></i> <?php echo $fpost['views']; ?> <i class="fa fa-comment"></i> <?php echo $fpost['comments']; ?></p>
                    </div>
                    <?php endforeach ; ?>
                </div>
            </div>
            <div class="col-sm-3" id="info">
            <div class="card-2" id="poll">
                    <h4>Poll</h4>
                    <p><strong><?php echo $poll['poll_ques'] ; ?></strong></p>
                    <div class='poll_form'>
                    <?php echo form_open("users/cast_vote"); ?>
                        <input type="radio" name="vote" value="1"><?php echo $poll['poll_1'] ; ?></br>
                        <input type="radio" name="vote" value="2"><?php echo $poll['poll_2'] ; ?></br>
                        <input type="radio" name="vote" value="3"><?php echo $poll['poll_3'] ; ?></br>
                        <input type="submit" value="Vote" class="btn btn-primary" id="voteb">
                    </form>
                    </div>
                    <div class="poll_result" style="display:none">
                    <p id="data"></p>
                    <button class="btn btn-danger" id="resultbtn">Result</button>
                    <button class="btn btn-danger" id="ansbtn">Answers</button>

                    </div>
                </div>
                <div class="card-2" id="query">
                    <p><strong>Having Trouble Knowing Things?</strong></p>
                    <p>If you have any doubts or queries, you can ask us freely. We will be very happy to answer as many questions as we can?</p>
                    <a href="query.htmL"><button type="button" class="btn btn-primary" style="justify-self: center;">Ask a Question</button></a>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function(){
                $(".carousel-inner").children('div').eq(0).addClass("active");
            })
        </script>
        <script>
    $(document).ready(function(){
        //Voting starts
        //AJAX function for cookies
        $.get("<?php echo base_url();?>index.php/admin/get_cookies",function(resp,stats){
                if(resp!="null"){
                    $(".poll_form").hide();
                    $(".poll_result").show();
                    $("#data").load("<?php echo base_url();?>assets/get_result.php");
                }
        });
        $("#voteb").click(function(event){
            var data=$("input[name='vote']:checked").val();
            $.post("<?php echo base_url();?>assets/get_result.php",{
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