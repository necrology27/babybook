$(document).ready(function() {
	var current_page = $.trim(document.getElementById("current_page").innerHTML);
	var d = document.getElementById(current_page);
	d.className += " active";
	
	var current_place = $.trim(document.getElementById("current_place").innerHTML);
	var e = document.getElementById(current_place);
	e.className += " active";
	
	$(".role_radio").click(function (e) {
    	var name = $(this).attr('id');
    	var arr = name.split(".");
    	var role_type = arr[0];
    	var id=arr[1];
		$.ajax({
		  method: 'POST',
		  url: base_url + 'admin/change_role',
          dataType: 'text',
		  data: {
			'user_id': id,
		    'new_role_type': role_type
		  },
		  success: function(data) {}
        });
    });
});

$("#sortInput").on('keydown', function(){
    $.ajax({
        url: base_url + 'admin/seach_by_name/' + table_name + "/" + text,
        type: 'POST',
        data: {
            table: table_name,
            text: $("#sortInput").val()
        },
        dataType: 'html',
        success: function(response) {
        	
        }
    });
});	