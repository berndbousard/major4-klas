import React from 'react';
import fetch from 'isomorphic-fetch';
import {checkStatus} from '../util';
import {basename} from '../globals';

import Emitter from '../events/';

export default class App extends React.Component {

  static contextTypes = {
    router: React.PropTypes.object.isRequired
  };

  constructor(props, context) {
    super(props, context);

    // verified 0 = pending, 1 = goedgekeurd, 2 = afgekeurd
    this.state = {
      orders: [
        {
          name: 'kevin bousard',
          email: 'bernd.bousard@gmail.com',
          cardId: '3ZETSDRHGFSEQDZ',
          created: '14 maart 2016',
          verified: 0
        },
        {
          name: 'bernd bousard',
          email: 'bernd.bousard@gmail.com',
          cardId: '3ZETSDRHGFSEQDZ',
          created: '14 maart 2016',
          verified: 0
        }
      ]
    };

    // Event komt van form component
    Emitter.on('login', (email, password) => this.loginHandler(email, password));

    // Event komt van orders pagina
    Emitter.on('fetch-orders', (id) => this.fetchOrders(id));
  }

  loginHandler(email, password){
    // Hier checken of deze user wel bestaat
    fetch(`${basename}/api/login`, {
      method: 'POST',
      body: JSON.stringify({email, password}),
      headers: new Headers({'Content-Type': 'application/json'})
    })
    .then(checkStatus)
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      console.log(response);
      this.succes();
    })
    .catch((error) => {
      // Er is een error gebeurd
      console.log(error);
    });
  }

  succes(){
    this.context.router.push('/orders');
  }

  fetchOrders(id){
    fetch(`${basename}/api/orders/${id}`)
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      this.setState({orders: [response]});
    })
    .catch((error) => {
      console.log(error);
    });
  }

  render() {
    let {orders} = this.state;

    return (
        <div className="container">
            <header className="cms-header-top">
                <img className="cms-header-top-image" src="./assets/svg/logo.svg" alt=""/>
            </header>
            {this.props.children && React.cloneElement(this.props.children, {
              orders: orders
            })}
        </div>
    );
  }
}
