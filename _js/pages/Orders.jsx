import React, {Component} from 'react';
import {basename} from '../globals/';
import Emitter from '../events/';

import {OrderItem, NavigationBar} from '../components/';

export default class Orders extends Component {
  constructor(props, context){
    super(props, context);

    // verified 0 = pending, 1 = goedgekeurd, 2 = afgekeurd
    this.state = {
      orders: []
    };

    Emitter.on('change-order', (id, verified) => this.changeOrderHandler(id, verified));
  }

  changeOrderHandler(id, verified){
    // De gebruiker zit de order verdwijnen
    let {orders} = this.state;
    let newOrders = orders.filter((order) => {
      return order.id !== id;
    });
    this.setState({orders: newOrders});

    // de server kant
    // Een order goedkeuren met een bepaald ID en een verified code
    fetch(`${basename}/api/orders/${id}?verified=${verified}`, {
      method: 'PUT'
    })
    .then((response) => {
      return response.json();
    })
    .then(() => {
      console.log('het is gelukt');
    })
    .catch(() => {
      console.log('het is niet gelukt');
    });
  }

  filterClickHandler(e, id){
    e.preventDefault();
    this.fetchOrders(id);
    this.changeCSSClass(e);
  }

  changeCSSClass(e){
    // Alle huidige classes wegdoen
    [...document.querySelectorAll('.cms-filter')].forEach((link) => {
      if(link.classList.contains('activeFilter')){
        link.classList.remove('activeFilter');
      }
    });

    // De huidige active maken
    e.currentTarget.classList.toggle('activeFilter');
  }

  // Alle orders fetchen met een bepaalde ID
  fetchOrders(id){
    fetch(`${basename}/api/orders?verified=${id}`)
    .then((response) => {
      return response.json();
    })
    .then((orders) => {
      this.setState({orders});
    })
    .catch((error) => {
      console.log(error);
    });
  }

  componentDidMount(){
    // Hier worden de standaard orders gefetcht, momenteel zijn het de nieuwe die worden gefetcht.
    this.fetchOrders(0);
  }

  render(){
    let {orders} = this.state;

    return (
        <div className="cms-orders-container">
            <NavigationBar />
            <section className="cms-filters">
                <ul className="cms-filters-list">
                    <li><a className="cms-orders-navitem-link cms-filter" href="api/orders/0" onClick={e => this.filterClickHandler(e, 0)} data-tag="0">nieuwe</a></li>
                    <li><a className="cms-orders-navitem-link cms-filter" href="api/orders/1" onClick={e => this.filterClickHandler(e, 1)} data-tag="1">goedgekeurd</a></li>
                    <li><a className="cms-orders-navitem-link cms-filter" href="api/orders/2" onClick={e => this.filterClickHandler(e, 2)} data-tag="2">afgekeurd</a></li>
                </ul>
            </section>

            <section className="cms-orders">
                <table className="cms-orders-table">
                    <thead>
                        <tr className="cms-orders-table-headers">
                            <th className="cms-orders-table-header">Naam</th>
                            <th className="cms-orders-table-header">Email</th>
                            <th className="cms-orders-table-header">LerarenID</th>
                            <th className="cms-orders-table-header">Datum</th>
                            <th className="cms-orders-table-header">Actie</th>
                        </tr>
                    </thead>

                    <tbody>
                        {orders.map((order, index) => {
                          return <OrderItem {...order} key={index} />;
                        })}
                    </tbody>
                </table>
            </section>
        </div>
    );
  }
}
