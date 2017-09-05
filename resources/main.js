
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

$( document ).ready(function() {
	var babyScheme = {
        navigationbar: {
            background: '#9ce',
            border: '1px dotted #555',
            color: '#ccc',
            colorHover: '#fff'
        },
        thumbnail: {
            background: '#9ce',
            border: '0px solid #000',
            labelBackground: 'transparent',
            labelOpacity: '0.8',
            titleColor: '#fff',
            descriptionColor: '#eee'
        }
    };
    var babySchemeViewer = {
        background: 'rgba(1, 1, 1, 0.75)',
        imageBorder: '1px solid #f8f8f8',
        imageBoxShadow: '#888 0px 0px 20px',
        barBackground: '#222',
        barBorder: '2px solid #111',
        barColor: '#eee',
        barDescriptionColor: '#aaa'
    };
	    
    $("#nanoGallery").nanoGallery({
        thumbnailHoverEffect:'borderDarker,labelAppear75',
        itemsBaseURL:base_url + 'uploads/',
        colorScheme: babyScheme,
        colorSchemeViewer: babySchemeViewer
    });
});

$( document ).ready(function() {
//  szin:
    $( function() {
    	var prog = document.getElementsByClassName("myProgress");
    	var progressBarColor;
    	
    	
    	for (i = 0; i < prog.length; i++) {
    		var someValueToCheck = prog[i].getAttribute('value');
    		var txt = document.getElementById('prog_value' + i);
    		
    		console.log(someValueToCheck);
    		
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
	    		txt.innerHTML = "Nincs adat!";
	    	}

    	

	    	prog[i].style.backgroundColor = progressBarColor; 
	    	txt.className += 'progress-label';
    	}

    });
});