import React from 'react';

export default class ComebackItem extends React.Component {

  constructor(props, context) {
    super(props, context);
    this.state = {};
  }

  deleteClicked(e) {
    e.preventDefault();
    this.props.deleteComeback(this.props.id);
  }

  render() {
    let {text, author} = this.props;
    return (
      <li className="comeback">
        <span className="comeback-text">{text}</span>
        <span className="comeback-author">by {author}</span>
        &nbsp;<a href="#" className="action-link" onClick={e => this.deleteClicked(e)}>delete</a>
      </li>
    );
  }

}
