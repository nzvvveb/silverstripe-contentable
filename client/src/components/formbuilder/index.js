import React from 'react';

import { FormBuilder } from 'cb-react-forms';


const submit = (data) => {
  document.getElementById('Form_ItemEditForm_Schema').value = data;
  document.getElementById('FormBuilder_Message').innerHTML = 'Exported ready to save';

  setTimeout(() => { document.getElementById('FormBuilder_Message').innerHTML = ''; }, 10000);
};

const items = [
  {
    key: 'TextInput',
    name: 'Text Input',
    icon: 'fa fa-font'
  },
  {
    key: 'TextArea',
    name: 'Multi-line Input',
    icon: 'fa fa-text-height'
  },
  {
    key: 'Dropdown',
    name: 'Dropdown',
    icon: 'fa fa-caret-square-o-down'
  },
  {
    key: 'Checkboxes',
    name: 'Checkboxes',
    icon: 'fa fa-check-square-o'
  },
  {
    key: 'RadioButtons',
    name: 'Multiple Choice',
    icon: 'fa fa-dot-circle-o'
  },
  {
    key: 'NumberInput',
    name: 'Number Input',
    icon: 'fa fa-plus'
  },
  {
    key: 'Date',
    name: 'Date',
    icon: 'fa fa-calendar'
  },
  {
    key: 'Email',
    name: 'Email',
    icon: 'fa fa-at'
  },
];

const CreateFormBuilder = () => (
  <div>
    <FormBuilder items={items} onSubmit={data => submit(data)} />
  </div>
);

export default CreateFormBuilder;
