<?php

namespace Nzvvveb\SilverstripeForms;


use SilverStripe\Admin\LeftAndMain;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse;
use SilverStripe\Control\RequestHandler;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Core\Manifest\ClassLoader;
use SilverStripe\Core\Manifest\ModuleResourceLoader;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataList;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Security;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;

class FormDashboard extends LeftAndMain {

	private static $menu_title = "Forms";

	private static $url_segment = "forms";

	private static $menu_priority = 100;

	private static $url_priority = 30;

	// private static $menu_icon = "unclecheese/dashboard:images/dashboard.png";

	private static $tree_class = 'DashboardPanel';

	private static $url_handlers = [
		'panel/$ID' => 'handlePanel',
		'$Action!' => '$Action',
		'' => 'index'
	];

    public function init() {
		parent::init();
		Requirements::javascript("https://draggable.github.io/formeo/assets/js/formeo.min.js");
        Requirements::javascript("_resources/silverstripe-forms/client/form/form.js");
	}

}
