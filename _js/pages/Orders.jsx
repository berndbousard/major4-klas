import React, {Component} from 'react';
import {basename} from '../util/';

import {OrderItem, NavigationBar} from '../components/';

export default class Orders extends Component {
  constructor(props, context){
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
  }

  filterClickHandler(e, id){
    e.preventDefault();

    this.fetchOrders(id);
  }

  // Alle orders fetchen met een bepaalde ID
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
