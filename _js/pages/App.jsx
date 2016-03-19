import React, {Component} from 'react';

import Emitter from '../events/';

import {setAuthenticated} from '../globals/';
// import fetch from 'isomorphic-fetch';

export default class App extends React.Component {

  static contextTypes = {
    router: React.PropTypes.object.isRequired
  };

  constructor(props, context) {
    super(props, context);

    this.state = {};

    // Emitter.on('log-out', this.onLogOut);
  }

  render() {
    return (
        <div className="container">
            <header className="cms-header-top">
                <img className="cms-header-top-image" src="/assets/svg/logo.svg" alt="logo boek.be"/>
                <span className="cms-button-afmelden" onClick={() => Emitter.emit('log-out')}>afmelden</span>
            </header>
            {this.props.children}
        </div>
    );
  }

  onLogOut() {
    setAuthenticated(0);
    console.log(this.context);
    this.context.router.push('/admin');
  }
}
