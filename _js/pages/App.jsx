import React from 'react';
import {setAuthenticated, isAuthenticated, basename} from '../globals/';

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
                <img className="cms-header-top-image" src={`${basename}/assets/svg/logo.svg`} alt="logo boek.be"/>
                <span className={isAuthenticated() === '0' ? 'hide' : 'cms-button-afmelden'} onClick={() => this.onLogOut()}>afmelden</span>
            </header>
            {this.props.children}
        </div>
    );
  }

  onLogOut() {
    setAuthenticated(0);
    fetch(`${basename}/api/logout`,
      {credentials: 'include'}
    );
    this.context.router.push('/admin');
  }
}
