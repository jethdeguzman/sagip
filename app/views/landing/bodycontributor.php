
<?php foreach ($data as $row2) {?>
<div class="span3">
<div class="white-card" style="text-align:center;">
<div style="margin-bottom:10px;">
<img class="img-circle" style="width:180px; height:180px;"  src="<?php echo $row2->profilepic; ?>">
</div>
<a href="/<?php echo $row2->username; ?>"><h3><?php echo $row2->username;?></h3></a>
<h5><strong style="margin-top:-50px;"><?php echo "P".number_format($row2->totaldonated).".00";?></strong></h5>
<p style="width:250px; height:40px;  text-overflow:hidden;"><?php echo $row2->age.", ".$row2->work.", ".$row2->address.", ".$row2->website?></p>
</div>
</div>
<?php } ?>

<input type="hidden" class="contributor-totalpages" value="<?php echo $totalpages; ?>"/>


