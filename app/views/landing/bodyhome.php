<style type="text/css">
	.carousel-div{
		min-height: 400px;
	}

  .font{
    font-size: 14px;
  }
  .post-content{
    
    height:40px;
    max-width:370px;
    text-overflow: ellipsis;
    overflow:hidden;
  }
  img.gallery{
    padding-top: 10px;
    display:block;
    margin-right: auto;
    margin-left: auto;
  }
</style>


   <!--carousel -->
        <div id="this-carousel-id" class="carousel slide over-something" style="">
        <div class="carousel-inner slider-w">

          <div class="item active carousel-div" >
            <div class="container">
            <h1 class="slider-header">
            Sagip Pilipinas. Be Part of the community.
            </h1>
            <h2 class="slider-sub-header"> Create a Campaign. Donate and be one of the top Contributors. </h2>
            <div class="slider-browsers-w clearfix">

            <div class="slider-browser slider-browser-left hidden-phone" data-position-bottom="-8%" style="bottom: -8%;">
            <h3 style="color:white; font-weight:bold;">Campaigns</h3>
            <img style="width:100%; height:100%;" src="images/gallery/campaignfin.png">
            </div>
            <div class="slider-browser slider-browser-center" data-position-bottom="-9%" style="bottom: -9%;">
            <h3 style="color:white; font-weight:bold;">Donations</h3>
            <img style="width:100%; height:100%;"  src="images/gallery/donafin.png">
            </div>
            <div class="slider-browser slider-browser-right hidden-phone" data-position-bottom="-8%" style="bottom: -8%;">
            <h3 style="color:white; font-weight:bold;">Contributors</h3>
            <img style="width:100%; height:100%;"   src="images/gallery/contrifin.png">
            </div>
            </div>
            </div>
          </div>

          <div class="item carousel-div" >
            <div class="container">
            <h1 class="slider-header">
            Create fund-raising campaigns. Help more Filipinos. 
            </h1>
            <h2 class="slider-sub-header">Create camapaign as easy as 1 2 3 .</h2>
            <div class="row zoomed-browsers-w">
            <div class="span4">
            <div class="zoomed-browser">
            <img alt="Browser-window-1" style="width:400px; height:350px;" src="images/gallery/step1.png">
            </div>
            </div>
            <div class="span4">
            <div class="zoomed-browser hidden-phone">
            <img alt="Browser-window-2" src="images/gallery/step2.png">
            </div>
            </div>
            <div class="span4">
            <div class="zoomed-browser hidden-phone">
            <img alt="Browser-window-3" src="images/gallery/step3.png">
            </div>
            </div>
            </div>
            </div>
          </div>

          <div class="item  carousel-div" >
            <div class="container">
            <h1 class="slider-header">
            Inquire at our 24Hrs Help Desk Chat.
            </h1>
            <h2 class="slider-sub-header">We answer inquiries about disaster and calamities.</h2>
            <div class="slider-browsers-w clearfix">

            
            
            <div  >
            
            <img style="width:60%; height:60%;"  src="images/gallery/chat.png">
            </div>
           
           
            </div>
            </div>
          </div>

          



          

        </div><!-- .carousel-inner -->
        <!--  next and previous controls here
              href values must reference the id for this carousel -->
          <a class="carousel-control left" href="#this-carousel-id" data-slide="prev"><i class="icon-chevron-left"></i></a>
          <a class="carousel-control right" href="#this-carousel-id" data-slide="next"><i class="icon-chevron-right"></i></a>
             </div><!-- .carousel --> 

<div class="sub-slider-features" style="margin-top:-30px;">
<div class="container">
<div class="row">
<div class="span4">
<div class="info-bullet">
<i class="icon-file-text"></i>
<h5>Start a Campaign</h5>
<p>Create your own fund raising campaign. Let the community contribute.</p>
</div>
</div>
<div class="span4">
<div class="info-bullet">
<i class="icon-money"></i>
<h5>Be a Contributor</h5>
<p>Donate for a cause. Search for campaigns and help them raise funds.</p>
</div>
</div>
<div class="span4">
<div class="info-bullet">
<i class="icon-comments"></i>
<h5>Use our Helpdesk</h5>
<p>Inquire on our help desk. We're 24hrs online. We can answer your inquiries.</p>
</div>
</div>
</div>
</div>
</div>




