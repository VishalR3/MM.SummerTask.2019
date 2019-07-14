<!DOCTYPE html>
<html lang="en">
        <head>
                <title><?php if($title){ echo $title ;}else{ echo $post['title'] ;} ?></title>
                <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fa/css/font-awesome.min.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
            <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/script.js"></script>
            <!--CDN Links-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
        </head>
        <body>
        
        <header class="container-fluid">
            <div class="row">
                    <div class="col-sm-10 col-9" id="logo">
                            <h1>NewsTitle</h1>
                        </div>
                        <div class="col-sm-2 col-3">
                        <?php if (!$this->session->userdata('logged_in')) { ?>
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/register"><strong>Register/Login</strong></a>

                            <?php }
                                else {
                                        echo '<p style="text-align: center;"><strong>'.$this->session->userdata('username');
                                        if ($this->session->userdata('role') == 'admin') {
                                            echo " (admin)";
                                        }
                                        echo '</strong></p>'; ?>
                                        <p style="text-align: center;">
                                        <a href=" <?php echo site_url('Users/logout'); ?>" style="text-transform: none;">Logout</a>
                                        </p> 
                                        <?php }
                                        ?>
                            <!--<img src="<?php echo base_url(); ?>assets/img/yellow.png" alt="User" style="width:50px;height:50px;object-fit: cover">-->
                        </div>
            </div> 
        </header>
        <div class="container" id="nav-holder">
                <nav class="navbar navbar-expand-sm">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navb">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navb">
                            <ul class="navbar-nav nav">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>"><strong>Home</strong></a></li>
                                <?php if ($this->session->userdata('role') == 'admin') {?>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/admin"><strong>Panel</strong></a></li>
                                <?php } ?>
                                
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/about"><strong>About</strong></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/posts"><strong>Posts</strong></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/categories"><strong>Categories</strong></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/forum"><strong>Forum</strong></a></li>
                            </ul>
                        </div>
                </nav>
        </div>
        