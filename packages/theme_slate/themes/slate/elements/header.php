<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<!doctype html>  
<!--[if lt IE 7 ]> <html lang="<?php  echo LANGUAGE?>" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="<?php  echo LANGUAGE?>" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="<?php  echo LANGUAGE?>" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="<?php  echo LANGUAGE?>" class="no-js ie9"> <![endif]-->   
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="<?php  echo LANGUAGE?>" class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Lato:400,700" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/columnal.css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getStyleSheet('typography.css')?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getStyleSheet('main.css')?>" />

<!-- Skins -->
<!--<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/skins/minimal/minimal.css" />-->
<!--<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/skins/minimal-dark/minimal-dark.css" />-->
<!--<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/skins/minimal-grunge/minimal-grunge.css" />-->

<!-- Fixes for IE -->
<!--[if lt IE 9]>
<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/ie.css" />
<![endif]-->
<!-- use "fixed-984px-ie.css" or "fixed-960px-ie.css for a 984px or 960px fixed width for IE6 and 7 -->
<!--[if lte IE 7]>
<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/fixed-984px-ie.css" />
<![endif]-->

<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/mobile.css" />

<?php   Loader::element('header_required'); ?>

<script type="text/javascript" src="<?php  echo $this->getThemePath(); ?>/js/superfish.js"></script>

<!-- FancyBox -->
<script type="text/javascript" src="<?php  echo $this->getThemePath(); ?>/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php  echo $this->getThemePath(); ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="<?php  echo $this->getThemePath(); ?>/js/fancybox/jquery.fancybox-1.3.4.css" />

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="<?php  echo $this->getThemePath(); ?>/js/functions.js"></script>

</head>

<body id="<?php  echo $c->getCollectionTypeHandle() ?>" class="page<?php  echo $c->getCollectionID() ?>" <?php 
global $cp;
if (is_object($cp) && ($cp->canWrite() || $cp->canAddSubContent() || $cp->canAdminPage())) {
	echo ' style="margin:70px 2% 2% !important;"';
}
?>>

<div id="container">

	<header>
    	<div id="logo">
            <?php  $stack = Stack::getByName('Site Name');?>
            <a <?php  if ( !($stack) ) { ?>id="logo-text"<?php  } ?> href="<?php  echo DIR_REL?>/" title="<?php  echo SITE?>"><?php  if($stack) $stack->display(); else echo SITE;?></a>
        </div><!-- #logo ends -->
        <div id="header-area">
        	<?php  
			$a = new Area('Header Top');
			$a->display($c);
			?>
        </div><!-- #header-area ends -->
    </header><!-- header ends -->
    
    <nav>
    	<?php 
		$bt = BlockType::getByHandle('autonav');
		$bt->controller->displayPages = 'top';
		$bt->controller->orderBy = 'display_asc';                    
		$bt->controller->displaySubPages = 'all'; 
		$bt->controller->displaySubPageLevels = 'all';
		$bt->render('templates/slate_main_nav');
		?>
        <div class="clearboth">&nbsp;</div>
    </nav><!-- nav ends -->
    
    <div id="feature">
        <?php  
		$a = new Area('Header');
		$a->display($c);
		?>
        <?php  if ($a->getTotalBlocksInArea('Header') > 0) { ?><div class="has-content"></div><?php  } ?>
    </div><!-- #feature ends -->