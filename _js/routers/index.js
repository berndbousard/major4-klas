import React from 'react';
import {Router, Route, IndexRoute, useRouterHistory} from 'react-router';
import {createHistory} from 'history';

import {App, Login, Orders, Participations} from '../pages';
import {basename} from '../globals';

export default () => (
  <Router history={useRouterHistory(createHistory)({basename})}>
      <Route path="/" component={App}>
          <IndexRoute component={Login} />
          <Route path="admin" component={Login} />
          <Route path="admin/orders" component={Orders} />
          <Route path="admin/participations" component={Participations} />
      </Route>
  </Router>
);

