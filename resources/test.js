$(document).ready(function() {
    $(".answerRadio").click(function (e) {
    	var name = $(this).attr('id');
    	var arr = name.split(".");
    	var id = arr[0];
    	var value = arr[1];
		console.log(id + " " + value);
		
		$.ajax({
		  method: 'POST',
		  url: 'send_answer',
          dataType: 'text/html',
		  data: {
			'child_id': document.getElementById('chid').innerHTML,
		    'id': id,
		    'value': value
		  },
		  beforeSend: function() {
			  document.getElementById('loading').innerHTML = "Loading...";
		  },
		  complete: function(data) {
			  if (data == "ok") {
				  document.getElementById('loading').innerHTML = "";
			  } else {
				  document.getElementById('loading').innerHTML = "error";
				  }
		  },
//		  error: function() {
//	            alert( "Error." );
//        }
//	    }).done(function(data) {
//			  document.getElementById('loading').innerHTML = data;
//		}).fail(function() {
//         
//            alert( "Posting failed." );
        });
 
    });
});

