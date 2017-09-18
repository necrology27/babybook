function load_album() {
	var formData = new FormData();
	
	$(".upload").upload({
		theme: "fs-light",
		data: formData,
		action: base_url + "child/upload_album_images"
	});
	
	var babyScheme = {
		navigationbar : {
			background : '#9ce',
			border : '1px dotted #555',
			color : '#ccc',
			colorHover : '#fff'
		},
		thumbnail : {
			background : '#9ce',
			border : '0px solid #000',
			labelBackground : 'transparent',
			labelOpacity : '0.8',
			titleColor : '#fff',
			descriptionColor : '#eee'
		}
	};
	var babySchemeViewer = {
		background : 'rgba(1, 1, 1, 0.75)',
		imageBorder : '1px solid #f8f8f8',
		imageBoxShadow : '#888 0px 0px 20px',
		barBackground : '#222',
		barBorder : '2px solid #111',
		barColor : '#eee',
		barDescriptionColor : '#aaa'
	};

	$("#nanoGallery").nanoGallery({
		thumbnailHoverEffect : 'borderDarker,labelAppear75',
		itemsBaseURL : base_url + 'uploads/',
		colorScheme : babyScheme,
		colorSchemeViewer : babySchemeViewer,
	    itemsSelectable : true, showCheckboxes: true, checkboxStyle : 'left:15px; top:15px;',
		thumbnailWidth : '300 XS100 LA250 XL300',
		thumbnailHeight : '200 XS80 LA170 XL220',
		thumbnailLabel: { position: 'overImageOnBottom', hideIcons: false }
	});
	
}

$(document).ready(function() {
	load_album();
	
	$("#remove_btn").on("click", function(){
		var selected = $('#nanoGallery').nanoGallery('getSelectedItems');
		for (i = 0; i < selected.length; i++) {
			var name = selected[i].src.split("/")[8];
		    $.ajax({
		        url: base_url + 'child/delete_images/' + name+"/"+chid,
		        type: 'POST',
		        data: {
		            file_name: name,
		            child_id: chid
		        },
		        dataType: 'html',
		        success: function(response) {
					var gallery = $("#gallery");
					gallery.html(response);

					load_album();
		        }
		    });
		}
	});	
});
