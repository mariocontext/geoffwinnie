<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
        
    <div id="wrapper">
    
    	<?php  $this->inc('elements/pagemeta.php'); ?>
        
        <div class="row">
            
            <div id="content" class="col_12">
                <?php  print $innerContent; ?>
            </div><!-- #content ends -->
        </div><!-- .row ends -->
    
    </div><!-- #wrapper ends -->
    
<?php  $this->inc('elements/footer.php'); ?>