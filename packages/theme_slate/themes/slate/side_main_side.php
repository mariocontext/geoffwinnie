<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
        
    <div id="wrapper">
    
    	<?php  $this->inc('elements/pagemeta.php'); ?>
        
        <div class="row">
        
        	<div id="sidebar" class="col_3">
            	<?php  
				$as = new Area('Sidebar');
				$as->display($c);
				?>
            </div><!-- #sidebar ends -->
            
            <div id="content" class="col_6">
                <?php  
				$a = new Area('Main');
				$a->display($c);
				?>
            </div><!-- #content ends -->
            
            <div id="aside" class="col_3 omega">
            	<?php  
				$a = new Area('Aside');
				$a->display($c);
				?>
            </div><!-- #aside ends -->
            
        </div><!-- .row ends -->
    
    </div><!-- #wrapper ends -->
    
<?php  $this->inc('elements/footer.php'); ?>