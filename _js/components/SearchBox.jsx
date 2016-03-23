import React, {Component} from 'react';
import Emitter from '../events/';

export default class SearchBox extends Component {
  constructor(props, context){
    super(props, context);

    this.state = {

    };
  }

  submitHandler(e){
    e.preventDefault();

    let {search} = this.refs;

    Emitter.emit('search', search.value);
  }

  render(){
    return (
      <form action="#" method="GET" onSubmit={(e) => this.submitHandler(e)}>
        <input type="text" placeholder="doorzoek de orders" ref="search"/>
        <input type="submit" value="search"/>
      </form>
    );
  }
}
