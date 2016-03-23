import React, {Component} from 'react';
import {basename} from '../globals/';
import Emitter from '../events/';
import fetch from 'isomorphic-fetch';

import {OrderItem, NavigationBar} from '../components/';

import {checkStatus} from '../util/';

export default class Orders extends Component {

  constructor(props, context){
    super(props, context);

    // verified 0 = pending, 1 = goedgekeurd, 2 = afgekeurd
    this.state = {
      orders: [],
      visibleOrders: [],
      currentTabID: 0
    };

    Emitter.on('change-order', (id, verified) => this.changeOrderHandler(id, verified));
  }

  componentDidMount(){
    this.fetchOrders();
    this.defaultCSSClass();
  }

  // Orders ophalen
  fetchOrders(){
    fetch(`${basename}/api/orders`)
    .then((response) => {
      return response.json();
    })
    .then((orders) => {
      this.state.orders = orders; // geen setState want render is niet nodig.
      this.filterOrders(); // De juiste orders eruit filteren
    })
    .catch((error) => {
      console.log(error);
    });
  }

  filterOrders(verifiedID = this.state.currentTabID){ // Standaard op nieuwe opladen
    let {orders} = this.state;
    // console.log('ik kan er', orders.length, 'filteren');
    let filteredOrders = orders.filter((o) => {
      return parseInt(o.verified) === parseInt(verifiedID);
    });
    // console.log('ik toon er', filteredOrders.length, filteredOrders);
    this.setState({visibleOrders: filteredOrders});
    if(filteredOrders.length === 0){
      this.noOrdersLabel();
    }else{
      let hide = true;
      this.noOrdersLabel(hide);
    }
  }

  filterClickHandler(e, id){
    e.preventDefault();
    this.state.currentTabID = id;
    // this.fetchOrders(); //Toch nog eens fetchen voor allernieuwste results
    this.filterOrders(); //de orders filteren adhv een id
    this.changeCSSClass(e); // de css classen regelen
  }

  changeOrderHandler(id, verifiedID){
    // De gebruiker zit de order verdwijnen
    if(verifiedID !== this.state.currentTabID){ //Niet verwijderen als je op zelfde pagina zit
      let {orders} = this.state;
      let newOrders = orders.map((order) => {
        if(parseInt(order.id) === parseInt(id)){
          order.verified = verifiedID;
        }
        return order;
      });
      this.state.orders = newOrders;
      this.filterOrders();

      // de server kant
      // Een order goedkeuren met een bepaald ID en een verified code
      fetch(`${basename}/api/orders/${id}?verified=${verifiedID}`, {
        method: 'PUT'
      })
      .then(checkStatus)
      .then((response) => {
        return response.json();
      })
      .then((response) => {
        console.log(response);
      })
      .catch((error) => {
        console.log(error);
      });
    }
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

  defaultCSSClass(index = this.state.currentTabID){
    [...document.querySelectorAll('.cms-filter')][index].classList.toggle('activeFilter');
  }

  noOrdersLabel(hide){
    if(hide){ //Als je het label wilt hiden
      let noOrdersLabel = document.querySelector('.noOrdersLabel');
      if(noOrdersLabel){
        noOrdersLabel.classList.add('hide');
      }
      return;
    }

    let noOrdersLabel = document.querySelector('.noOrdersLabel');
    if(noOrdersLabel){
      noOrdersLabel.classList.remove('hide');
    }
    return;
  }

  render(){
    let {visibleOrders} = this.state;

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
                        {visibleOrders.map((order, index) => {
                          return <OrderItem {...order} key={index} />;
                        })}
                    </tbody>
                </table>
                <span className="noOrdersLabel hide">Er zijn geen orders met de gekozen filter gevonden</span>
            </section>
        </div>
    );
  }
}
