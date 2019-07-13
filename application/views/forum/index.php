<style>
    .create{
        padding:20px;
        background-color:#cce;

    }
    #forum{
        padding:20px;
    }
</style>
<div class="container">

<div class="create text-center">
<a class="btn btn-primary" href="<?php echo base_url(); ?>/index.php/forum/create">Start a Thread</a>
</div>

<div id="pill">
<button class="btn btn-default" id="lat_btn">Latest</button>
<button class="btn btn-primary" id="pop_btn">Popular</button>
</div>
<div id="forum">
<div id="latest">
<?php foreach($questions as $q): ?>
<div id="questions">
    <a href="<?php echo base_url(); ?>/index.php/forum/<?php echo $q['slug']; ?>" class="text-dark"><h5><?php echo $q['question']; ?></h5> </a>
    <i><small>Created at : <?php echo $q['date']; ?><br>
    <?php echo $q['answers']; ?> replies
    </small></i><br>
   
    
    
    <hr>
</div>
<?php endforeach; ?>
</div>
<div id="popular" style="display:none;">
    <?php foreach($pop_thread as $q): ?>
        <div id="questions">
            <a href="<?php echo base_url(); ?>/index.php/forum/<?php echo $q['slug']; ?>" class="text-dark"><h5><?php echo $q['question']; ?></h5> </a>
            <i><small>Created at : <?php echo $q['date']; ?><br>
            <?php echo $q['answers']; ?> replies
            </small></i><br>
            <hr>
        </div>
    <?php endforeach; ?>
</div>
</div>


</div>
<script>
$(document).ready(function(){
    $("#lat_btn").click(function(){
        $("#popular").hide();
        $("#latest").show();
        $("#lat_btn").addClass("btn-default").removeClass("btn-primary");
        $("#pop_btn").addClass("btn-primary").removeClass("btn-default");
    })
    $("#pop_btn").click(function(){
        $("#popular").show();
        $("#latest").hide();
        $("#pop_btn").addClass("btn-default").removeClass("btn-primary");
        $("#lat_btn").addClass("btn-primary").removeClass("btn-default");
    })
})
</script>