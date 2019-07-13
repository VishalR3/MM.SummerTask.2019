<?php if ($this->session->userdata('role') == 'admin') {?>
<div class="container">
<div class="row">
<div class="col-sm-3" id="adminbar">
    <div id="admin-menu">
<h3>Admin Panel</h3>
<ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/posts/create">Create Posts</a></li>
    <li class="nav-item"><a class="nav-link" href="#posts">Edit/Delete Posts</a></li>
    <li class="nav-item"><a class="nav-link" href="#featured">Featured Posts</a></li>
    <li class="nav-item"><a class="nav-link" href="#highlights">Carousel/Highlight Posts</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Comment Approval</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/register">Add Subscribers</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/admins">Add Admin</a></li>
    <li class="nav-item"><a class="nav-link" href="#ques">Answer Q&A</a></li>
    <li class="nav-item"><a class="nav-link" href="#Poll_bar">Add Poll Question</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/beta">Beta Ground <i class="fa fa-star text-danger"></i></a></li>
</ul>
</div>
</div>
<div class="col-sm-9">
    <div id="posts">
    <h4>Posts</h4>
    <div class="holder">
    <?php foreach($posts as $post) : ?>
    <div class="container post">
    <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $post['slug'] ; ?>" >
    <div class="data" style="color:black;">
                        
    <h5><?php echo $post['title'] ; ?></h5>
    <p><?php echo word_limiter($post['body'],18) ; ?></p>
    </div>
    <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>index.php/posts/edit/<?php echo $post['slug']; ?>">Edit Post</a>
    <a class="btn btn-warning pull-left" href="<?php echo base_url(); ?>index.php/admin/make_high/<?php echo $post['slug']; ?>">Make Highlight</a>
    <a class="btn btn-warning pull-left" href="<?php echo base_url(); ?>index.php/admin/make_featured/<?php echo $post['slug']; ?>">Make Featured</a>
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" class="btn btn-danger" value="Delete">
    </form>

    </a>
    </div>
    <?php endforeach ; ?>
    
    </div>
    </div>

    <div id="featured" >
    <h4>Featured Posts </h4>
    <div class="row">
    
    <?php foreach($featured as $fpost) : ?>
    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $fpost['post_image'] ; ?>" style="object-fit: cover; width:inherit;height:250px;;" alt="<?php echo $fpost['post_image'] ; ?>">
    <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $fpost['slug'] ; ?>" >
    <div class="data" style="color:black;">
                        
    <h5><?php echo $fpost['title'] ; ?></h5>
    <p><?php echo word_limiter($fpost['body'],18) ; ?></p>
    </div>
    </a>
    <a class="btn btn-danger admindel" href="<?php echo base_url(); ?>index.php/admin/delete_featured/<?php echo $post['id']; ?>">Delete Featured</a>
    </div>
    <?php endforeach ; ?>
    </div>
    </div>
    <div id="highlights">
    <h4>Highlighted Posts </h4>
    <div class="row">
    
    <?php foreach($highlights as $post) : ?>
    <div class="col-sm-4 news"><img src="<?php echo base_url(); ?>assets/img/posts/<?php echo $post['post_image'] ; ?>" style="object-fit: cover; width:inherit;height:250px;;" alt="<?php echo $post['post_image'] ; ?>">
    <a class="news-link" href="<?php echo base_url(); ?>index.php/posts/<?php echo $post['slug'] ; ?>" >
    <div class="data" style="color:black;">
                        
    <h5><?php echo $post['title'] ; ?></h5>
    <p><?php echo word_limiter($post['body'],18) ; ?></p>
    </div>
    </a>
    <a class="btn btn-danger admindel" href="<?php echo base_url(); ?>index.php/admin/delete_high/<?php echo $post['id']; ?>">Delete Highlight</a>
    </div>
    <?php endforeach ; ?>
    </div>


    </div>
    <div id="Poll_bar">
    <h4>Poll </h4>
    <div class="container">
    <?php echo form_open('admin/poll_create'); ?>
    <div class="form-group">
        <label><strong>Question:</strong></label>
        <input type='text' name='poll_ques' class="form-control">
    </div>
    <div class="form-group">
        <label>Option1:</label>
        <input type='text' name='poll_1' class="form-control">
    </div>
    <div class="form-group">
        <label>Option2:</label>
        <input type='text' name='poll_2' class="form-control">
    </div>
    <div class="form-group">
        <label>Option3:</label>
        <input type='text' name='poll_3' class="form-control">
    </div>
    <button type="submit" class="btn btn-warning">Post Poll</button>


    </form>
    </div>


    </div>
    <div id="ques">
    <h4>Answer Questions</h4>
    <div class="holder">
    <?php foreach($questions as $question) : ?>
    <div class="container post">
    <div class="data" style="color:black;">
    <h6><?php echo $question['question'] ; ?></h6>
    <small><i><p class="text-muted stat">Unanswered</p></i></small>
    </div>
    <form class="ans_form" method="post" action="<?php echo base_url(); ?>/index.php/admin/answer">
    <input type="text" name="answer" placeholder="Answer">
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="slug" value="<?php echo $question['slug'] ; ?>" hidden>
    <button class="btn btn-primary ans_btn" type="submit">Answer</button>
    </form>

    </div>
    <?php endforeach ; ?>
    
    </div>
    </div>


</div> 


</div>

</div>
<script>
$(document).ready(function(){
    $("h4").css({
        "backgroundColor":"#dbb",
        "cursor":"pointer",
        "padding":"10px",
        "margin-top" :"10px"
    })
    $("h4").click(function(){
        $(this).next().slideToggle();
    })
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