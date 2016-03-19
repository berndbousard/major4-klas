import React from 'react';

import {setAuthenticated} from '../globals/';
// import fetch from 'isomorphic-fetch';

export default class App extends React.Component {

  static contextTypes = {
    router: React.PropTypes.object.isRequired
  };

  constructor(props, context) {
    super(props, context);

    this.state = {};
  }

  render() {
    return (
        <div className="container">
            <header className="cms-header-top">
                <img className="cms-header-top-image" src="/assets/svg/logo.svg" alt="logo boek.be"/>
                <span className="cms-button-afmelden" onClick={() => this.onLogOut()}>afmelden</span>
            </header>
            {this.props.children}
        </div>
    );
  }

  onLogOut() {
    console.log('logout');
    setAuthenticated(0);
    this.context.router.push('/admin');
  }
}
