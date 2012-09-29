<?php  
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

    <div id="wrapper">
    
        <?php  $this->inc('elements/pagemeta.php'); ?>
        
        <div class="row">
            
            <div id="content" class="col_9">
                <?php   
					$a = new Area('Main');
					$a->display($c);
				?>
				<?php   
				if($showTrackback>0){
					$a = new Area('Blog Post Trackback');
					$a->display($c);
				}
				?>
				<?php   
				if($showComments>0){
					$a = new Area('Blog Post More');
					$a->display($c);
				}
				?>
				<?php   
					$a = new Area('Blog Post Footer');
					$a->display($c);
				?>
            </div><!-- #content ends -->
            
            <div id="sidebar" class="col_3 omega">
            	<?php  
				$as = new Area('Sidebar');
				$as->display($c);
				?>
            </div><!-- #sidebar ends -->
            
        </div><!-- .row ends -->
    
    </div><!-- #wrapper ends -->

<?php   $this->inc('elements/footer.php'); ?>