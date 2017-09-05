 function myFunction() {
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

function sort_by_name() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  /*Make a loop that will continue until
	  no switching has been done:*/
	  while (switching) {
	    //start by saying: no switching is done:
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    //Loop through all list-items:
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByTagName("h3")[0];
	    	a_next= b[i+1].getElementsByTagName("h3")[0];
	      //start by saying there should be no switching:
	      shouldSwitch = false;
	      /*check if the next item should
	      switch place with the current item:*/
	      
	      if (a.innerHTML.toLowerCase() > a_next.innerHTML.toLowerCase()) {
	        /*if next item is alphabetically
	        lower than current item, mark as a switch
	        and break the loop:*/
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      /*If a switch has been marked, make the switch
	      and mark the switch as done:*/
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}

function sort_by_age() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  /*Make a loop that will continue until
	  no switching has been done:*/
	  while (switching) {
	    //start by saying: no switching is done:
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    //Loop through all list-items:
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByClassName("birthday")[0];
	    	a_next= b[i+1].getElementsByClassName("birthday")[0];
	      //start by saying there should be no switching:
	      shouldSwitch = false;
	      /*check if the next item should
	      switch place with the current item:*/
	      
	      if (a.value > a_next.value) {
	        /*if next item is alphabetically
	        lower than current item, mark as a switch
	        and break the loop:*/
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      /*If a switch has been marked, make the switch
	      and mark the switch as done:*/
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}

function sort_by_registration() {
	var list, i, switching, b, shouldSwitch;
	  list = document.getElementById("childs");
	  switching = true;
	  /*Make a loop that will continue until
	  no switching has been done:*/
	  while (switching) {
	    //start by saying: no switching is done:
	    switching = false;
	    b = list.getElementsByClassName("one_child");
	    //Loop through all list-items:
	    for (i = 0; i < (b.length - 1); i++) {
	    	a = b[i].getElementsByClassName("registration_date")[0];
	    	a_next= b[i+1].getElementsByClassName("registration_date")[0];
	      //start by saying there should be no switching:
	      shouldSwitch = false;
	      /*check if the next item should
	      switch place with the current item:*/
	      
	      if (a.value > a_next.value) {
	        /*if next item is alphabetically
	        lower than current item, mark as a switch
	        and break the loop:*/
	        shouldSwitch= true;
	        break;
	      }
	    }
	    if (shouldSwitch) {
	      /*If a switch has been marked, make the switch
	      and mark the switch as done:*/
	      b[i].parentNode.insertBefore(b[i + 1], b[i]);
	      switching = true;
	    }
	  }
}