<section class="section-wrapper posts-w">
<div class="container">
<div class="row">
<div class="span12">
<h3 class="section-header">Recent Campaigns</h3>
</div>
</div>
<div class="row">

  <?php foreach ($data2 as $row ) { ?>

  <div class="span4" style="">
    <div class="white-card recent-post clearfix">
      <h5 style="font-weight:lighter;" class="recent-post-header">
      <a style=" text-decoration:none; font-weight:lighter;"><?php echo $row->name; ?></a><br>
      <a href="<?php echo '/'.$row->username; ?>" style="font-size:14px; padding:0px; margin-top:-25px;">Created By: <?php echo $row->username;?></a>
      

      <?php 
    date_default_timezone_set('Asia/Manila');
    $specificdate = strtotime($row->specificdate);
    $datenow = strtotime(date('Y-m-d'));
    $daysleft = (($specificdate - $datenow)/(24*60*60));
    if($logstatus){
    
    if ($row->type == "specific"){
      if($daysleft > 0){


    ?>
    <button class="btn btn-warning pull-right donate-btn" style="margin-top:-30px; "><i class="icon-heart"></i> Donate</button>
    <?php  } }else{ ?>

    <button class="btn btn-warning pull-right donate-btn" style="margin-top:-30px; "><i class="icon-heart"></i> Donate</button>
    <?php }} ?>
    <?php if ($row->specificdate <> "0000-00-00"){
    
    ?><br>
    <small class="pull-right" style="margin-top:-15px;"><?php if ($daysleft > 0){ echo $daysleft." Day/s Left"; }else{ echo "Ended"; } ?></small>
    <?php }?>

      </h5>
      <div style="display:none; " class=""><input type="hidden" id="campaignid" value="<?php echo $row->id; ?>"><table class="table table-condensed table-bordered table-striped"><tr><td ><small class='font'><strong>Location:</strong> </small></td><td class='font'><?php echo $row->location; ?></td></tr><tr><td><small class='font'><strong>Contact:</strong> </small></td><td class='font'><?php echo $row->contact; ?></td></tr>


        <tr><td><small class='font'><strong>Bank Name:</strong> </small></td> <td class='font'>
          <select class="bankselect" name="jeth"> 
           <?php
            if($row->bankname1 != null) echo "<option  data-name='bankname1'> {$row->bankname1} </option>";
            if($row->bankname2 != null) echo "<option data-name='bankname2'> {$row->bankname2} </option>";
            if($row->bankname3 != null) echo "<option data-name='bankname3'> {$row->bankname3} </option>";
            ?></select>
          <tr><td><small class='font'><strong>Bank Account:</strong> </small></td>
            <td class='font bank1'><?php echo $row->bankaccount1; ?></td>
            <td class='font bank2'><?php echo $row->bankaccount2; ?></td>
            <td class='font bank3'><?php echo $row->bankaccount3; ?></td>

        </tr></td></tr>
        <tr><td><small class='font'>Bank Name: </small></td><td><input class='input-medium userbankname'type='text' placeholder='Bank Name'></td></tr>

        <tr><td><small class='font'>Account Number: </small></td><td><input class='input-medium bankaccount'type='text' placeholder='Account Number'></td></tr>

        <tr><td><small class='font'>Amount: </small></td><td><div class='input-prepend input-append'> <span class='add-on'>P</span><input class='input-small amountdonated'  type='text' style='text-align:right;' placeholder='Amount'/><span class='add-on'>.00</span></div></td></tr><tr><td colspan='2'><button class='btn btn-success btn-block contribute-btn'><i class='icon-money'></i> Contribute</button></td></tr></table></div>

    
    <div class="post-info clearfix">
      <div class="pull-left">

        
        <span class="post-date"><i class="icon-calendar"></i> <?php echo $row->datecreated;?></span>
        <a style="cursor:pointer;" class=" post-comments contributors-link"  ><i class="icon-group"></i> <?php echo "(".$row->contributors.") Contributors";?></a>
      </div>
      
    </div>
    <img alt="200x100" style="width: 380px; height:200px;" src="<?php echo $row->image; ?>">
    <p class="post-content"><?php echo $row->description; ?></p>
    <div class="modal-footer" style="text-align: left; font-weight:lighter;">
    <?php 

    
      $percent = round((($row->raised/$row->targetamount)*100));
      $percent = $percent."%";
      if($percent < 26){
        $color = "progress-danger";
        
      }
      elseif($percent<51){
        $color = "progress-warning";
        

      }
      else if($percent< 76){
        $color = "progress-info";
        
      }
      else{
        $color = "progress-success";
        
      }
      

    ?>
      <div class="progress progress-striped <?php echo $color;?> " style="background: #ddd">
        <div class="bar" style="width: <?php echo $percent;?>"></div>
      </div>
      <div class="row-fluid" style="text-align:center; font-weight:lighter;">
        <div class="span4"><b><?php echo $percent; ?></b><br/><small>FUNDED</small></div>
        <div class="span4"><b><?php if($row->raised <> null){ echo "P".number_format($row->raised).".00"; }else{ echo "P0.00"; }?></b><br/><small>RAISED</small></div>
        <div class="span4"><b><?php echo "P".number_format($row->targetamount).".00";?></b><br/><small>TARGET AMOUNT</small></div>

        
      </div>
    </div>
    </div>





  </div>

  <?php } ?>

