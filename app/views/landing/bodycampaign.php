<style type="text/css">
	.font{
		font-size: 14px;
	}
</style>

<?php if ($data == null){?>
<div class="span4" style="margin-left:5px;">
No record
</div>
<?php }?>

<?php foreach ($data as $row ) { ?>

<div class="span4" style="margin-left:5px;">
	<div class="white-card recent-post clearfix">
		<h5 class="recent-post-header">
		<?php if(Session::get('username') == $row->username){?>
		 <a data-toggle="modal" class="campaign-report" href="" style=" text-decoration:none; font-weight:lighter;" name="<?php echo $row->id; ?>" data-name="<?php echo $row->name; ?>"><?php echo $row->name; ?></a>
		 <?php }else{ ?>
		 <a style=" text-decoration:none; font-weight:lighter;" name="<?php echo $row->id; ?>" data-name="<?php echo $row->name; ?>"><?php echo $row->name; ?></a>
		 <?php } ?><br>
				<a href="<?php echo '/'.$row->username; ?>" style="font-size:14px; padding:0px; margin-top:-25px;" name="<?php echo $row->usersid; ?>">Created By: <?php echo $row->username;?></a>
<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Report Summary: <?php echo $row->name; ?></h4>
        </div>
        <div class="modal-body">
          
<div style="margin-left:-10px;">

	<div class="span5" >
		<table class="table table-condensed table-bordered table-striped">
    <tr>
    <td>
		<small class='font'><strong>From:</strong> </small>
	</td>
	<td>
    <input class="input-medium datefrom" type="date" />
    </td>
		<td>
			<small class='font'><strong>To:</strong> </small>
		</td>
		<td>
    <input class="input-medium dateto" type="date" />
		</td>
    </tr>
    <tr>
    	<td>
		<small class='font'><strong>Bank Name:</strong> </small>
		</td>
		<td>    
				<select class="bankreport">
				   <?php
				   	if((($row->bankname1 != null) || ($row->bankname2 != null) || ($row->bankname3 != null))) echo "<option data-report='allaccnt'>All</option>";
            if($row->bankname1 != null) echo "<option  data-report='bankname1'> {$row->bankname1} </option>";
            if($row->bankname2 != null) echo "<option data-report='bankname2'> {$row->bankname2} </option>";
            if($row->bankname3 != null) echo "<option data-report='bankname3'> {$row->bankname3} </option>";
            ?></select>
     </td>
     <td>
     	<small class='font'><strong>Account Number:</strong> </small>
     </td>
     	<td class="allaccnt"></td>
       <td class='font accnt1' ><?php echo $row->bankaccount1; ?></td>
       <td class='font accnt2' ><?php echo $row->bankaccount2; ?></td>
       <td class='font accnt3'><?php echo $row->bankaccount3; ?></td>
      </tr>
  </table>
 
     			<button class="btn-block btn btn-primary send-report" style="text-align:center; margin-top:-10px; margin-left:15px;">Send</button>
  
					<input type="hidden" value="<?php echo $row->id; ?>" />
	</div>

	<div class="span5" style="margin-top:5px;">
 
		<table class="table table-bordered  span5" style="margin-left:15px;">
			<!-- <tr class="showshow"><td colspan="4"></td></tr> -->
			<tr class="" style=" text-decoration:none; font-weight:lighter; ">
				<th>
					<small class='font'><strong>Date</strong> </small>
				</th>	
				<th>
					<small class='font'><strong>Contributor</strong> </small>
				</th>
				<th>
					<small class='font'><strong>Bank Name</strong> </small>
				</th>
				<th>
					<small class='font'><strong>Bank Account</strong> </small>
				</th>
				<th>
					<small class='font'><strong>Amount Donated</strong> </small>
				</th>
			</tr>
			<tbody class="show1">
			</tbody>

		</table>

	</div>

</div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

		

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

		<tr><td><small class='font'>Amount: </small></td><td><div class='input-prepend input-append'> <span class='add-on'>P</span><input class='input-small amountdonated'  type='text' style='text-align:right;' placeholder='Amount'/><span class='add-on'>.00</span></div></td></tr>

		<tr><td colspan='2'><button class='btn btn-success btn-block contribute-btn'><i class='icon-money'></i> Contribute</button></td></tr></table></div>

	
	<div class="post-info clearfix">
		<div class="pull-left">
			<span class="post-date"><i class="icon-calendar"></i> <?php echo $row->datecreated;?></span>
			<a href="#" class="post-comments contributors-link" ><i class="icon-group"></i> <?php echo "(".$row->contributors.") Contributors";?></a>
		</div>
		
	</div>
	<img alt="200x100" style="width: 380px; height:200px;" src="<?php echo $row->image; ?>">
	<p class="post-content"><?php echo $row->description; ?></p>
	<div class="modal-footer" style="text-align: left">
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
	  <div class="row-fluid" style="text-align:center;">
	    <div class="span4"><b><?php echo $percent; ?></b><br/><small>FUNDED</small></div>
	    <div class="span4"><b><?php if($row->raised <> null){ echo "P".number_format($row->raised).".00"; }else{ echo "P0.00"; }?></b><br/><small>RAISED</small></div>
	    <div class="span4"><b><?php echo "P".number_format($row->targetamount).".00";?></b><br/><small>TARGET AMOUNT</small></div>

	    
	  </div>
	</div>
	</div>





</div>

<?php } ?>
<input type="hidden" class="campaign-totalpages" value="<?php echo $totalpages; ?>"/>

