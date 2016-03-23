import React from 'react';
import {basename} from '../globals/';

import Emitter from '../events/';

export default (props) => {
  console.log(props.verified);
  return (
    <tr className="cms-orders-table-data-row">
      <td className="cms-orders-table-data-cell">{props.name}</td>
      <td className="cms-orders-table-data-cell">{props.email}</td>
      <td className="cms-orders-table-data-cell">{props.cardId}</td>
      <td className="cms-orders-table-data-cell">{props.created}</td>
      <td className="cms-orders-table-data-cell cms-orders-table-actions">
        <img className="cms-orders-table-action" src={`${basename}/assets/svg/accept.svg`} alt="" onClick={() => Emitter.emit('change-order', props.id, 1)}/>
        <img className="cms-orders-table-action" src={`${basename}/assets/svg/delete.svg`} alt="" onClick={() => Emitter.emit('change-order', props.id, 2)}/>
      </td>
    </tr>
  );
};