<!-- <div class="span4">
<div class="white-card recent-post clearfix">
<h5 class="recent-post-header">
<a href="http://soziev.com/theme_venera/single_post">Campaign Title 1</a>
</h5>
<div class="post-info clearfix">
<div class="pull-left">
<span class="post-date">January 15, 2011</span>
<a href="http://soziev.com/theme_venera/single_post" class="post-comments">14 Comments</a>
</div>
<div class="pull-right">
<a href="http://soziev.com/theme_venera/index#" class="post-like"><i class="icon-heart"></i>
250
</a></div>
</div>
<img alt="Photo-card-big-1" class="post-image" src="#">
<p class="post-content separated">Donec vel turpis non erat luctus ultrices vel sed massa. Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Jeth Loves Rosi nibh id Metus adipiscing semper.</p>
<a href="http://soziev.com/theme_venera/single_post" class="btn btn-primary btn-extra pull-right">Read More &gt;</a>
</div>
</div>

<div class="span4">
<div class="white-card recent-post clearfix">
<h5 class="recent-post-header">
<a href="http://soziev.com/theme_venera/single_post">Campaign Title 2</a>
</h5>
<div class="post-info clearfix">
<div class="pull-left">
<span class="post-date">January 15, 2011</span>
<a href="http://soziev.com/theme_venera/single_post" class="post-comments">14 Comments</a>
</div>
<div class="pull-right">
<a href="http://soziev.com/theme_venera/index#" class="post-like"><i class="icon-heart"></i>
250
</a></div>
</div>
<img alt="Photo-card-big-2" class="post-image" src="#">
<p class="post-content separated">Donec vel turpis non erat Jeth Loves Rosi vel sed massa. Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Donec imperdiet nibh id metus adipiscing semper.</p>
<a href="http://soziev.com/theme_venera/single_post" class="btn btn-primary btn-extra pull-right">Read More &gt;</a>
</div>
</div>


