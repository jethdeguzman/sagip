<section class="section-wrapper posts-w">
<div class="container" style="">
<h3 class="section-header"><i class="icon-comments-alt"></i> Help Desk Chat</h3>
	<div class="row-fluid">
		<div class="span4">
			<ul class="nav nav-list well online-ul">
				<li class="nav-header" style="font-size:16px;">
					<i class="icon-ok-circle"></i>Online Users
				</li>
				<li class="divider online-divider">
				</li>
			
				<li class="nav-header" style="font-size:16px;">
					<i class="icon-group"></i>All Users
				</li>
				<li class="divider alluser-divider">
					<?php foreach ($data as $row) {?>

						<li><img style='float:left; height:30px; width:30px;' src="<?php echo $row->profilepic; ?>"><a class="all-user" href='#' id="<?php echo $row->id; ?>"><?php echo $row->username;?><a></li>
					<?php }?>
				</li>
			</ul>
		</div>
		<div class="span8" >
			<div class="well" >
				<div class="row" >
					<div class="span12" >
						<strong style=" font-size:20px; margin-left:20px;"><i  class="icon-envelope icon-large"></i> Messages of <small style=" font-size:20px;" class="username-small"></small></strong>
						<div class="chat-message-div chat-wrapper" style=" ">
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span12" style="margin-left:20px;">
						<textarea class="span11 chat-textarea" placeholder="Type here..." style="margin-top:5px; height:100px;"></textarea><br>
						<a class="btn btn-inverse btn-medium chat-send-btn">Send</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<script>
	jQuery(function($){
		var dataonline = {};
		var dataonlinearr = [];

		$.ajax({
			url : "/admin/online",
			dataType : "JSON",
			type : "GET",
			async : false,
			success : function(data){
				// console.log(data);
				$.each(data,function(index, value){
					 dataonlinearr.push(data[index].username);
					 dataonline[index] = ({"username" : data[index].username, "id" : data[index].id, "profilepic" : data[index].profilepic});
					 $(".online-divider").after("<li class='online-li'><img style='float:left; height:30px; width:30px;' src="+dataonline[index].profilepic+"> <a class='online-user' href='#' id="+dataonline[index].id+">"+dataonline[index].username+"<a></li>");

				});
				
			}
		});
				
		var socket = io.connect("http://jeth-linuxbox:1337");

		socket.on('online', function(data){
			if (dataonlinearr.indexOf(data.username) == -1){
				dataonlinearr.push(data.username);
				$(".online-divider").after("<li class='online-li'><img style='float:left; height:30px; width:30px;' src="+data.profilepic+"><a class='online-user' href='#' id="+data.userid+">"+data.username+"<a></li>");
				// console.log(dataonlinearr);		
			}
		});
		
		socket.on('offline', function(data){
			$.each(dataonline, function(index, value){
				if(value.username == data.username){
					delete dataonline[index];
					// console.log(dataonline);
				}
			});
			var ind = dataonlinearr.indexOf(data.username);
			dataonlinearr.splice(ind,1);
			var onlineid = "#"+data.username;
			$('.online-li').remove(":contains('"+data.username+"')");
		});
		var user;

		$('.online-ul').on("click",".online-li .online-user",function(){
	
			var username = $(this).text();
			user = username;
			loadmessages(username);
		});
		$('.all-user').stop(true,true).click(function(){
			 var username = $(this).text();
			user = username;
			loadmessages(username);
		});

		function loadmessages(username){
			$('.username-small').text(username);
			
			$('.chat-message-div').load('/chat/chatbody');

			$.ajax({
					url: '/chat/specific',
					data : {
						username : username
					},
					dataType : 'JSON',
					success : function(data){
						// console.log(data);
						$.each(data, function(index, data1){
							$('.chat-ul').append("<li style='padding:5px;'><table style='width:100%;'><tr ><td colspan='2'><strong style='font-size:16px;'>"+data[index].from+"</strong><small style='font-size:12px;'> ("+data[index].date+")</small></td></tr><tr style='border-top: 1px solid #EBEBEB; width:100%;'><td style='width:40px;'><img src="+data[index].userpic+" style='height:35px; width:35px; padding-right:2px;'/></td><td>"+data[index].message+"</td></tr></table></li>");
						});
					}
				});
		}
		socket.on('new message', function(data){
			
			if(data.to == 'admin'){
				$.pnotify({
		 				  title: 'Chat Notification',
		 				  text:  "<img src="+data.userpic+" style='height:35px; width:35px; padding-right:2px;'/>"+data.user+ " just sent a message",
		 				  type: 'info',
		 				  delay: 5000
		 				  });
			}
					
			if ((data.user == user) || (data.to == user)){
				
				$(".chat-ul").prepend("<li style='padding:5px;'><table style='width:100%;'><tr ><td colspan='2'><strong style='font-size:16px;'>"+data.user+"</strong><small style='font-size:12px;'> ("+data.datetime+")</small></td></tr><tr style='border-top: 1px solid #EBEBEB; width:100%;'><td style='width:40px;'><img src="+data.userpic+" style='height:35px; width:35px; padding-right:2px;'/></td><td>"+data.chatmsg+"</td></tr></table></li>");
			}
			
		});

		$(".chat-send-btn").click(function(){
			var chatmsg = $(".chat-textarea").val();
			// alert($('.username-small').text());
			$.ajax({
				url : "http://jeth-linuxbox:1337/chat",	
				type : "get",
				data : {
						chatmsg : chatmsg,
						user : "admin",
						userpic : 'images/users/admin.png',
						to : $('.username-small').text()
				},
				success : function(){
					// console.log('success');
				}
			});
			 $(".chat-textarea").val('');
		});
		$('.chat-wrapper').slimScroll({
		    allowPageScroll: true
		});

	});
</script>