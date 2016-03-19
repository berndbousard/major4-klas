import React, {Component} from 'react';

import {Form} from '../components/';
import {basename, setAuthenticated, isAuthenticated, session} from '../globals';
import {checkStatus} from '../util';

import Emitter from '../events/';

export default class Login extends Component {

  static contextTypes = {
    router: React.PropTypes.object.isRequired
  }

  constructor(props, context){
    super(props, context);

    this.state = {

    };

    Emitter.on('login', (email, password) => this.loginHandler(email, password));
    Emitter.on('validLogin', this.onValidLogin);

    // Bernd

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
        </section>
    );
  }
}
