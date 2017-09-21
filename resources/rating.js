$(document).ready(function() {
	var disc_rating = document.getElementsByClassName("rating_type");
	var i;
	for (i = 0; i < disc_rating.length; i++) {
		var id = disc_rating[i].value;
		if(disc_rating[i].value=="1")
			{
			$(disc_rating[i]).next().children()[0].className += " rating_active";
			$(disc_rating[i]).next().children()[0].style.pointerEvents = 'none';
			}
		if(disc_rating[i].value=="0"){
			$(disc_rating[i]).next().children()[2].className += " rating_active";
			$(disc_rating[i]).next().children()[2].style.pointerEvents = 'none';
		}	
	}

    $(".rate").click(function (e) {
    	var name = $(this).attr('id');
    	var arr = name.split(".");
    	if(arr[0]=="like")
    		var type = 1;
    	if(arr[0]=="dislike")
    		var type = 0;
    
    	var ds_id=arr[1];
    	var like_value = arr[2];
    	var dislike_value = arr[3];
		$.ajax({
		  method: 'POST',
		  url: base_url + 'rating',
          dataType: 'text',
		  data: {
			'type': type,
		    'ds_id': ds_id,
		    'like_value': like_value,
		    'dislike_value': dislike_value
		  },
		  success: function(data) {
	         location.reload(true);
	      }
        });
 
    });
    
    $(".showText").click(function (e) {
    	$(this).next().toggle();
    });

});

