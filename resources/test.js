$(document).ready(function() {
	$('[data-toggle="popover"]').popover();
    $(".answerRadio").click(function (e) {
    	
    	var name = $(this).attr('id');
    	var arr = name.split(".");
    	var id = arr[0];
    	var skill_group_id=arr[1];
    	var value = arr[2];
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
		      }
        });
 
    });
});

$('.btn').on('click', function (e) {
    $('.btn').not(this).popover('hide');
});

function popup_function(id) {
	var popups = document.getElementsByClassName("show");
	var i;
	for (i = 0; i < popups.length; i++) {
		if (popups[i].getAttribute('id') != id)
			popups[i].classList.toggle("show");
	} 
    var popup = document.getElementById(id);
    popup.classList.toggle("show");
}