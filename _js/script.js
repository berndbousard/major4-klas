import ReactDOM from 'react-dom';
import React from 'react';

import Router from './routers/';

const init = () => {
  // Check of je op de admin pagina zit of niet
  if(document.querySelector('.react-container')){
    ReactDOM.render(
      <Router />,
      document.querySelector('.react-container')
    );
  }
};

init();
