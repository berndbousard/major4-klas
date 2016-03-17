import React from 'react';

export default (props) => {

console.log(props);

  return (
    <tr className="cms-orders-table-data-row">
        <td className="cms-orders-table-data-cell">{props.name}</td>
        <td className="cms-orders-table-data-cell">{props.email}</td>
        <td className="cms-orders-table-data-cell">{props.cardId}</td>
        <td className="cms-orders-table-data-cell">{props.created}</td>
        <td className="cms-orders-table-data-cell cms-orders-table-actions"><span>goedkeuren</span><span>afkeuren</span></td>
    </tr>
  );
};
