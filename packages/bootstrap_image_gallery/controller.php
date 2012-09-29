<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

class BootstrapImageGalleryPackage extends Package {

     protected $pkgHandle = 'bootstrap_image_gallery';
     protected $appVersionRequired = '5.5.0';
     protected $pkgVersion = '2.1.1.1';

     public function getPackageDescription() {
          return t("An extension to the Modal dialog of Twitter's Bootstrap toolkit, to ease navigation between a set of gallery images.");
     }

     public function getPackageName() {
          return t("Bootstrap Image Gallery");
     }
    
     public function install() {
          $pkg = parent::install(); 
		Loader::model('collection_types');
		BlockType::installBlockTypeFromPackage('bootstrap_image_gallery', $pkg);	
	
	
     }
   
}
?>