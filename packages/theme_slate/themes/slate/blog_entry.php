<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
        
    <div id="wrapper">
    
        <?php  $this->inc('elements/pagemeta.php'); ?>
        
        <div class="row">
            
            <div id="content" class="col_9">
                <h2><?php    echo $c->getCollectionName(); ?></h2>
                <p class="meta"><?php    echo t('Posted by')?> <span class="user"><?php    echo $c->getVersionObject()->getVersionAuthorUserName(); ?></span> on <span class="date"><?php    echo $c->getCollectionDatePublic('F j, Y'); ?></span></p>
                <?php    $as = new Area('Main'); $as->display($c); ?>
                <?php    $a = new Area('Blog Post More'); $a->display($c); ?>
                <?php    $ai = new Area('Blog Post Footer'); $ai->display($c); ?>
            </div><!-- #content ends -->
            
            <div id="sidebar" class="col_3 omega">
            	<?php  
				$as = new Area('Sidebar');
				$as->display($c);
				?>
            </div><!-- #sidebar ends -->
            
        </div><!-- .row ends -->
    
    </div><!-- #wrapper ends -->
    
<?php  $this->inc('elements/footer.php'); ?>