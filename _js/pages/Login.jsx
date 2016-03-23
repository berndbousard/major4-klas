import React, {Component} from 'react';
import fetch from 'isomorphic-fetch';

import {Form} from '../components/';
import {basename, setAuthenticated} from '../globals';
import {checkStatus} from '../util';

import Emitter from '../events/';

export default class Login extends Component {

  static contextTypes = {
    router: React.PropTypes.object.isRequired
  }

  constructor(props, context){
    super(props, context);

    this.state = {};

    Emitter.on('login', (email, password) => this.loginHandler(email, password));
    Emitter.on('validLogin', this.onValidLogin);
  }

  loginHandler(email, password){
    // Loading animation
    let loader = document.querySelector('.loader');
    if(loader){
      loader.classList.toggle('hide');
    }

    // Hier checken of deze user wel bestaat
    let body = new FormData();
    body.append('email', email);
    body.append('password', password);

    fetch(`${basename}/api/login`, {
      method: 'POST',
      body,
      'credentials': 'include'
    })
    .then((response) => {
      loader.classList.toggle('hide');
      return response;
    })
    .then(checkStatus)
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      Emitter.emit('validLogin', response);
      this.context.router.push('/admin/orders');
    })
    .catch(() => {
      // Er is een error gebeurd
      console.log('error');
    });
  }

  onValidLogin(){
    setAuthenticated(1);
  }

  render(){
    return (
        <section className="cms-login">
            <Form />
            <div className="loader hide"></div>
        </section>
    );
  }
}
