import React, {Component} from 'react';
import Emitter from '../events/';

import {OrderItem, NavigationBar} from '../components/';

export default class Orders extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {};
  }

  filterClickHandler(e, id){
    e.preventDefault();

    this.fetchById(id);
  }

  fetchById(id){
    Emitter.emit('fetch-orders', id);
  }

  componentDidMount(){
    console.log('orders is gemount');
  }

  render(){
    return (
        <div className="cms-orders-container">
            <NavigationBar />
            <section className="cms-filters">
                <ul className="cms-filters-list">
                    <li><a className="cms-orders-navitem-link" href="api/orders/0" onClick={e => this.filterClickHandler(e, 0)}>nieuwe</a></li>
                    <li><a className="cms-orders-navitem-link" href="api/orders/1" onClick={e => this.filterClickHandler(e, 1)}>goedgekeurd</a></li>
                    <li><a className="cms-orders-navitem-link" href="api/orders/2" onClick={e => this.filterClickHandler(e, 2)}>afgekeurd</a></li>
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
                        {this.props.orders.map((order, index) => {
                          return <OrderItem {...order} key={index} />;
                        })}
                    </tbody>
                </table>
            </section>
        </div>
    );
  }
}
