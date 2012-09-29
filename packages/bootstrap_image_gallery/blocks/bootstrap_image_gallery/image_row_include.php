<?php   defined('C5_EXECUTE') or die("Access Denied."); ?> 
<div id="ccm-slideshowBlock-imgRow<?php  echo $imgInfo['BootstrapGalleryImgId']?>" class="ccm-slideshowBlock-imgRow" >
	<div class="backgroundRow" style="background: url(<?php  echo $imgInfo['thumbPath']?>) no-repeat left top; padding-left: 100px">
		<div class="cm-slideshowBlock-imgRowIcons" >
			<div style="float:right">
				<a onclick="SlideshowBlock.moveUp('<?php  echo $imgInfo['BootstrapGalleryImgId']?>')" class="moveUpLink"></a>
				<a onclick="SlideshowBlock.moveDown('<?php  echo $imgInfo['BootstrapGalleryImgId']?>')" class="moveDownLink"></a>									  
			</div>
			<div style="margin-top:4px"><a onclick="SlideshowBlock.removeImage('<?php  echo $imgInfo['BootstrapGalleryImgId']?>')"><img src="<?php  echo ASSETS_URL_IMAGES?>/icons/delete_small.png" /></a></div>
		</div>
		<strong><?php  echo $imgInfo['fileName']?></strong><br/><br/>
		<br/>
				<div style="margin-top:4px">
		<?php  echo t('Image Title')?>: <input type="text" name="url[]" value="<?php  echo $imgInfo['url']?>" style="vertical-align: middle; font-size: 10px; width: 140px" />
		
		<input type="hidden" name="imgFIDs[]" value="<?php  echo $imgInfo['fID']?>">
		<input type="hidden" name="imgHeight[]" value="<?php  echo $imgInfo['imgHeight']?>">
		</div>
	</div>
</div>
