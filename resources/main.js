
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
    $("#nanoGallery").nanoGallery({
        thumbnailWidth:300,
        thumbnailHeight:300,
        thumbnailHoverEffect:'borderDarker,labelAppear75',
        items: [
            {
                // image url
                src: base_url + 'uploads/16/404/img_1504507238.png',		
                // thumbnail url
                srct: base_url + 'uploads/16/404/img_1504507238.png',		
                // Title
                title: 'Ferike',
                // Description
                description : 'Ferike elso kepe'		
            },
            {
                src: base_url + 'uploads/10/390/img_1503996872.png',
                srct: base_url + 'uploads/10/390/img_1503996872.png',
                title: 'Lacika'
            }
        ]
    });
});

$( document ).ready(function() {
//  szin:
    $( function() {
    	var prog = document.getElementsByClassName("myProgress");
    	var progressBarColor;
    	
    	
    	for (i = 0; i < prog.length; i++) {
    		var someValueToCheck = prog[i].getAttribute('value');
    		console.log(someValueToCheck);
	    	if(someValueToCheck >= 95) progressBarColor = "#e60000";
	    	else if(someValueToCheck >=80) progressBarColor = "#999966";
	    	else if(someValueToCheck >=70) progressBarColor = "#b3ffb3";
	    	else if(someValueToCheck >=55) progressBarColor = "#00cc99";
	    	else if(someValueToCheck >=45) progressBarColor = "#ccccff";
	    	else if(someValueToCheck >=35) progressBarColor = "#ffcccc";
	    	else if(someValueToCheck >=25) progressBarColor = "#ff9999";
	    	else if(someValueToCheck >=10) progressBarColor = "#ff6666";
	    	else if(someValueToCheck >=5) progressBarColor = "#e60000";
	    	else progressBarColor = "#666633";
	
	    	//prog[i].css('background-color', progressBarColor);
	    	prog[i].style.color=progressBarColor;
	    	prog[i].style.backgroundColor = progressBarColor; 
    	}

    });
});