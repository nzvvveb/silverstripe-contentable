<?php

namespace Nzvvveb\SilverstripeForms;

use SilverStripe\Control\Controller;
use SilverStripe\Control\Director;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\UserForms\Control\UserDefinedFormController;
use SilverStripe\UserForms\Form\UserForm;

class BetaFormController extends Controller
{
    private static $allowed_actions = [
        'Form',
        'process',
        'finished'
    ];

    /**
     * @var UserDefinedFormController
     */
    protected $userFormController;

    protected function init()
    {
        parent::init();

        $controller = $this->getUserFormController() ?: UserDefinedFormController::create($this->element);
        $controller->setRequest($this->getRequest());
        $controller->doInit();

        $this->setUserFormController($controller);
    }

    /**
     * @return UserForm
     */
    public function Form()
    {
        return $this->getUserFormController()->Form();
    }

    public function process($data)
    {
        $user = $this->getUserFormController();

        return $user->process($data, $user->Form());
    }

    public function finished()
    {
        $user = $this->getUserFormController();

        $user->finished();

        $page = $this->getPage();
        $controller = Injector::inst()->create($page->getControllerName());

        return $controller->customise([
            'Content' => 'Hi there thanks for your submission',
        ]);
    }

    /**
     * @param string $action
     *
     * @return string
     */
    public function Link($action = null)
    {
        $segment = Controller::join_links('betaform', $id, $action);
        $page = Director::get_current_page();

        if ($page) {
            return $page->Link($segment);
        }

        if ($controller = $this->getParentController()) {
            return $controller->Link($segment);
        }

        return $segment;
    }

    /**
     * Return the associated UserDefinedFormController
     *
     * @return UserDefinedFormController
     */
    public function getUserFormController()
    {
        return $this->userFormController;
    }

    /**
     * Set the associated UserDefinedFormController
     *
     * @param UserDefinedFormController $controller
     * @return $this
     */
    public function setUserFormController(UserDefinedFormController $controller)
    {
        $this->userFormController = $controller;
        return $this;
    }
}
