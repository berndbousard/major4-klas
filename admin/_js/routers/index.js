import React from 'react';
import {Router, Route, IndexRoute, useRouterHistory} from 'react-router';
import {createHistory} from 'history';

import {App, Login, Orders, Participations} from '../pages';
import {basename} from '../globals';

export default () => (

    // <Route path="oneliners/:id" component={OnelinerDetail} />


    <Router history={useRouterHistory(createHistory)({basename})}>
        <Route path="/" component={App}>
            <IndexRoute component={Login} />
            <Route path="orders" component={Orders} />
            <Route path="participations" component={Participations} />
        </Route>
    </Router>

);

