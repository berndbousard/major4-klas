import React, {Component} from 'react';

import {Form} from '../components/';

export default class Login extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {

    };
  }

  render(){
    return (
        <section className="cms-login">
            <Form />
        </section>
    );
  }
}
