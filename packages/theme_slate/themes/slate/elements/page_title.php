<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); 

<?php  if ($c->getCollectionTypeHandle() == 'blog_entry' || $c->getCollectionTypeHandle() == 'pb_post') { ?>
<h1><?php  echo $parentPage->getCollectionName();?></h1>
<?php  if ($parentPage->getCollectionDescription()) { ?>
<p><?php  echo $parentPage->getCollectionDescription() ?></p>
<?php  } ?>
<?php  } else {?>
<h1><?php  echo $c->getCollectionName() ?></h1>
<?php  if ($c->getCollectionDescription()) { ?>
<p><?php  echo $c->getCollectionDescription() ?></p>
<?php  } ?>
<?php  } ?>