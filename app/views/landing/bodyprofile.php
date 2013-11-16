<style>
	.post-content{
		
		height:40px;
		max-width:370px;
		text-overflow: ellipsis;
		overflow:hidden;
	}
</style>
<?php ?>
<section id="profile-body" class="section-wrapper posts-w">
	<div class="container">
		<div class="row">
			
			<div class="span8" style="background:transparent;">
				<div class="tabbable" > <!-- Only required for left/right tabs -->
				  <ul class="nav nav-tabs">
				    <li class="active"><a href="#tab1" data-toggle="tab" class="campaigns-created-tab"><i class="icon-edit icon-large" style="vertical-align:bottom;"> </i><strong>Campaigns </strong>Created</a></li>
				    <li><a href="#tab2" data-toggle="tab" class="campaigns-funded-tab"><i class="icon-gift icon-large" style="vertical-align:bottom;"> </i><strong>Campaigns</strong> Funded</a></li>
				     <?php if($logstatus):?>
				     <li><a href="#tab3" class="start-new-campaign-tab" data-toggle="tab"><i class="icon-file-text icon-large" style="vertical-align:bottom;"> </i> Start a New <strong>Campaign</strong></a></li>
				 <?php endif; ?>
				  </ul>
				  <div class="tab-content" style="padding-right:0px;">
				    <div class="tab-pane active" id="tab1" >
				    		<div>
				    			<div class="row">
				    				<div class="span8" style="margin-left:-5px;">
				    				<span class="sortby-type-span" style="margin-left:30px; font-size:22px;"><i class="icon-sort"></i> Sort by: <strong>Most Recent</strong></span>
				    				<div class=""style="float:right;" >
				    				  <button class="created-most-recent-btn btn" style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Most Recent'"><i class="icon-time"></i> </button>
				    				  <button style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Soon to End'" class="btn created-soon-to-end-btn"><i class="icon-calendar"></i> </button>
				    				  <button style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Most Popular'" class="btn created-most-popular-btn"><i class="icon-star"></i></button>
				    				  <input style="width:140px;" class="search-campaign-input" placeholder="Campaign Name"  data-provide="typeahead"  data-items="4" type="text">
				    				  <button class="btn created-search-byname-btn" type="button" style="margin-top:-10px;"><i class="icon-search" ></i> Search</button>
				    				</div>
				    				</div>
				    			</div>
				    		</div>
				      		<div class="row tab1-content" style="padding-left:15px; padding-right:0px;">

				      		</div>
				      		<div id="paginator-campaign-created-recent" style="">
				      		</div>
				      		<div id="paginator-campaign-created-soontoend" >
				      		</div>
				      		<div id="paginator-campaign-created-byname" >
				      		</div>
				      		<div id="paginator-campaign-created-popular" >
				      		</div>
				      		
				      		
				    
			      				
				    </div>
				    <div class="tab-pane" id="tab2">
				    	<div>
				    		<div class="row">
				    			<div class="span8" style="margin-left:-5px;">
				    			<span class="funded-sortby-type-span" style="margin-left:30px; font-size:22px;"><i class="icon-sort"></i> Sort by: <strong>Most Recent</strong></span>
				    			<div class=""style="float:right;" >
				    			  
				    			  <button class="funded-most-recent-btn btn" style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Most Recent'"><i class="icon-time"></i> </button>
				    			  <button style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Most Funded'" class="btn funded-most-funded-btn"><i class="icon-money"></i></button>
				    			  <input style="width:140px;" class="fund-search-campaign-input" placeholder="Campaign Name"  data-provide="typeahead"  data-items="4" type="text">
				    			  <button class="btn funded-search-byname-btn" type="button" style="margin-top:-10px;"><i class="icon-search" ></i> Search</button>
				    			</div>
				    			</div>
				    		</div>
				    	</div>
				      	<div class="row tab2-content" style="padding-left:15px; padding-right:0px;">

				      	</div>
			      		<div id="paginator-campaign-funded-recent">
			      		</div>
			      		<div id="paginator-campaign-funded-funded">
			      		</div>
			      		<div id="paginator-campaign-funded-byname">
			      		</div>
				    </div>
				    <div class="tab-pane" id="tab3" style="background-color:gray;">
				    	<form id="createcampaignform" method="post" enctype="multipart/form-data" action='/save/campaign'>
				    	<div class="accordion span7" id="accordion2">
				    	  <div class="accordion-group">
				    	    <div class="accordion-heading">
				    	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				    	        Step 1: <strong>Choose Type of Campaign</strong> <i class="icon-chevron-sign-down pull-right"></i>
				    	      </a>
				    	    </div>
				    	    <div id="collapseOne" class="accordion-body collapse in">
				    	      <div class="accordion-inner">
				    	      	<h5>The campaign ends in receiving pledges when</h5>

				    	        <label class="radio">the campaign reaches it's target amount.
				    	         <input type="radio" name="type" value="ongoing" checked />
				    	         
				    	        </label>
				    	        
				    	        <label class="radio">the campaign reaches a specific date. 
				    	        <input   type="radio" name="type" value="specific"/>
				    	        </label>				    	      
				    	          <input class="input-medium specificdate" name="specificdate" type="date" value="" readonly /><br>
				    	          <i>Target amount to be raised</i><br>
				    	          <div class="input-prepend input-append">
				    	          
				    	            <span class="add-on">P</span>
				    	             <input class="input-small targetamount" name="targetamount"  type="text" style="text-align:right;" placeholder="Target Amount"/>
				    	            <span class="add-on">.00</span>
				    	          </div>
				    	        
				    	       
				    	      </div>
				    	    </div>
				    	  </div>
				    	  <div class="accordion-group">
				    	    <div class="accordion-heading">
				    	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
				    	       Step 2: <strong>Campaign Details</strong> <i class="icon-chevron-sign-down pull-right"></i>
				    	      </a>
				    	    </div>
				    	    <div id="collapseTwo" class="accordion-body collapse">
				    	      <div class="accordion-inner">
				    	      <h5>Basic Campaign Information</h5>
				    	      	<table>
				    	      		<tr>
				    	      			<td>Name</td>
				    	      			<td><input name="name" maxlength="29" type="text" placeholder="Name"/></td>
				    	      		</tr>
				    	         	<tr>
				    	         		<td>Description</td>
				    	         		<td><textarea name = "description" placeholder="Description"></textarea></td>
				    	         	</tr>
				    	         	<tr>
				    	         		<td>Image</td>
				    	         		<td><div class="fileupload fileupload-new" data-provides="fileupload">
				    	         
				    	          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/images/noimage.gif" /></div>
				    	          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
				    	          <div>
				    	            <span class="btn-file" style=""><a class="btn btn-small fileupload-new">Select</a><a style="margin-top:-6px;" class="btn btn-small fileupload-exists">Change</a><input type="file" name="campaignpic" id="campaignpic" /></span>
				    	            
				    	            <a href="" style="cursor:ponter;" class="btn btn-danger btn-small fileupload-exists" data-dismiss="fileupload">Remove</a>
				    	            
				    	          </div>
				    	         
				    	        </div></td>
				    	         	</tr>
				    	        </table>
				    	        
				    	      </div>

				    	    </div>
				    	  </div>
				    	  <div class="accordion-group">
				    	    <div class="accordion-heading">
				    	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
				    	       Step 3: <strong>Donation Details</strong> <i class="icon-chevron-sign-down pull-right"></i>
				    	      </a>
				    	    </div>
				    	    <div id="collapseThree" class="accordion-body collapse">
				    	      <div class="accordion-inner">
				    	        <h5>How can the community help and donate</h5>
				    	        <table>
				    	        	<tr>
				    	        		<td>Location</td>
				    	        		<td><input type="text" name="location" placeholder="Location"></td>
				    	        	</tr>
				    	        	<tr>
				    	        		<td>Contact</td>
				    	        		<td><input type="text" name="contact" placeholder="Contact"></td>
				    	        	</tr>
				    	        	
				    	        		<tr>
				    	        		<td>1. Bank Name</td>
				    	        		<td><input type="text" name="bankname1" placeholder="Bank Name"></td>
				    	        	</tr>
				    	        	<tr>
				    	        		<td>Bank Account</td>
				    	        		<td><input type="text" name="bankaccount1" placeholder="Bank Account"></td>
				    	        	</tr>
				    	        	<tr>
				    	        		<td>2. Bank Name</td>
				    	        		<td><input type="text" name="bankname2" placeholder="Bank Name"></td>
				    	        	</tr>
				    	        	<tr>
				    	        		<td>Bank Account</td>
				    	        		<td><input type="text" name="bankaccount2" placeholder="Bank Account"></td>
				    	        	</tr>
				    	        	<tr>
				    	        		<td>3. Bank Name</td>
				    	        		<td><input type="text" name="bankname3" placeholder="Bank Name"></td>
				    	        	</tr>
				    	        	<tr>
				    	        		<td>Bank Account</td>
				    	        		<td><input type="text" name="bankaccount3" placeholder="Bank Account"></td>
				    	        	</tr>


				    	        </table>
				    	        <a class="btn btn-success create-campaign-btn" style="cursor:pointer;" >Create Campaign</a>
				    	      </div>
				    	    </div>
				    	  </div>
				    	</div>
				    	</form>
				    </div>
				  </div>
				</div>
				
			</div>
			
			<div class="span4" style="">
				<div class="blog-side-bar">
					<div class="widget-tp">
						<h3>
							<i class="icon-user"></i>
							Profile Info
						</h3>
						<div class="row-fluid">
							<div class="span5" style="">
								<img class="profilepic" src="<?php echo $profilepic; ?>" style="width:145px;height:145px;"><br>
								
							</div>
							<div class="span7" style=" ">
							<small style="font-size:24px; display:block;" class="username-small"><strong><?php echo $username; ?></strong></small>
							<small style="font-size:20px; display:block;"><?php echo $firstname." ".$lastname; ?></small>
							<small style="display:block;"><?php echo $age; ?></small>
							<small style="display:block;"><?php echo $address; ?></small>
							<small style="display:block;"><?php echo $work; ?></small>
							<small style="display:block;"><?php echo $website; ?></small>
							<small style="display:block;"><?php echo $contact;  ?></small>
							<?php if($logstatus):?>
								<a class="editprofile-btn" href="" style="cursor:pointer;">Edit Profile Info</a> | <a class="editpicture-btn" style="cursor:pointer;">Upload Profile Picture</a>
							<?php endif; ?>  
							</div>
						</div>
						<div class="row editprofile-div" style="margin-top:10px; display:none;">
							<div class="span4">
								<form class="updateprofile-form">
								<table>
									<tr>
										<td>Firstname</td>
										<td><input class="input-large" type="text" name="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" /></td>
									</tr>
									<tr>
										<td>Lastname</td>
										<td><input type="text" name="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" /></td>
									</tr>
									<tr>
										<td>Age</td>
										<td><input class="input-mini" name="age" type="text" placeholder="Age" value="<?php echo $age; ?>" /></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><input class="" name="address" type="text" placeholder="Address" value="<?php echo $address; ?>" /></td>
									</tr>
									<tr>
										<td>Work</td>
										<td><input type="text" name="work" placeholder="Work or Affiliation" value="<?php echo $work; ?>"/></td>
									</tr>
									<tr>
										<td>Website</td>
										<td><input type="text" name="website" placeholder="Website or Email" value="<?php echo $website; ?>"/></td>
									</tr>
									<tr>
										<td>Contact</td>
										<td><input type="text" name="contact" placeholder="Contact" value="<?php echo $contact;?>"/></td>
									</tr>

									<tr>
										<td colspan="2"><a class="profile-submit-btn span3 btn btn-success btn-small" >Update Profile</a></td>
									</tr>
								
								</table>
								</form>
								
							</div>
						</div>
						<div class="row editpicture-div" style="margin-top:10px; display:none;">
							<div class="span4 fileupload fileupload-new" data-provides="fileupload">
							  <form id="imageform" method="post" enctype="multipart/form-data" action='/save/profilepic'>
							  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/images/noimage.gif" /></div>
							  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
							  <div>
							    <span class="btn-file" style=""><a class="btn btn-small fileupload-new">Select</a><a style="margin-top:-6px;" class="btn btn-small fileupload-exists">Change</a><input type="file" name="photoimg" id="photoimg" /></span>
							    
							    <a href="" style="cursor:ponter;" class="btn btn-danger btn-small fileupload-exists" data-dismiss="fileupload">Remove</a>
							   <a  href="" style="cursor:ponter; margin-top:7px;" class="btn btn-success btn-small uploadpicture-btn" >Upload</a>
							  </div>

							  </form>
							</div>
						</div>
					</div>
				
				 <?php if($logstatus){ ?>
				 <div class="blog-recent-tweets widget-tp">
					<h3>
						<i class="icon-comments-alt"></i>
						Help Desk Chat
					</h3>
					<div class="chat-wrapper" style="height:300px; border:1px solid transparent; overflow-y:scroll;">
					<ul class="chat-ul">
						
						<!-- <li>
							<a href="">about 7 hours ago</a>
							Aliquam vehicula tristique turpis dignissim accumsan
							<a href="">soziev.com</a>
						</li>
						<li>
							<a href="">about 7 hours ago</a>
							Aliquam vehicula tristique turpis dignissim accumsan
							<a href="">soziev.com</a>
						</li>
						<li>
							<a href="">about 7 hours ago</a>
							Aliquam vehicula tristique turpis dignissim accumsan
							<a href="">soziev.com</a>
						</li> -->
					</ul>
					</div>
					<textarea class="span4 chat-textarea" placeholder="Type here..." style="margin-top:5px;"></textarea><a class="btn btn-inverse btn-small pull-right chat-send-btn">Send</a>
				</div>
				<?php } ?>

		<?php
				if($recent){


				?>
				<div class="blog-categories widget-tp">
				 	<h3>
				 		<i class="icon-list"></i>
				 		Recent Activities
				 	</h3>
				 	<ul>
				 		<?php foreach ($recent as $row) { 
				 			$date = date('M j', strtotime($row->date));
				 		?>
				 		<li>
				 			<a href=""><?php echo $date.' '.$row->name; ?></a>
				 		</li>
						<?php } ?>
				 	</ul>
				 </div>
				
				<?php } ?>
				
				
				 
				
			</div>

			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$(document).ready(function(){
		


		var totalPages;
		var username = $(".username-small").text();

		

		$.ajax({
			url : "/campaign/sort/created/recent/"+username,
			async : false,
			success : function(data){
				$(".tab1-content").html(data);
				totalPages = $(".tab1-content").find(".campaign-totalpages").val();
				//alert(totalPages);
				if(totalPages == 0){
					$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
				}
			// $('.paginator-campaign-created').bootstrapPaginator({currentPage : 1, totalPages: totalPages});
			}
		
		});
		
		if (totalPages > 1){

		var options = {
		            currentPage: 1,
		            totalPages: totalPages,
		            onPageClicked: function(e,originalEvent,type,page){
		                            $.ajax({
		                            	url : "/campaign/sort/created/recent/"+username+"?page="+page,
		                            	async : false,
		                            	success : function(data){
		                            		$(".tab1-content").html(data);
		                            		totalPages = $(".tab1-content").find(".campaign-totalpages").val();
		                            		//alert(page);
		                            		
		                            	}
		                            });
		                        }
		        }
		$('#paginator-campaign-created-recent').bootstrapPaginator(options);
		}
		
		$(".campaigns-created-tab").stop(true,true).click(function(){
			$('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Most Recent</strong>');
			$('#paginator-campaign-created-recent').show();
			$('#paginator-campaign-created-soontoend').hide();
			$('#paginator-campaign-created-byname').hide();
			$('#paginator-campaign-created-popular').hide();
			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/created/recent/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab1-content").html(data);
					totalPages = $(".tab1-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
					}
		                            		

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/created/recent/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab1-content").html(data);
			                   		totalPages = $(".tab1-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-created-recent').bootstrapPaginator(options);
			}
		});


		
		$(".campaigns-funded-tab").stop(true,true).click(function(){
			$("#paginator-campaign-funded-recent").show();
			$("#paginator-campaign-funded-byname").hide();
			$("#paginator-campaign-funded-funded").hide();
			
			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/funded/recent/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab2-content").html(data);
					totalPages = $(".tab2-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab2-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
					}

				}
			});
		
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/funded/recent/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab2-content").html(data);
			                   		totalPages = $(".tab2-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-funded-recent').bootstrapPaginator(options);
			}
		});
	

		
		var datasource= [];
		var datasource2= [];
		$.ajax({
			url : "/campaign/title/created/"+username,
			type : "GET",
			dataType : "json",
			async : false,
			success : function(data){
				
				//console.log(data[0].name);
				 $.each(data, function(index, data1){
				 	datasource.push(data[index].name);
				 });
			}  
		});
		$.ajax({
			url : "/campaign/title/funded/"+username,
			type : "GET",
			dataType : "json",
			async : false,
			success : function(data){
				
				//console.log(data[0].name);
				 $.each(data, function(index, data1){
				 	datasource2.push(data[index].name);
				 });
			}  
		});
		// console.log(datasource2);

		$(".search-campaign-input").typeahead({source:datasource});
		$(".fund-search-campaign-input").typeahead({source:datasource2});



		$(".created-most-recent-btn").click(function(){
			$('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Most Recent</strong>');
			$('#paginator-campaign-created-recent').show();
			$('#paginator-campaign-created-soontoend').hide();
			$('#paginator-campaign-created-byname').hide();
			$('#paginator-campaign-created-popular').hide();

			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/created/recent/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab1-content").html(data);
					totalPages = $(".tab1-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
					}
			                           		

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/created/recent/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab1-content").html(data);
			                   		totalPages = $(".tab1-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-created-recent').bootstrapPaginator(options);
			}
		});

		$(".created-soon-to-end-btn").click(function(){
			$('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Soon to End</strong>');
			$('#paginator-campaign-created-byname').hide();
			$('#paginator-campaign-created-recent').hide();
			$('#paginator-campaign-created-soontoend').show();
			$('#paginator-campaign-created-byname').hide();

			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/created/soontoend/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab1-content").html(data);
					totalPages = $(".tab1-content").find(".campaign-totalpages").val();
					
					
					
					
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
					}
			                		

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/created/soontoend/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab1-content").html(data);
			                   		totalPages = $(".tab1-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   		
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-created-soontoend').bootstrapPaginator(options);
			}
		});

		$(".created-most-popular-btn").click(function(){
			$('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Most Popular</strong>');

			$('#paginator-campaign-created-popular').show();
			$('#paginator-campaign-created-soontoend').hide();
			$('#paginator-campaign-created-byname').hide();
			$('#paginator-campaign-created-recent').hide();

			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/created/popular/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab1-content").html(data);
					totalPages = $(".tab1-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
					}
			                           		

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/created/popular/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab1-content").html(data);
			                   		totalPages = $(".tab1-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-created-popular').bootstrapPaginator(options);
			}
		});
		
		$(".created-search-byname-btn").click(function(){
			$('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Specific Name</strong>');
			$('#paginator-campaign-created-recent').hide();
			$('#paginator-campaign-created-popular').hide();
			$('#paginator-campaign-created-soontoend').hide();
			$('#paginator-campaign-created-byname').show();
			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/created/byname/"+username+"?page=1",
				async : false,
				data : {
						campname : $('.search-campaign-input').val()
				},
				success : function(data){
					$(".tab1-content").html(data);
					totalPages = $(".tab1-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
					}
			                           		

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/created/popular/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab1-content").html(data);
			                   		totalPages = $(".tab1-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-created-byname').bootstrapPaginator(options);
			}
		});
		// $("campaign-byname-btn").click(function(){
		// 	$.ajax({
		// 		url : "/campaign/sort/byname/"+$(".search-campaign").val()
		// 		type : "GET",
		// 		success : function(){
					
		// 		}
		// 	});
		// });
		$(".funded-most-recent-btn").click(function(){
			$("#paginator-campaign-funded-recent").show();
			$("#paginator-campaign-funded-byname").hide();
			$("#paginator-campaign-funded-funded").hide();
			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/funded/recent/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab2-content").html(data);
					totalPages = $(".tab2-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
					}

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/funded/recent/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab2-content").html(data);
			                   		totalPages = $(".tab2-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-funded-recent').bootstrapPaginator(options);
			}
			
		});
		$(".funded-most-funded-btn").click(function(){
			$("#paginator-campaign-funded-funded").show();
			$("#paginator-campaign-funded-recent").hide();
			$("#paginator-campaign-funded-byname").hide();
			
			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/funded/funded/"+username+"?page=1",
				async : false,
				success : function(data){
					$(".tab2-content").html(data);
					totalPages = $(".tab2-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
					}

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/funded/funded/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab2-content").html(data);
			                   		totalPages = $(".tab2-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-funded-funded').bootstrapPaginator(options);
			}
			
		});

		$(".funded-search-byname-btn").click(function(){
			
			$("#paginator-campaign-funded-funded").hide();
			$("#paginator-campaign-funded-recent").hide();
			$("#paginator-campaign-funded-byname").show();
			
			var totalPages;
			var username = $(".username-small").text();
			$.ajax({
				url : "/campaign/sort/funded/byname/"+username+"?page=1",
				data : {campname : $(".fund-search-campaign-input").val()},
				async : false,
				success : function(data){
					$(".tab2-content").html(data);
					totalPages = $(".tab2-content").find(".campaign-totalpages").val();
					if(totalPages == 0){
						$(".tab1-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
					}

				}
			});
			
			
			if (totalPages > 1){
			var options = {
			            currentPage: 1,
			            totalPages: totalPages,
			            onPageClicked: function(e,originalEvent,type,page){
			                   $.ajax({
			                   	url : "/campaign/sort/funded/byname/"+username+"?page="+page,
			                   	async : false,
			                   	success : function(data){
			                   		$(".tab2-content").html(data);
			                   		totalPages = $(".tab2-content").find(".campaign-totalpages").val();
			                   		//$(".donate-btn").popover();
			                   	}
			                   });
			            }
			        }
			$('#paginator-campaign-funded-byname').bootstrapPaginator(options);
			}
			
		});
		$(".editprofile-btn").click(function(e){
			e.preventDefault();
			$(".editprofile-div").toggle('slide');
		});

		$(".profile-submit-btn").click(function(){
			//alert($('.updateprofile-form').serialize());
			$.ajax({
				url : "/save/profile",
				type:"POST",
				data : $('.updateprofile-form').serialize(),
				success : function(data){
					location.href="/"+$(".username-small").text();
				}	
			});
		});
		$(".editpicture-btn").click(function(e){
			e.preventDefault();
			$(".editpicture-div").toggle('slide');
		});

		 $('.uploadpicture-btn').on("click",function(e){ 
			           //$("#preview").html('');
			    e.preventDefault();
				$("#imageform").ajaxForm({
					success:function(){
						location.href="/"+$(".username-small").text();
					}
					
					
				}).submit();
		
		});

		 $('.create-campaign-btn').click(function(){
		 	

		 		$("#createcampaignform").ajaxForm({
		 			success:function(){

		 				
						 $.pnotify({
		 				  title: 'Success',
		 				  text: 'Successfully added Campaign',
		 				  type: 'success',
		 				  delay: 2000
		 				  });
		 				
						setTimeout(function(){
							window.location.reload()

						},2000);


		 			}
		 			
		 			
		 		}).submit();
		 });
		 $('input[name=type]').change(function(){
		 	if ($(this).val()== "ongoing"){
		 		$('.specificdate').val("").attr('readonly',true);

		 	}
		 	if ($(this).val()== "specific"){
		 		$('.specificdate').attr('readonly',false);;
		 	}
		 	
		 });
		var socket = io.connect("http://jeth-linuxbox:1337");
		$(".chat-send-btn").click(function(e){
			e.preventDefault();
			var chatmsg = $(".chat-textarea").val();
			var profilepic = $(".profilepic").attr('src');

			$.ajax({
				url : "http://jeth-linuxbox:1337/chat",	
				type : "get",
				data : {
						chatmsg : chatmsg,
						user : username,
						userpic : profilepic,
						to : "admin"
				},
				success : function(){
					// console.log('success');
				}
			});
			//socket.get("/chat", {chatmsg : 'sdf'}, function(data){});
			// socket.emit('send message', chatmsg);
			 $(".chat-textarea").val('');
		});

		socket.on('new message', function(data){
			var username = $(".username-small").text();
			

			if ((data.user == username) || (data.to == username)){

				$(".chat-ul").prepend("<li style='padding:5px;'><table style='width:100%;'><tr ><td colspan='2'><strong style='font-size:16px;'>"+data.user+"</strong><small style='font-size:12px;'> ("+data.datetime+")</small></td></tr><tr style='border-top: 1px solid #EBEBEB; width:100%;'><td style='width:40px;'><img src="+data.userpic+" style='height:35px; width:35px; padding-right:2px;'/></td><td>"+data.chatmsg+"</td></tr></table></li>");
			}

			
		});

		$.ajax({
			url: '/chat',
			dataType : 'JSON',
			success : function(data){
				console.log(data);
				$.each(data, function(index, data1){
					$('.chat-ul').append("<li style='padding:5px;'><table style='width:100%;'><tr ><td colspan='2'><strong style='font-size:16px;'>"+data[index].from+"</strong><small style='font-size:12px;'> ("+data[index].date+")</small></td></tr><tr style='border-top: 1px solid #EBEBEB; width:100%;'><td style='width:40px;'><img src="+data[index].userpic+" style='height:35px; width:35px; padding-right:2px;'/></td><td>"+data[index].message+"</td></tr></table></li>");
				});
			}
		});
		$('.chat-wrapper').slimScroll({
		         allowPageScroll: true
		     });	
	});	

</script>

