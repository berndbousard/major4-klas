import ReactDOM from 'react-dom';
import React from 'react';

import {setAuthenticated, isAuthenticated} from './globals';

import Router from './routers/';

const init = () => {
  // Check of je op de admin pagina zit of niet

  if(document.querySelector('.react-container')){

    initSession();

    ReactDOM.render(
      <Router />,
      document.querySelector('.react-container')
    );
  }
};

const initSession = () => {
  if (isAuthenticated() === null || isAuthenticated() === undefined) {
    setAuthenticated(0);
  }
};
init();
