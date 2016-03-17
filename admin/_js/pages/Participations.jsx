import React, {Component} from 'react';

import {NavigationBar} from '../components/';

export default class Participations extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {

    };
  }

  render(){
    return (
        <div className="cms-participations-container">
            <NavigationBar />
            <section className="cms-participations">
            </section>
        </div>
    );
  }
}
