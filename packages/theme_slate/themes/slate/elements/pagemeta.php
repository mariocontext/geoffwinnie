<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); $parentPage = Page::getByID($c->getCollectionParentID()); ?>
        <div id="page-meta">
            <div id="breadcrumbs">
                <?php 
                $bt = BlockType::getByHandle('autonav');
                $bt->controller->displayPages = 'top';
                $bt->controller->orderBy = 'display_asc';                    
                $bt->controller->displaySubPages = 'relevant_breadcrumb';
				$bt->controller->displaySubPageLevels = 'all';
                $bt->render('templates/breadcrumb');
                ?>
            </div><!-- #breadcrumbs ends -->
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
        </div><!-- #page-meta ends -->
