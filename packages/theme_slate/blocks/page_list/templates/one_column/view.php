<?php  
	defined('C5_EXECUTE') or die("Access Denied.");
	$textHelper = Loader::helper("text"); 
	$ih = Loader::helper('slate_image', 'theme_slate');
	// now that we're in the specialized content file for this block type, 
	// we'll include this block type's class, and pass the block to it, and get
	// the content
	
	if (count($cArray) > 0) { ?>
<div class="ccm-page-list-one-col">
	<?php  
	for ($i = 0; $i < count($cArray); $i++ ) {
		$cobj = $cArray[$i]; 
		$target = $cobj->getAttribute('nav_target');
		$tags = $cobj->getAttribute('tags');
		$date = $cobj->getCollectionDatePublic('F j, Y');
		$img = $cobj->getAttribute('thumbnail');
		$thumb = $ih->getThumbnail($img, 665, 250, array('crop' => true, 'quality'=>90));
		$title = $cobj->getCollectionName(); ?>
	
	<div class="row">
    	<div class="col_8">
    		<?php  if ($cobj->getAttribute('thumbnail')) { ?><a href="<?php  echo ($img->getVersion()->getRelativePath()); ?>" rel="fancybox<?php  echo $bID?>" title="<?php  echo $title?>"><img class="ccm-page-list-thumbnail" src="<?php  echo $thumb->src; ?>" width="<?php  echo $thumb->width; ?>" height="<?php  echo $thumb->height; ?>" alt="<?php  echo $title?>" /></a><?php   } ?>
        </div><!-- .col_8 ends -->
        <div class="col_4 omega">
        	<h3 class="ccm-page-list-title"><a <?php   if ($target != '') { ?> target="<?php  echo $target?>" <?php   } ?> href="<?php  echo $nh->getLinkToCollection($cobj)?>"><?php  echo $title?></a></h3>
            <p class="meta"><span class="date"><?php  echo $date; ?></span><?php  if ($tags) {?> <span class="ccm-autonav-breadcrumb-sep">//</span> 
            <span class="tags"><?php  echo t('Tags: ')?> <?php  echo $tags?></span>
            <?php   } ?></p>
        	<p class="ccm-page-list-description">
				<?php  
                if(!$controller->truncateSummaries){
                    echo $cobj->getCollectionDescription();
                }else{
                    echo $textHelper->shorten($cobj->getCollectionDescription(),$controller->truncateChars);
                }
                ?>
        	</p>
            <a class="ccm-page-list-link" <?php   if ($target != '') { ?> target="<?php  echo $target?>" <?php   } ?> href="<?php  echo $nh->getLinkToCollection($cobj)?>"><?php  echo t('Read More &rarr;')?></a>
    	</div><!-- .col_4 ends -->
	</div><!-- .row ends -->
<?php    } 
	if(!$previewMode && $controller->rss) { 
			$btID = $b->getBlockTypeID();
			$bt = BlockType::getByID($btID);
			$uh = Loader::helper('concrete/urls');
			$rssUrl = $controller->getRssUrl($b);
			?>
			<div class="ccm-page-list-rss-icon">
				<a href="<?php  echo $rssUrl?>" target="_blank"><img src="<?php  echo $uh->getBlockTypeAssetsURL($bt, 'rss.png')?>" width="14" height="14" /></a>
			</div>
			<link href="<?php  echo BASE_URL . $rssUrl?>" rel="alternate" type="application/rss+xml" title="<?php  echo $controller->rssTitle?>" />
		<?php   
	} 
	?>
</div><!-- .ccm-page-list-one-col ends -->
<?php   } 
	
	if ($paginate && $num > 0 && is_object($pl)) {
		$pl->displayPaging();
	}
	
?>