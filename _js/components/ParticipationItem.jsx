import React from 'react';

import {basename} from '../globals/';

export default (props) => {
  console.log(props);

  return (
    <tr className="cms-orders-table-data-row">
      <td className="cms-orders-table-data-cell">{props.name}</td>
      <td className="cms-orders-table-data-cell">{props.school} - {props.class}</td>
      <td className="cms-orders-table-data-cell"><img src={`${basename}/uploads/photo/${props.photo}`} /></td>
      <td className="cms-orders-table-data-cell">{props.email}</td>
      <td className="cms-orders-table-data-cell">{props.created}</td>
    </tr>
  );
};
