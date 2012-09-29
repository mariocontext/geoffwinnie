<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
        
    <div id="wrapper">
    
    	<div class="row">
            <div class="col_4">
                <?php  
				$a = new Area('Column One');
				$a->display($c);
				?>
            </div><!-- .col_4 ends -->
            <div class="col_4">
                <?php  
				$a = new Area('Column Two');
				$a->display($c);
				?>
            </div><!-- .col_4 ends -->
            <div class="col_4 omega">
                <?php  
				$a = new Area('Column Three');
				$a->display($c);
				?>
            </div><!-- .col_4 ends -->
        </div><!-- .row ends -->
        
        <hr />
        
        <div class="row">
            <div id="content" class="col_12">
                <?php  
				$a = new Area('Main');
				$a->display($c);
				?>
            </div><!-- #content ends -->
        </div><!-- .row ends -->
    
    </div><!-- #wrapper ends -->
    
<?php  $this->inc('elements/footer.php'); ?>