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
  initFormValidater();
};

const initFormValidater = () => {
  let inputs = document.querySelectorAll('input');
  [...inputs].forEach((input) => {
    input.addEventListener('change', (e) => validateNotEmpty(e));
  });
};

const validateNotEmpty = (e) => {
  // console.log(e.srcElement.value);
  if(e.srcElement.value !== ''){
    e.srcElement.classList.add('good');
    e.srcElement.parentNode.querySelector('.file-input-replacement').classList.add('good');
    if(e.srcElement.parentNode.querySelector('.php-error')){
      e.srcElement.parentNode.querySelector('.php-error').classList.add('hide');
    }
  }else{
    e.srcElement.classList.remove('good');
    e.srcElement.parentNode.querySelector('.file-input-replacement').classList.remove('good');
    if(e.srcElement.parentNode.querySelector('.php-error')){
      e.srcElement.parentNode.querySelector('.php-error').classList.remove('hide');
    }
  }
};

init();
