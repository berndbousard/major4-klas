import React, {Component} from 'react';

import {Form} from '../components/';
import {basename, isAuthenticated} from '../globals';
import {checkStatus} from '../util';

import Emitter from '../events/';

export default class Login extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {

    };

    console.log(isAuthenticated());

    Emitter.on('login', (email, password) => this.loginHandler(email, password));
  }

  loginHandler(email, password){
    // Hier checken of deze user wel bestaat

    let body = new FormData();
    body.append('email', email);
    body.append('password', password);

    fetch(`${basename}/api/login`, {
      method: 'POST',
      body
    })
    .then(checkStatus)
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      console.log('gelukt');
      Emitter.emit('auth', response);
    })
    .catch(() => {
      // Er is een error gebeurd
      console.log('error');
    });
  }

  render(){
    return (
        <section className="cms-login">
            <Form />
        </section>
    );
  }
}
