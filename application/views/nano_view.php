<?php if ($img_count==0)
{?>
	<br/>
    <h1><?php echo $no_child; ?></h1>
<?php
}
else{ ?>
    <div id="nanoGallery">
    <?php 
    for ($i = 0; $i < $img_count; $i++) {
        ?>
    	<a href="<?php echo $user_id.'/'.$child_id.'/'.$imgs[$i]["file_name"];?>"
    		 data-ngthumb="<?php echo $user_id.'/'.$child_id.'/'.$imgs[$i]["file_name"];?>"	
    		  data-ngdesc="<?php echo $imgs[$i]["description"];?>"><?php echo $imgs[$i]["title"];?></a>
    <?php
    }?>
	</div>
<?php }?>

<script>
$(document).ready(function() {
	var formData = new FormData();
	
	$(".upload").upload({
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
		thumbnailWidth : '300 XS100 LA400 XL500',
		thumbnailHeight : '200 XS80 LA250 XL350',
		thumbnailLabel: { position: 'overImageOnBottom', hideIcons: true }
	});
});
</script>