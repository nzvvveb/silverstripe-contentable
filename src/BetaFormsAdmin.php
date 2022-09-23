<?php

namespace Nzvvveb\SilverstripeForms;

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\View\Requirements;
use \App\CreateBetaForm;

class BetaFormAdmin extends ModelAdmin
{

    private static $menu_title = "Forms";

	private static $url_segment = "forms";

	private static $menu_priority = 100;

	private static $url_priority = 30;

    private static $managed_models = [
        CreateBetaForm::class
    ];

    public function init() {
		parent::init();
        Requirements::javascript("_resources/silverstripe-forms/client/dist/js/bundle.js");
	}

}
