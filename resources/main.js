
$( document ).ready(function() {  
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250);
            $(this).next().css('opacity', '0');
        },
        function(){
            $(this).find('.caption').slideUp(250);
            $(this).next().css('opacity', '0.8');
        }
    ); 
});

$( document ).ready(function() {
    $( function() {
    	var prog = document.getElementsByClassName("myProgress");
    	var progressBarColor;
    	
    	for (i = 0; i < prog.length; i++) {
    		var someValueToCheck = prog[i].getAttribute('value');
    		var txt = document.getElementById('prog_value' + i);
    		
    		if(someValueToCheck >=80) {
	    		txt.innerHTML = very_good;
	    		progressBarColor = "#0099cc";
	    	}
	    	else if(someValueToCheck >=60) {
	    		txt.innerHTML = good;
		    	progressBarColor = "#80d4ff";
	    	}
	    	else if(someValueToCheck >=40) {
	    		txt.innerHTML = average;
		    	progressBarColor = "#59b300";
	    	}
	    	else if(someValueToCheck >=20) {
	    		progressBarColor = "#ffcc66";
	    		txt.innerHTML = below_average;
	    	}
	    	else if(someValueToCheck >=20) {
	    		progressBarColor = "#ff0000";
	    		txt.innerHTML = weak;
	    	}
	    	else {
	    		progressBarColor = "#666633";
	    		txt.innerHTML = no_data;
	    	}

	    	prog[i].style.backgroundColor = progressBarColor; 
	    	txt.className += 'progress-label';
    	}

    });
});