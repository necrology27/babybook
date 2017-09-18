$(document).ready(function() {
		var current_page=document.getElementById("current_page").innerHTML;
				
		console.log("oldal: "+current_page)
		var d = document.getElementById(current_page);
		d.className += " active";
		
		var current_place=document.getElementById("current_place").innerHTML;
		
		console.log("hely: "+current_place)
		var e = document.getElementById(current_place);
		e.className += " active";
		
		$(".role_radio").click(function (e) {
	    	var name = $(this).attr('id');
	    	var arr = name.split(".");
	    	var role_type = arr[0];
	    	var id=arr[1];
			console.log(id + " " + role_type);
			$.ajax({
			  method: 'POST',
			  url: base_url + 'admin/change_role',
	          dataType: 'text',
			  data: {
				'user_id': id,
			    'new_role_type': role_type
			  },
			  success: function(data) {
			         console.log("kesz");
			      }
	        });
			
	    });	
		
});