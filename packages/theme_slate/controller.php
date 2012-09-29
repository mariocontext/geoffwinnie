<?php   

defined('C5_EXECUTE') or die(_("Access Denied."));

class ThemeSlatePackage extends Package {

	protected $pkgHandle = 'theme_slate';
	protected $appVersionRequired = '5.5.1';
	protected $pkgVersion = '1.4';
	
	public function getPackageDescription() {
		return t("A clean, minimal, and mobile-friendly theme with lots of features.");
	}
	
	public function getPackageName() {
		return t("Slate Theme");
	}
	
	public function install() {
		$pkg = parent::install();
		
		PageTheme::add('slate', $pkg);
		
		Loader::model('collection_types');
		Loader::model('collection_attributes');
		
		// install page types
		$pt = CollectionType::getByHandle('two_column');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'two_column';
			$data['ctName'] = t('Two Column');
			$tcpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('three_column');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'three_column';
			$data['ctName'] = t('Three Column');
			$thcpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('four_column');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'four_column';
			$data['ctName'] = t('Four Column');
			$fcpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('one_over_two');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'one_over_two';
			$data['ctName'] = t('One Over Two');
			$ootpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('one_over_three');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'one_over_three';
			$data['ctName'] = t('One Over Three');
			$oothpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('one_over_four');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'one_over_four';
			$data['ctName'] = t('One Over Four');
			$oofpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('two_over_one');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'two_over_one';
			$data['ctName'] = t('Two Over One');
			$toopt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('three_over_one');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'three_over_one';
			$data['ctName'] = t('Three Over One');
			$thoopt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('four_over_one');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'four_over_one';
			$data['ctName'] = t('Four Over One');
			$foopt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('home');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'home';
			$data['ctName'] = t('Home');
			$hpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('left_sidebar');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'left_sidebar';
			$data['ctName'] = t('Left Sidebar');
			$lspt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('right_sidebar');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'right_sidebar';
			$data['ctName'] = t('Right Sidebar');
			$rspt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('full');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'full';
			$data['ctName'] = t('Full Width');
			$fwpt = CollectionType::add($data, $pkg);
		}
		
		$pt = CollectionType::getByHandle('side_main_side');
		if(!is_object($pt)) {
			$data['ctHandle'] = 'side_main_side';
			$data['ctName'] = t('Side Main Side');
			$smspt = CollectionType::add($data, $pkg);
		}
		
		// install page thumbnail attribute
		$ift = AttributeType::getByHandle('image_file');
		$pageThumbAttr=CollectionAttributeKey::getByHandle('thumbnail');
		if( !is_object($pageThumbAttr) )
     	CollectionAttributeKey::add($ift, array('akHandle' => 'thumbnail', 'akName' => t('Page Thumbnail'), 'akIsSearchable' => false));
				
	}
	
}