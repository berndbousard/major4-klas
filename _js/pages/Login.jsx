import React, {Component} from 'react';

import {Form} from '../components/';
import {basename, setAuthenticated, isAuthenticated} from '../globals';
import {checkStatus} from '../util';

import Emitter from '../events/';

export default class Login extends Component {

  constructor(props, context){
    super(props, context);


    this.state = {

    };

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
      // waar staat deze functie?
      // Emitter.emit('auth', response);
      console.log('auth before set: ',isAuthenticated());
      setAuthenticated(1);
      console.log('auth after set: ',isAuthenticated());

      // werkt niet als je hierna surft naar de /orders. Ookal is de var bijgewerkt
      // de reden is omdat er "gerefresht" wordt en hierdoor reset die aut variabele
      // terug naar de standaard waarde.
      // How to fix?
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
