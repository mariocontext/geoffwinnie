<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
        
    <div id="wrapper">
    
    	<?php  $this->inc('elements/pagemeta.php'); ?>

        <div class="row">
            <div class="col_6">
                <?php  
				$a = new Area('Column One');
				$a->display($c);
				?>
            </div><!-- #col_6 ends -->
            <div class="col_6 omega">
                <?php  
				$a = new Area('Column Two');
				$a->display($c);
				?>
            </div><!-- #col_6 ends -->
        </div><!-- .row ends -->
    
    </div><!-- #wrapper ends -->
    
<?php  $this->inc('elements/footer.php'); ?>