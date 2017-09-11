$(document).ready(function() {
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
		thumbnailWidth : '300 XS100 LA400 XL500',
		thumbnailHeight : '200 XS80 LA250 XL350',
		thumbnailLabel: { position: 'overImageOnBottom', hideIcons: true }
	});
});
