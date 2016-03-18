import React from 'react';
// import fetch from 'isomorphic-fetch';

export default class App extends React.Component {

  static contextTypes = {
    router: React.PropTypes.object.isRequired
  };

  constructor(props, context) {
    super(props, context);

    this.state = {};
  }

  succes(){
    this.context.router.push('/orders');
  }

  render() {
    return (
        <div className="container">
            <header className="cms-header-top">
                <img className="cms-header-top-image" src="/assets/svg/logo.svg" alt=""/>
            </header>
            {this.props.children}
        </div>
    );
  }
}
