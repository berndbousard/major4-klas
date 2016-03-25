import ReactDOM from 'react-dom';
import React from 'react';

import {setAuthenticated, isAuthenticated} from './globals';

import Router from './routers/';


import initScroll from './modules/smoothScroll';
import initTabs from './modules/formTabs';
import initFileInputEnhancement from './modules/fileInputEnhancement';

const init = () => {
  // Check of je op de admin pagina zit of niet

  if(document.querySelector('.react-container')){

    initSession();

    ReactDOM.render(
      <Router />,
      document.querySelector('.react-container')
    );
  }

  if(document.querySelector('.home')){
    initWebsite();
  }
};

const initSession = () => {
  if (isAuthenticated() === null || isAuthenticated() === undefined) {
    setAuthenticated(0);
  }
};

const initWebsite = () => {
  initJSPerfections();
};

const initJSPerfections = () => {
  // progressive enhancement shizzle
  initTabs();
  initScroll('.scroll-link');
  initFileInputEnhancement('.file-input', '.file-input-replacement');
};

init();
