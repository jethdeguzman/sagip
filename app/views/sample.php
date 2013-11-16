 <!DOCTYPE html>

<ul>
	
	<?php foreach ($names as $data) { ?>
	<li> <input class="name" type="text" data-id="<?php echo $data->id; ?>" value="<?php echo $data->name;?>"> <a href="#" class="edit-btn">edit</a></li>
	<?php }?>

	
</ul>
<div class="text"></div>
<script src="assets/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript">
	
	jQuery(function($){
		$(".edit-btn").click(function(e){
			// console.log($(this).prev());
			// e.preventDefault();
			// var obj = {id:"1", name: "rosi"};

			$.ajax({
				url : "/save/updatename/1/jimbo",
				type : "get",
				success : function(){
					alert("suc");
				}
				
			});
		});
	});
	$.ajax({
		url : "/sample/text",
		success : function(data){
			$(".text").html(data);
		}
	});
</script>

