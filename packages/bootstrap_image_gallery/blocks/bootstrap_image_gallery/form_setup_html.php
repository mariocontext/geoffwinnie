<?php  
defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
$ah = Loader::helper('concrete/interface');
$fm = loader::helper('form');
$bt = BlockType::getByHandle('bootstrap_image_gallery');
$basic_path=DIR_REL;
$basic_path=rtrim($basic_path,"/");
$burl=$basic_path.'/packages/bootstrap_image_gallery/blocks/bootstrap_image_gallery';
?>
<style>
#ccm-slideshowBlock-imgRows a{cursor:pointer}
#ccm-slideshowBlock-imgRows .ccm-slideshowBlock-imgRow,
#ccm-slideshowBlock-fsRow {margin-bottom:16px;clear:both;padding:7px;background-color:#eee}
#ccm-slideshowBlock-imgRows .ccm-slideshowBlock-imgRow a.moveUpLink{ display:block; background:url(<?php  echo $burl; ?>/images/arrow_up.png) no-repeat center; height:10px; width:16px; }
#ccm-slideshowBlock-imgRows .ccm-slideshowBlock-imgRow a.moveDownLink{ display:block; background:url(<?php  echo $burl; ?>/images/arrow_down.png) no-repeat center; height:10px; width:16px; }
#ccm-slideshowBlock-imgRows .ccm-slideshowBlock-imgRow a.moveUpLink:hover{background:url(<?php  echo $burl; ?>/images/arrow_up_black.png) no-repeat center;}
#ccm-slideshowBlock-imgRows .ccm-slideshowBlock-imgRow a.moveDownLink:hover{background:url(<?php  echo $burl; ?>/images/arrow_down_black.png) no-repeat center;}
#ccm-slideshowBlock-imgRows .cm-slideshowBlock-imgRowIcons{ float:right; width:35px; text-align:left; }
 .ccm-summary-selected-item input{margin-bottom:5px}
 
.ui-tabs .ui-tabs-nav li{margin:0 5px 0 0;padding:0}
 .ui-tabs .ui-tabs-nav li a{padding:0 5px;margin:0} 
div.ccm-block-field-group{border:none}
.ccm-summary-selected-item p{font-weight:bold}
 </style>
 <script type="text/javascript" src="<?php  echo $burl; ?>/jquery.ui.tabs.js"></script>
 <script type="text/javascript">
 $(function() {
		$( "#tabs" ).tabs({ selected: 0 });
	});
 </script>
<div class="ccm-ui">
<div class="ccm-block-field-group" id="tabs">	
<ul id="ccm-pagelist-tabs" class="ccm-dialog-tabs">
	<li ><a  href="#tabs-1"> <?php  echo t('Image') ?> </a></li>	
	<li ><a   href="#tabs-2"> <?php  echo t('Controls')?> </a></li>
    <li ><a   href="#tabs-3"> <?php  echo t('CDN')?> </a></li>

</ul>
<div style="clear:both"></div>
<div id="tabs-1" class="ccm-pagelistPane">
<div id="newImg">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr>
	<td>
	<strong><?php  echo t('Type')?></strong>
	<select name="type" style="vertical-align: middle">
		<option value="CUSTOM"<?php   if ($type == 'CUSTOM') { ?> selected<?php   } ?>><?php  echo t('Custom Slideshow')?></option>
		<option value="FILESET"<?php   if ($type == 'FILESET') { ?> selected<?php   } ?>><?php  echo t('Pictures from File Set')?></option>
	</select>
	</td>
	
	</tr>
	<tr style="padding-top: 8px">
	<td colspan="2">
	<br />
	<span id="ccm-slideshowBlock-chooseImg"><?php  echo $ah->button_js(t('Add Image'), 'SlideshowBlock.chooseImg()', 'left');?></span>
	</td>
	</tr>
	</table>
</div>
<br/>

<div id="ccm-slideshowBlock-imgRows">
<?php   if ($fsID <= 0) {
	foreach($images as $imgInfo){ 
		$f = File::getByID($imgInfo['fID']);
		$fp = new Permissions($f);
		$imgInfo['thumbPath'] = $f->getThumbnailSRC(1);
		$imgInfo['fileName'] = $f->getTitle();
		if ($fp->canRead()) { 
			$this->inc('image_row_include.php', array('imgInfo' => $imgInfo));
			}
	}
} ?>
</div>

