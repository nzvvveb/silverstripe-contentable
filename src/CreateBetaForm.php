<?php

namespace Nzvvveb\SilverstripeForms;

use SilverStripe\Dev\Debug;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\UserForms\Model\EditableFormField\EditableTextField;

class CreateBetaForm extends DataObject
{
    private static $table_name = 'CreateBetaForm';

    private static $db = [
        'Schema'    => 'Varchar',
    ];

    private static $has_one = [
        'BetaForm' => BetaForm::class,
    ];

    function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // $fields->removeFieldFromTab('Root.Main', 'BetaFormID');

        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create('BetaFormID'),
                BetaFormField::create('Schema')
            ]
        );

        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        if (!$this->BetaFormID && $this->Schema !== '') {
            $field = EditableTextField::create();
            $field->title = 'hello from form builder';
            $field->write();

            $form = BetaForm::create();
            $form->Fields()->add($field);
            $form->write();

            // Debug::show($form->Fields());
            $this->BetaFormID = $form->ID;
        };
    }


}
