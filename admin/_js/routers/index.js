import React from 'react';
import {Router, Route, IndexRoute, useRouterHistory} from 'react-router';
import {createHistory} from 'history';

import {App} from '../pages';
import {basename} from '../globals';

export default () => (

    // <Route path="oneliners/:id" component={OnelinerDetail} />

    <Router history={useRouterHistory(createHistory)({basename})}>
        <Route path="/" component={App}>
        <IndexRoute component={App} />
    </Route>

    </Router>

);

