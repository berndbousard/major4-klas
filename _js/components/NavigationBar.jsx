import React from 'react';
import {Link} from 'react-router';

export default () => {
  return (
    <nav className="cms-orders-nav">
        <ul className="cms-orders-navitems">
            <li className="cms-orders-navitem">
                <Link className="cms-orders-navitem-link" to="/admin/orders">bestellingen bekijken</Link>
            </li>

            <li className="cms-orders-navitem">
                <Link className="cms-orders-navitem-link" to="/admin/participations">inzendingen bekijken</Link>
            </li>
        </ul>
    </nav>
  );
};
