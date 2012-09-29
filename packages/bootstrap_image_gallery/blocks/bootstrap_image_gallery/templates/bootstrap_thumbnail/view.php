<?php   defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
if ($c->isEditMode()) {
echo '<style >.flexslider_edit_disable{width:100%;min-height:20px;background:#999999;padding:10px;text-align:center;color:#fff}
.flexslider_edit_disable.error{color:#cf0000}
</style>';
echo t('<div class="flexslider_edit_disable"><h4 >Bootstrap Image Gallery disabled in edit mode.</h4></div>');
}
else{
$html = Loader::helper('html');
$ih = Loader::helper('image');
$mobile_ck=Loader::helper('mobile_detect','bootstrap_image_gallery');
//load bootstrap js for non bootstrap theme
//$controller->addFooterItem($html->javascript('bootstrap.min.js','bootstrap_image_gallery'));

$controller->addFooterItem($html->javascript('load-image.min.js','bootstrap_image_gallery'));
$controller->addFooterItem($html->javascript('bootstrap-image-gallery.min.js','bootstrap_image_gallery'));
$custom_js='<script>

$(function () {
    "use strict";

    // Start slideshow button:
    $("#start-slideshow'.$bID.'").button().click(function () {
        var options = $(this).data(),
            modal = $(options.target),
            data = modal.data("modal");
        if (data) {
            $.extend(data.options, options);
        } else {
            options = $.extend(modal.data(), options);
        }
        modal.find(".modal-slideshow").find("i")
            .removeClass("icon-play")
            .addClass("icon-pause");
        modal.modal(options);
    });

    // Toggle fullscreen button:
    $("#toggle-fullscreen'.$bID.'").button().click(function () {
	
        var button = $(this),
            root = document.documentElement;
        if (!button.hasClass("btn-active")) {            
			 $("#toggle-fullscreen'.$bID.'").addClass("btn-active"); 
			 $("#modal-gallery'.$bID.'").addClass("modal-fullscreen");
            if (root.webkitRequestFullScreen) {
                root.webkitRequestFullScreen(
                    window.Element.ALLOW_KEYBOARD_INPUT
                );
            } else if (root.mozRequestFullScreen) {
                root.mozRequestFullScreen();
            }
        } else {
           
			 $("#toggle-fullscreen'.$bID.'").removeClass("btn-active");
			 $("#modal-gallery'.$bID.'").removeClass("modal-fullscreen");
            (document.webkitCancelFullScreen ||
                document.mozCancelFullScreen ||
                $.noop).apply(document);
        }
    });

});

</script>';
$controller->addFooterItem($custom_js);
?>

<?php 
$custom_height = $imgheight;

echo '<style>
.gal_img_span {float:left;display:block;padding:0px;}
a.gal_img img {max-width:100%;vertical-align:middle;}
.gal_img_span_id'.$bID.'{height:'.$custom_height.'px;}
.gal_img_span_id'.$bID.' {margin:0 20px 20px 0!important}
#toggle-fullscreen'.$bID.':active ,#toggle-fullscreen'.$bID.'.btn-active {background: #333 !important}
</style>';

//start slideshow btn
if($startss=="true"){
echo '<button id="start-slideshow'.$bID.'" class="btn btn-large btn-success right_space_btn" data-slideshow="5000" data-target="#modal-gallery'.$bID.'" data-selector="#gallery'.$bID.' a[rel=gallery]">Start Slideshow</button>';
} 
//toggle fullscreen btn
if($tfull=="true"){ 
echo '<button id="toggle-fullscreen'.$bID.'" class="btn btn-large btn-primary left_space_btn" data-toggle="button">Toggle Fullscreen</button>';
 }
echo '<br/><br/>';
echo '<div id="gallery'.$bID.'"  data-toggle="modal-gallery" data-target="#modal-gallery'.$bID.'">';

foreach($images as $imgInfo) {
	$f = File::getByID($imgInfo['fID']);
	$fp = new Permissions($f);
	if ($fp->canRead()) {
	//set default thumb size 75*75
	if(!$imgwidth){$imgwidth=75;}
	if(!$imgheight){$imgheight=75;}
	
	//crop option
	if($aspectratio=='false'){
	$thumb_obj = $ih->getThumbnail($f, $imgwidth, $imgheight,true);
	}
	else{$thumb_obj = $ih->getThumbnail($f, $imgwidth, $imgheight,false);}
	//thumb link
	$thumb_link =$thumb_obj->src;
	
	if($checkimg=='true'){
	
		if ($mobile_ck->isMobile() && !$mobile_ck->isTablet()) {
		//limit img size for mobile
		$mobile_obj=$ih->getThumbnail($f, 1280, 800);
		$mobile_img_link=$mobile_obj->src;
		$img_link=$mobile_img_link;
		}
		else{
		$img_link=$f->getRelativePath();
		}
	
	}
	else{
	//img link
	$img_link=$f->getRelativePath();
	$mobile_img_link='';
	}



	if($cdnstatus=='true'){
		if($cdnurl){
		$cdnurl=rtrim($cdnurl,'/');
		$thumb_link=$cdnurl.$thumb_link;
		$img_link=$cdnurl.$img_link;
		}

	}

echo'<span class="gal_img_span gal_img_span_id'.$bID.'"><a rel="gallery" href="'.$img_link.'" class="gal_img thumbnails" title ="'.$imgInfo["url"].'" ><img src="'.$thumb_link.'" /></a></span>';
	//end can read condition
	}
//end foreach	
}
echo '<div style="clear:both"></div>';
//modal-gallery is the modal dialog used for the image gallery

echo'<div id="modal-gallery'.$bID.'" class="modal modal-gallery hide fade">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3 class="modal-title"></h3>
		</div>
		<div class="modal-body">
			<div class="modal-image"></div>
		</div>
		<div class="modal-footer">';
			
if ($downloadbtn == 'true') {
echo '<a class="btn modal-download" target="_blank"> <i class="icon-download"></i><span>Download</span> </a>';
	}
if($startss == "true"){	
 echo '<a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"> <i class="icon-play icon-white"></i> <span>Slideshow</span> </a>';
 }
 echo '<a class="btn btn-info modal-prev"> <i class="icon-arrow-left icon-white"></i> <span>Previous</span> </a><a class="btn btn-primary modal-next"> <span>Next</span> <i class="icon-arrow-right icon-white"></i> </a>
		</div>
	</div>';
//end modal
	
echo '</div>';
//end gallery div container

}
?>
