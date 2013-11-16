
        <footer>
<div class="pre-footer">
<div class="container">
<div class="row">
<div class="span4">
<div class="footer-logo">
<a>Sagip<strong>Pilipinas</strong></a>
</div>
<ul class="footer-address">
<li>
<strong>Address:</strong>
Sta. Mesa Manila<br>
Philippines
</li>
<li>
<strong>Phone:</strong>
(324) 234-2343
</li>
<li>
<strong>Fax:</strong>
(324) 366-5423
</li>
</ul>
</div>
<div class="span4">
<h5 class="footer-header">Recent Members</h5>
<ul class="footer-list">

<?php foreach ($data2 as $row) { ?>
<li>
<img src="<?php echo $row->profilepic; ?>" style="height:40x;width:40px">
<a href="<?php echo '/'.$row->username; ?>"><?php echo $row->username; ?></a>
</li>
</li>	
<?php }?>

<li>
<a>Jeth Love Rosi</a>
</li>
</ul>
</div>
<div class="span4">
<h5 class="footer-header">Photostream</h5>
<ul class="footer-img-list thumbnails">

<?php foreach ($data as $row) { ?>
<li class="span1">
<a class="thumbnail">
<img alt="<?php echo $row->name;  ?>" title="<?php echo $row->name;  ?>"src="<?php echo $row->image; ?>" style="width:75px;height:35px;" />
</a>
</li>
<?php } ?>

</ul>
</div>
</div>
</div>
</div>
<div class="deep-footer">
<div class="container">
<div class="row">
<div class="span6">
<div class="copyright">Copyright © 2013 Deguzman-Rioja. All rights reserved.</div>
</div>
<div class="span6">
<ul class="footer-links">
<li>
<a>Some</a>
</li>
<li>
<a>Footer</a>
</li>
<li>
<a>Policy</a>
</li>
<li>
<a>Terms Of Use</a>
</li>
<li>
<a>Links</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</footer>