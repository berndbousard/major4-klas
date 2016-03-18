import React, {Component} from 'react';

import Emitter from '../events/';

export default class Form extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {

    };
  }

  submitHandler(event){
    event.preventDefault();

    let email = this.refs['form-email'];
    let password = this.refs['form-password'];

    if(email.value === ''){
      email.focus();
      return;
    }

    if(password.value === ''){
      password.focus();
      return;
    }

    // Wordt geemit naar Login page
    Emitter.emit('login', email.value, password.value);
  }

  render(){
    return (
      <form className="cms-login-form" action="#" method="POST" onSubmit={e => this.submitHandler(e)}>
        <div className="cms-input-wrapper">
          <label className="cms-login-label" htmlFor="email">email</label>
          <input className="cms-login-input" type="text" name="email" id="email" placeholder="email" ref="form-email"/>
        </div>

        <div className="cms-input-wrapper">
          <label className="cms-login-label" htmlFor="password">password</label>
          <input className="cms-login-input" type="password" name="password" id="password" placeholder="wachtwoord" ref="form-password"/>
        </div>

        <input className="cms-login-submit" type="submit" name="submit" value="inloggen" />
      </form>
    );
  }
}
