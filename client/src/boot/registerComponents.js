import Injector from 'lib/Injector';

import CreateFormBuilder from '../components/formbuilder';

export default () => {
  Injector.component.register('CreateFormBuilder', CreateFormBuilder);
    // List your React components here so Injector is aware of them
};
