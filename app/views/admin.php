

	<ul class="chat-ul" style="list-style:none;">
	</ul>
	<script src="assets/js/jquery-2.0.0.min.js"></script>
	<script src="assets/js/jquery-migrate-1.2.0.min.js"></script>
	<script src="assets/js/socket.io.js"></script>
	<script src="assets/js/sails.io.js"></script>


	<script>
		var socket = io.connect("http://localhost:1337");
		socket.on('new message', function(data){
			
				$(".chat-ul").prepend("<li style='padding:5px;'><table style='width:100%;'><tr ><td colspan='2'><strong style='font-size:16px;'>"+data.user+"</strong><small style='font-size:12px;'> ("+data.datetime+")</small></td></tr><tr style='border-top: 1px solid #EBEBEB; width:100%;'><td style='width:40px;'><img src="+data.userpic+" style='height:35px; width:35px; padding-right:2px;'/></td><td>"+data.chatmsg+"</td></tr></table></li>");
			
		});
	</script>