<?php  
Loader::model('file_set');
$s1 = FileSet::getMySets();
$sets = array();
foreach ($s1 as $s){
    $sets[$s->fsID] = $s->fsName;
}
$fsInfo['fileSets'] = $sets;

if ($fsID > 0) {
	$fsInfo['fsID'] = $fsID;
	
} else {
	$fsInfo['fsID']='0';
	
}
$this->inc('fileset_row_include.php', array('fsInfo' => $fsInfo)); ?> 

<div id="imgRowTemplateWrap" style="display:none">
<?php  
$imgInfo['slideshowImgId']='tempSlideshowImgId';
$imgInfo['fID']='tempFID';
$imgInfo['fileName']='tempFilename';
$imgInfo['origfileName']='tempOrigFilename';
$imgInfo['thumbPath']='tempThumbPath';
$imgInfo['duration']=$defaultDuration;
$imgInfo['fadeDuration']=$defaultFadeDuration;
$imgInfo['groupSet']=0;
$imgInfo['imgHeight']=tempHeight;
$imgInfo['url']='';
$imgInfo['class']='ccm-slideshowBlock-imgRow';
?>
<?php   $this->inc('image_row_include.php', array('imgInfo' => $imgInfo)); ?> 
</div>

</div>

<div id="tabs-2" class="ccm-pagelistPane" >
<span class="help-block">(NOTE: If using a bootstrap based theme make sure to select a "bootstrap" custom template after adding a gallery to a page.)</span>
<?php  if($imgheight==null){$imgheight=75;}
if($imgwidth==null){$imgwidth=75;}
?>
<h5 >Set thumbnail width (default 75px)</h5>
<?php   echo $fm->text('imgwidth',$imgwidth)?> px

<h5 >Set thumbnail height (default 75px)</h5>
<?php   echo $fm->text('imgheight',$imgheight)?> px
<hr/>
<h5 ><?php   echo t('Keep aspect ratio for thumbnail ')?></h5>
<span class="help-block">(Set to false to crop)</span>
<select name="aspectratio"  id="aspectratio">
<option value="false" <?php    if($aspectratio=='false'){echo 'selected';}?>  >false</option>
<option value="true" <?php    if($aspectratio=='true'){echo 'selected';}?>  >true</option>	
</select>
<hr/>
<h5 ><?php   echo t('Generate mobile optimized images')?></h5>
<span class="help-block">(Set to true to generate smaller images for use with mobile devices)</span>
<select name="checkimg"  id="checkimg">
<option value="false" <?php    if($checkimg=='false'){echo 'selected';}?>  >false</option>
<option value="true" <?php    if($checkimg=='true'){echo 'selected';}?>  >true</option>	
</select>
<hr/>
<h5 ><?php   echo t('Enable "Start Slideshow" button')?></h5>
<select name="startss"  id="startss">
<option value="true" <?php    if($startss=='true'){echo 'selected';}?>  >true</option>
<option value="false" <?php    if($startss=='false'){echo 'selected';}?>  >false</option>
	
</select>
<hr/>

<h5 ><?php   echo t('Enable "Toggle Fullscreen" button')?></h5>
<select name="tfull"  id="tfull">
<option value="true" <?php    if($tfull=='true'){echo 'selected';}?>  >true</option>
<option value="false" <?php    if($tfull=='false'){echo 'selected';}?>  >false</option>
	
</select>
<hr/>
<h5 ><?php   echo t('Enable "Download" button')?></h5>
<select name="downloadbtn"  id="downloadbtn">
<option value="true" <?php    if($downloadbtn=='true'){echo 'selected';}?>  >true</option>
<option value="false" <?php    if($downloadbtn=='false'){echo 'selected';}?>  >false</option>
	
</select>
</div>
<div id="tabs-3" class="ccm-pagelistPane" >
<div class="ccm-block-field-group">
<h5><?php  echo t('Enable CDN')?></h5>
<select name="cdnstatus"  id="cdnstatus">
<option value="false" <?php    if($cdnstatus=='false'){echo 'selected';}?>  >false</option>	
<option value="true" <?php    if($cdnstatus=='true'){echo 'selected';}?>  >true</option>	
</select>
</div>

<div class="ccm-block-field-group">
<h5><?php  echo t('CDN URL')?></h5>
<?php   echo $fm->text('cdnurl',$cdnurl)?> 
</div>

</div>
</div>
</div>