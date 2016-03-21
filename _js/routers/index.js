import React from 'react';
import {Router, Route, IndexRoute, useRouterHistory} from 'react-router';
import {createHistory} from 'history';

import {App, Login, Orders, Participations} from '../pages';
import {basename, isAuthenticated} from '../globals';

export default () => (
  <Router history={useRouterHistory(createHistory)({basename})}>
      <Route path="/" component={App}>
          <IndexRoute component={Login} />
          <Route path="admin" component={Login} />
          <Route path="admin/orders" component={Orders} onEnter={checkAuthentication} />
          <Route path="admin/participations" component={Participations} onEnter={checkAuthentication}/>
      </Route>
  </Router>
);

const checkAuthentication = (nextState, replace) => {
  if (isAuthenticated() == false) {
    //           current location *1                    , routeTo
    replace('/admin');
  }
};

// *1
//
// type Location = {
//   pathname: Pathname;
//   search: QueryString;
//   query: Query;
//   state: LocationState;
//   action: Action;
//   key: LocationKey;
// };
