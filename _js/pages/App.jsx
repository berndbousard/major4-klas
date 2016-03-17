import React from 'react';
// import {Link} from 'react-router';
import fetch from 'isomorphic-fetch';
import {checkStatus} from '../util';
import {basename} from '../globals';

import Emitter from '../events/';

// import {find, filter} from 'lodash';

export default class App extends React.Component {
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
        Emitter.on('login', (content) => this.loginHandler(email.value, password.value));

        // Event komt van orders pagina
        Emitter.on('fetch-orders', (id) => this.fetchOrders(id));
    }

    loginHandler(email, password){
        // Hier checken of deze user wel bestaat
        fetch(`${basename}/api/login`, {
            method: 'POST',
            body: JSON.stringify({email: email, password: password}),
            header: new Headers({'Content-type': 'application/json'})
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

    fetchOrders(id){
        console.log(`${basename}/api/orders/${id}`);
        fetch(`${basename}/api/orders/${id}`)
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                this.setState({orders: [response]});
            })
    }

  componentDidMount(){
    // fetch(`${basename}/api/oneliners`)
    //   .then(checkStatus)
    //   .then(r => r.json())
    //   .then(data => {
    //     //add key properties
    //     data.forEach(o => o.key = o.id);
    //     this.setState({oneliners: data, onelinersFetched: true});
    //   })
    //   .catch(() => {
    //     console.error('failed to get oneliners');
    //   });
  }
  // addOneliner(oneliner) {
  //   let oneliners = this.state.oneliners.concat();
  //   oneliners.push(oneliner);
  //   this.setState({oneliners});
  //   //post to the api
  //   fetch(`${basename}/api/oneliners`, {
  //     method: 'POST',
  //     body: JSON.stringify(oneliner),
  //     headers: new Headers({'Content-Type': 'application/json'})
  //   })
  //     .then(checkStatus)
  //     .then(r => r.json())
  //     .then(data => {
  //       //update the oneliner in the state
  //       let existingOneliner = find(this.state.oneliners, o => {
  //         return o.key === oneliner.key;
  //       });
  //       if(existingOneliner) {
  //         existingOneliner.id = data.id;
  //         this.setState({oneliners: this.state.oneliners.concat()});
  //       }
  //     })
  //     .catch(() => {
  //       console.error('failed to add oneliner');
  //     });
  // }
  // editOneliner(oneliner) {
  //   let oneliners = this.state.oneliners.concat();
  //   let existingOneliner = find(oneliners, o => o.id === oneliner.id);
  //   if(!existingOneliner) {
  //     return;
  //   }
  //   existingOneliner.text = oneliner.text;
  //   existingOneliner.author = oneliner.author;
  //   //post to the api
  //   fetch(`${basename}/api/oneliners`, {
  //     method: 'PUT',
  //     body: JSON.stringify(existingOneliner),
  //     headers: new Headers({'Content-Type': 'application/json'})
  //   })
  //     .then(checkStatus)
  //     .then(r => r.json())
  //     .then(data => {
  //       console.log('update complete');
  //       console.log(data);
  //     })
  //     .catch(() => {
  //       console.error('failed to update oneliner');
  //     });
  //   this.setState({oneliners});
  // }
  // deleteOneliner(onelinerId) {
  //   let oneliners = filter(this.state.oneliners, o => o.id !== onelinerId);
  //   this.setState({oneliners});
  //   //delete with api
  //   fetch(`${basename}/api/oneliners/${onelinerId}`, {
  //     method: 'DELETE'
  //   })
  //     .then(checkStatus)
  //     .then(r => r.json())
  //     .then(data => {
  //       console.log(data);
  //     })
  //     .catch(() => {
  //       console.error('failed to delete oneliner');
  //     });
  // }
  // deleteComeback(comebackId) {
  //   let oneliners = this.state.oneliners.concat();
  //   oneliners.forEach(oneliner => {
  //     oneliner.comebacks = filter(oneliner.comebacks, o => o.id !== comebackId);
  //   });
  //   this.setState({oneliners});
  //   fetch(`${basename}/api/comebacks/${comebackId}`, {
  //     method: 'DELETE'
  //   })
  //     .then(checkStatus)
  //     .then(r => r.json())
  //     .then(data => {
  //       console.log(data);
  //     })
  //     .catch(() => {
  //       console.error('failed to delete comeback');
  //     });
  // }
  // addComeback(comeback) {
  //   //post to the api
  //   fetch(`${basename}/api/comebacks`, {
  //     method: 'POST',
  //     body: JSON.stringify(comeback),
  //     headers: new Headers({'Content-Type': 'application/json'})
  //   })
  //     .then(checkStatus)
  //     .then(r => r.json())
  //     .then(data => {
  //       //add this comeback to the oneliner
  //       let existingOneliner = find(this.state.oneliners, o => o.id === data.oneliner_id);
  //       if(existingOneliner) {
  //         data.key = data.id;
  //         existingOneliner.comebacks = existingOneliner.comebacks || [];
  //         existingOneliner.comebacks.push(data);
  //         this.setState({oneliners: this.state.oneliners.concat()});
  //       }
  //     })
  //     .catch(() => {
  //       console.error('failed to add comeback');
  //     });
  // }
  // fetchComebacksForOneliner(onelinerId) {
  //   fetch(`${basename}/api/comebacks?oneliner_id=${onelinerId}`)
  //     .then(checkStatus)
  //     .then(r => r.json())
  //     .then(data => {
  //       //set these comebacks as the comebacks for the oneliner
  //       let existingOneliner = find(this.state.oneliners, o => {
  //         return o.id === onelinerId;
  //       });
  //       if(existingOneliner) {
  //         data.forEach(comeback => comeback.key = comeback.id);
  //         existingOneliner.comebacks = data;
  //         existingOneliner.comebacksFetched = true;
  //         this.setState({oneliners: this.state.oneliners.concat()});
  //       }
  //     })
  //     .catch(() => {
  //       console.error('failed to get comebacks for oneliner');
  //     });
  // }
  render() {
    // let {oneliners, onelinersFetched} = this.state;

    // <div className='site-container'>
    //     <header><h1 className='site-header'><Link to={'/'}>Onelinr</Link></h1></header>
    //     {this.props.children && React.cloneElement(this.props.children, {
    //       oneliners: oneliners,
    //       onelinersFetched: onelinersFetched,
    //       addOneliner: o => this.addOneliner(o),
    //       editOneliner: o => this.editOneliner(o),
    //       deleteOneliner: o => this.deleteOneliner(o),
    //       addComeback: o => this.addComeback(o),
    //       deleteComeback: o => this.deleteComeback(o),
    //       fetchComebacksForOneliner: o => this.fetchComebacksForOneliner(o)
    //     })}
    //   </div>

    console.log(this.state);
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
