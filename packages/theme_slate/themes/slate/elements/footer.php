<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
    <footer>
    	<div class="row">
            <div class="col_3">
                <?php  
				$a = new Area('Footer');
				$a->display($c);
				?>
            </div><!-- .col_3 ends -->
            <div class="col_3">
                <?php  
				$a = new Area('Footer Column Two');
				$a->display($c);
				?>
            </div><!-- .col_3 ends -->
            <div class="col_3">
                <?php  
				$a = new Area('Footer Column Three');
				$a->display($c);
				?>
            </div><!-- .col_3 ends -->
            <div class="col_3 last">
                <?php  
				$a = new Area('Footer Column Four');
				$a->display($c);
				?>
            </div><!-- .col_3 ends -->
        </div><!-- .row ends -->
        <div class="row">
            <div id="credits" class="col_12 clearboth">
                <p class="left">&copy; <?php  echo date('Y')?> <?php  echo SITE?>. <?php  echo t('All Rights Reserved.')?> <?php  
		$u = new User();
		if ($u->isRegistered()) { ?>
			<span class="sign-in"><?php  echo t('Currently logged in as <span class="user"><b>%s</b></span>.', $u->getUserName())?> <a href="<?php  echo $this->url('/login', 'logout')?>"><?php  echo t('Sign Out')?></a></span>
		<?php   } else { ?>
			<span class="sign-in"><a href="<?php  echo $this->url('/login')?>"><?php  echo t('Login')?></a>.</span>
	<?php   } ?></p>
    			<p class="right"><span class="star"><?php  echo t('Design by')?> <a href="http://www.c5mix.com" title="<?php  echo t('concrete5 themes')?>"><?php  echo t('c5mix')?></a></span> &nbsp; | &nbsp; <span class="settings"><?php  echo t('Powered by')?> <a href="http://www.concrete5.org" title="<?php  echo t('concrete5 CMS') ?>"><?php  echo t('concrete5') ?></a></span></p>
            </div><!-- #credits ends -->
        </div><!-- .row ends -->
    </footer><!-- footer ends -->

</div><!-- #container ends -->

<?php   Loader::element('footer_required'); ?>

</body>
</html>