<script type="text/javascript">
	jQuery(function($){

$('.campaign-report').click(function(){
		/*console.log($(this).next().next().next());
		var campaignid = $(this).attr("name");
		var campaignname = $(this).data("name");
		var usersid = $(this).next().next().attr("name");

		var url = "modal/index/"+campaignid+"/"+usersid;
		alert(url);
		*/$(this).next().next().next().modal('show');
		//$('.show').empty();
		$('.show1').empty();
		$('.append-tr').remove();
});
	
	 $('.bank1').show();
    $('.bank2').hide();
    $('.bank3').hide();

  $('.bankselect').change(function(){
    
    bankname = $(this).find('option:selected').data('name');
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

$('allaccnt').show();
    $('.accnt1').hide();
    $('.accnt2').hide();
    $('.accnt3').hide();

$('.bankreport').change(function(){

  	bankreport = $(this).find('option:selected').data('report');
		console.log($(this).parent().parent().parent().parent());
		allaccnt = $(this).parent().parent().parent().parent().find('.allaccnt');
  	accnt1 = $(this).parent().parent().parent().parent().find('.accnt1');
  	accnt2 = $(this).parent().parent().parent().parent().find('.accnt2');
  	accnt3 = $(this).parent().parent().parent().parent().find('.accnt3');
  	//alert(bankreport);
  	 if(bankreport == "bankname1"){
  	allaccnt.hide();
    accnt1.show();
   	accnt2.hide();
    accnt3.hide();
  }else if (bankreport == "bankname2"){
  	allaccnt.hide();
    accnt1.hide();
    accnt2.show();
     accnt3.hide();
  }else if (bankreport == "bankname3"){
  	allaccnt.hide();
    accnt1.hide();
     accnt2.hide();
     accnt3.show();
  }else{
  	allaccnt.show();
    accnt1.hide();
    accnt2.hide();
     accnt3.hide();
  }
  	
  });

	$('.send-report').click(function(){
		$('.show1').empty();
		$('.append-tr').remove();
		//console.log($(this).prev());
		campaignid = $(this).next().val();
		datefrom = $(this).prev().first().find('.datefrom').val();
		dateto = $(this).prev().first().find('.dateto').val();
		bankchosen = $(this).prev().first().find('option:selected').val();
		//alert(campaignid);

		$.ajax({
			url: "campaign/report",
			type: "GET",
			data: {
					campaignid : $(this).next().val(),
					datefrom   : $(this).prev().first().find('.datefrom').val(),
					dateto     : $(this).prev().first().find('.dateto').val(),
					bankchosen : $(this).prev().first().find('option:selected').val()

			},
			success: function(data){
				//console.log(data);
				//$('.show').empty();

				$('.append-tr').remove();
				
				$(".show1").after(data);
				
				

		/*		var json_obj = jQuery.parseJSON(data);

				var output="<tr>";
				for (var i=0; i<json_obj.length; i++){
					output += "<td>"+json_obj[i].datedonated+"</td>";
				}
				output += "</tr>";

				console.log(output);
				$('.showshow').html(output);
			}*/
		}
	});
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

	$(".contributors-link").on("click",function(e){
			e.preventDefault();
			var content;
			 // alert($(this).parent().parent().prev().find('#campaignid').val());
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