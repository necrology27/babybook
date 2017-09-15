$(document).ready(function() {
    $(".rate").click(function (e) {
    	console.log("rating javascript");
    	var name = $(this).attr('id');
    	var arr = name.split(".");
    	if(arr[0]=="like")
    		var type = 1;
    	if(arr[0]=="dislike")
    		var type = 0;
    
    	var ds_id=arr[1];
    	var value = arr[2];
								console.log(name);
		$.ajax({
		  method: 'POST',
		  url: base_url + 'rating',
          dataType: 'text',
		  data: {
			'type': type,
		    'ds_id': ds_id,
		    'value': value
		  },
		  success: function(data) {
		         location.reload(true);
		      }
        });
 
    });
});