<div class="span4">
<div class="white-card recent-post clearfix">
<h5 class="recent-post-header">
<a href="http://soziev.com/theme_venera/single_post">Campaign Title 3</a>
</h5>
<div class="post-info clearfix">
<div class="pull-left">
<span class="post-date">January 15, 2011</span>
<a href="http://soziev.com/theme_venera/single_post" class="post-comments">14 Comments</a>
</div>
<div class="pull-right">
<a href="http://soziev.com/theme_venera/index#" class="post-like"><i class="icon-heart"></i>
250
</a></div>
</div>
<img alt="Photo-card-big-6" class="post-image" src="#">
<p class="post-content separated">Donec vel turpis non erat luctus ultrices vel sed massa. Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Donec imperdiet nibh id metus adipiscing semper.</p>
<a href="http://soziev.com/theme_venera/single_post" class="btn btn-primary btn-extra pull-right post-btn">Read More &gt;</a>
</div>
</div>

 -->

</div>
</div>
</section>



<section class="section-wrapper stripped">
<div class="container">
<div class="row">
<div class="span12">
<h3 class="section-header">Top Contributors</h3>
</div>

<?php foreach ($data3 as $row2) {?>
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




</div>
</div>
</section>


<section class="section-wrapper stripped">
<div class="container">
<div class="row clients-w">
<div class="span12">
<h3 class="section-header">Our Partners</h3>
</div>
<div class="span2" >
<div>
<img alt="Client-1" src="images/partners/americares.png" >
</div>
</div>
<div class="span2">
<div>
<img alt="Client-2" src="images/partners/care.png">
</div>
</div>
<div class="span2">
<div>
<img alt="Client-3" src="images/partners/cdp.png">
</div>
</div>
<div class="span2">
<div>
<img alt="Client-4" src="images/partners/redcross.png">
</div>
</div>
<div class="span2">
<div>
<img alt="Client-5" src="images/partners/clfi.png">
</div>
</div>
<div class="span2">
<div>
<img alt="Client-6" src="images/partners/ndrrmc.png">
</div>
</div>
</div>
</div>
</section>
    <script>
  $(document).ready(function(){
    $('.carousel').carousel({});
    
  });
</script>
<script type="text/javascript">
  jQuery(function($){
  
     $('.bank1').show();
    $('.bank2').hide();
    $('.bank3').hide();

  $('.bankselect').change(function(){
    
    bankreport = $(this).find('option:selected').data('report');
    console.log();
    var bank1 = $(this).parent().parent().next().find('.bank1');
    var bank2 = $(this).parent().parent().next().find('.bank2');
    var bank3 = $(this).parent().parent().next().find('.bank3');
  if(bankname == "bankname1"){
    bank1.show();
    bank2.hide();
    bank3.hide();
  }else if (bankname == "bankname2"){
    bank1.hide();
    bank2.show();
    bank3.hide();
  }else if (bankname == "bankname3"){
    bank1.hide();
    bank2.hide();
    bank3.show();
  }else{
    bank1.hide();
    bank2.hide();
    bank3.hide();
  }
  });

  $(".donate-btn").click(function(){
    $(this).parent().next().toggle('slide');
    $(this).parent().next().find('.contribute-btn').click(function(){
      
      $.ajax({
        url : "save/donate",
        type : "POST",
        data : {
          campaignid : $(this).parent().parent().parent().parent().parent().find('#campaignid').val(),
          amountdonated : $(this).parent().parent().parent().parent().find('.amountdonated').val(),
          bankname: $(this).parent().parent().parent().parent().find('.bankselect').val(),
          bankaccount: $(this).parent().parent().parent().parent().find('.bankaccount').val(),
           userbankname: $(this).parent().parent().parent().parent().find('.userbankname').val()
        },
        success : function(){
           $.pnotify({
            title: 'Success',
            text: 'Successfully Contributed',
            type: 'success',
            delay: 2000
            });
          
          setTimeout(function(){
            window.location.reload()

          },2000);
        }
      });
    });
    
  });


  $(".contributors-link").click(function(e){
     

      var content = "";
       
      $.ajax({
        url : "/campaign/contributors",
        type: "GET",
        async : false,
        data : {
          campaignid : $(this).parent().parent().prev().find('#campaignid').val()
        },
        success : function (data){         
          content = data; 

        }
        
      });
      $(this).popover({html:true, title:"<i class='icon-group'></i> Contributors",content:content});
      
      
      

    });

    
    
  });
</script>