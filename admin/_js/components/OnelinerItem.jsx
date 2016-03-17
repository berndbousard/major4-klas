import React from 'react';
import {Link} from 'react-router';

import {OnelinerForm} from '.';

export default class OnelinerItem extends React.Component {

  constructor(props, context) {
    super(props, context);
    this.state = {};
  }

  editClicked(e) {
    e.preventDefault();
    this.setState({edit: true});
  }

  submitOneliner(o) {
    this.props.editOneliner(o);
    this.setState({edit: false});
  }

  deleteClicked(e) {
    e.preventDefault();
    this.props.deleteOneliner(this.props.id);
  }

  render() {
    let {id, text, author} = this.props;
    let {edit=false} = this.state;

    if(edit) {
      return (
        <li className="oneliner">
          <OnelinerForm {...this.props} mode="edit" submitOneliner={o => this.submitOneliner(o)} cancel={() => this.setState({edit: false})} />
        </li>
      );
    }
    return (
      <li className="oneliner">
        <Link to={`/oneliners/${id}`}>
          <span className="oneliner-text">{text}</span>
        </Link>
        <span className="oneliner-author">by {author}</span>
        &nbsp;<a href="#" className="action-link" onClick={e => this.editClicked(e)}>edit</a>
        &nbsp;<a href="#" className="action-link" onClick={e => this.deleteClicked(e)}>delete</a>
      </li>
    );
  }

}
