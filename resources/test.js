$(document).ready(function() {
	$('[data-toggle="popover"]').popover();
    $(".answerRadio").click(function (e) {
    	
    	var name = $(this).attr('id');
    	var arr = name.split(".");
    	var id = arr[0];
    	var skill_group_id=arr[1];
    	var value = arr[2];
		console.log(id + " " + skill_group_id+ " " + value);
		
		
		$.ajax({
		  method: 'POST',
		  url: base_url + 'send_answer',
          dataType: 'text/html',
		  data: {
			'child_id': $("#child_id").val(),
		    'id': id,
		    'skill_group_id': skill_group_id,
		    'value': value
		  },
		  success: function(data) {
		         console.log("kesz");
		      }
        });
 
    });
});

$('.btn').on('click', function (e) {
    $('.btn').not(this).popover('hide');
});
