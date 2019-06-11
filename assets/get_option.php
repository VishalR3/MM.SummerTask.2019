<?php 
$conn=mysqli_connect('localhost','root','','news site') or die("failed to connect");
$ques=mysqli_query($conn,"SELECT * FROM poll ORDER BY id DESC LIMIT 1");
$poll=$ques->fetch_assoc();
?>
<div class="text-left">
<ul style="list-style-type:square;font-weight:700;">
<li class="text-danger"><?php echo $poll['poll_1'] ; ?></li>
<li class="text-success"><?php echo $poll['poll_2'] ; ?></li>
<li class="text-primary"><?php echo $poll['poll_3'] ; ?></li>
</ul>
</div>
