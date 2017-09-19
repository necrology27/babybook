 function search_by_name() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("childs");
    li = ul.getElementsByClassName("one_child");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h3")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

 function monthDiff(from, to) {
 	var months = to.getMonth() - from.getMonth() 
     + (12 * (to.getFullYear() - from.getFullYear()));

 	if(to.getDate() < from.getDate()){
 	    months--;
 	}
 	return months;
}
 
$( document ).ready(function() {
 	$("#ageslider").slider().on('slide', function(ev){
		var sl = $("#ageslider");
		var children = document.getElementsByClassName('child_box');
		if ($.inArray(0, sl.data('slider').getValue()) > -1 && $.inArray(72, sl.data('slider').getValue()) > -1) {
			for (var i = 0; i < children.length/2; i++) {
				$('#child' + i).show();
			}
		} else {
			for (var i = 0; i < children.length/2; i++) {
				var birthday = new Date(document.getElementById('age' + i).innerHTML);
				var age = monthDiff(birthday, new Date());
				if (age >= sl.data('slider').getValue()[0] && age <= sl.data('slider').getValue()[1]) {
					$('#child' + i).show();
				} else {
					$('#child' + i).hide();
				}
			}
		}
	});
});

function sort_by_name() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  while (switching) {
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByTagName("h3")[0];
	    	a_next= b[i+1].getElementsByTagName("h3")[0];
	      shouldSwitch = false;
	      if (a.innerHTML.toLowerCase() > a_next.innerHTML.toLowerCase()) {
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}

function sort_by_age() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  while (switching) {
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByClassName("birthday")[0];
	    	a_next= b[i+1].getElementsByClassName("birthday")[0];
	      shouldSwitch = false;
	      
	      if (a.value > a_next.value) {
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}

function sort_by_registration() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  while (switching) {
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByClassName("registration_date")[0];
	    	
	    	a_next= b[i+1].getElementsByClassName("registration_date")[0];
	      shouldSwitch = false;
	      if (a.value > a_next.value) {
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}

function sort_by_last_update() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  while (switching) {
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByClassName("last_update")[0];
	    	a_next= b[i+1].getElementsByClassName("last_update")[0];
	      shouldSwitch = false;
	      if (a.value > a_next.value) {
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}

$('#gender_check_list input[type=checkbox]').change(function(){ 
	var children = document.getElementsByClassName('child_box');
	var checkedItems = $('#gender_check_list').find('input:checked');
	if (checkedItems.length == 2 || checkedItems.length == 0) {
		for (var i = 0; i < children.length/2; i++) {
			$('#child' + i).show();
		}
	} else {
		for (var i = 0; i < children.length/2; i++) {
			if ($('#female_check').is(":checked") && document.getElementById('gender' + i).innerHTML == 'male') {
				$('#child' + i).hide();
			} else if ($('#male_check').is(":checked") && document.getElementById('gender' + i).innerHTML == 'female') {
				$('#child' + i).hide();
			}
		}
	}
});

