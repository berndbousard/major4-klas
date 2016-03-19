import React from 'react';

import Emitter from '../events/';

export default (props) => {

  return (
    <tr className="cms-orders-table-data-row">
      <td className="cms-orders-table-data-cell">{props.name}</td>
      <td className="cms-orders-table-data-cell">{props.email}</td>
      <td className="cms-orders-table-data-cell">{props.cardId}</td>
      <td className="cms-orders-table-data-cell">{props.created}</td>
      <td className="cms-orders-table-data-cell cms-orders-table-actions"><span className="cms-order-button" onClick={() => Emitter.emit('change-order', props.id, 1)}>goedkeuren</span><span className="cms-order-button" onClick={() => Emitter.emit('change-order', props.id, 2)}>afkeuren</span></td>
    </tr>
  );
};
