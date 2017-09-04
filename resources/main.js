
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