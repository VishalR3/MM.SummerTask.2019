<?php 
$conn=mysqli_connect('localhost','root','','news site') or die("failed to connect");
$ques=mysqli_query($conn,"SELECT * FROM poll ORDER BY id DESC LIMIT 1");
$poll=$ques->fetch_assoc();
$vote_1=$poll['vote_1'];
$vote_2=$poll['vote_2'];
$vote_3=$poll['vote_3'];
$votes=$poll['votes'];
$vote1=($vote_1*100)/$votes;
$vote2=($vote_2*100)/$votes;
$vote3=($vote_3*100)/$votes;
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['vote']=='1'){
        $vote_1++;
        $votes++;
    $conn->query("UPDATE poll SET vote_1 =".$vote_1." , votes = ".$votes." WHERE id = ".$poll['id']) ;
    }else
    if($_POST['vote']=='2'){
        $vote_2++;
        $votes++;
    $conn->query("UPDATE poll SET vote_2 =".$vote_2." , votes = ".$votes." WHERE id = ".$poll['id']) ;
    }else if($_POST['vote']=='3'){
        $vote_3++;
        $votes++;
    $conn->query("UPDATE poll SET vote_3 =".$vote_3." , votes = ".$votes." WHERE id = ".$poll['id']) ;
    }

}
else{
?>
<div class="container">
<div class="progress" style="font-weight:700;">
<div class="progress-bar bg-danger text-center" ariavalue-min="0" ariavalue-max="100" ariavalue-now="<?php echo $vote1;?>" style="width:<?php echo $vote1;?>%;"><?php echo (int)$vote1;?>%</div>
</div><br>
<div class="progress " style="font-weight:700;">
<div class="progress-bar bg-success text-center" ariavalue-min="0" ariavalue-max="100" ariavalue-now="<?php echo $vote2; ?>" style="width:<?php echo $vote2; ?>%;"><?php echo (int)$vote2; ?>%
</div>
</div><br>
<div class="progress " style="font-weight:700;">
<div class="progress-bar bg-primary text-center" ariavalue-min="0" ariavalue-max="100" ariavalue-now="<?php echo $vote3; ?>" style="width:<?php echo $vote3; ?>%;"><?php echo (int)$vote3; ?>%
</div>
</div><br>
</div>
<?php } ?>
