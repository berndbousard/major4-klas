import React, {Component} from 'react';

import {basename} from '../globals/';

import {ParticipationItem} from '../components/';

import {NavigationBar} from '../components/';

export default class Participations extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {
      participations: []
    };
  }

  componentDidMount(){
    fetch(`${basename}/api/participations`)
    .then((response) => {
      return response.json();
    })
    .then((participations) => {
      this.setState({participations});
    })
    .catch(() => {
      console.log('er is een fout gebeurd');
    });
  }

  render(){
    let {participations} = this.state;

    return (
      <div className="cms-participations-container">
          <NavigationBar />
          <section className="cms-participations cms-orders">
              <table className="cms-orders-table">
                  <thead>
                      <tr className="cms-orders-table-headers">
                          <th className="cms-orders-table-header">Docentnaam</th>
                          <th className="cms-orders-table-header">school & klas</th>
                          <th className="cms-orders-table-header">foto</th>
                          <th className="cms-orders-table-header">boekbespreking</th>
                          <th className="cms-orders-table-header">datum</th>
                      </tr>
                  </thead>

                  <tbody>
                      {participations.map((participation, index) => {
                        return <ParticipationItem {...participation} key={index} />;
                      })}
                  </tbody>
              </table>
          </section>
      </div>
    );
  }
}
