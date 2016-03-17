import React from 'react';

export default class OnelinerForm extends React.Component {

  constructor(props, context) {
    super(props, context);
  }
  cancelHandler(event) {
    event.preventDefault();
    this.props.cancel();
  }
  submitHandler(event) {
    event.preventDefault();
    let onelinerInput = this.refs.onelinerInput;
    if(onelinerInput.value === '') {
      onelinerInput.focus();
      return;
    }
    let authorInput = this.refs.authorInput;
    if(authorInput.value === '') {
      authorInput.focus();
      return;
    }
    let oneliner = {
      id: this.props.id,
      key: this.props.id || Date.now(),
      author: authorInput.value,
      text: onelinerInput.value
    };
    onelinerInput.value = '';
    authorInput.value = '';
    this.props.submitOneliner(oneliner);
  }
  render() {
    let formLabel = (this.props.mode === 'edit') ? 'Edit Oneliner' : 'Add Oneliner';
    let {text, author} = this.props;
    let buttons;
    if(this.props.mode !== 'edit') {
      buttons = <div className="input-container submit">
        <input type="submit" name="action" value={formLabel} className="form-submit" />
      </div>;
    } else {
      buttons = <div className="input-container submit">
        <button className="form-submit" onClick={e => this.cancelHandler(e)}>Cancel</button>
        <input type="submit" name="action" value={formLabel} className="form-submit" />
      </div>;
    }
    return (
      <section className="page-section onliner-form">
        <header className="page-section-header"><h1>{formLabel}</h1></header>
        <form className="oneliner-form" onSubmit={e => this.submitHandler(e)}>
          <div className="input-container text">
            <label>
              <span className="form-label">Oneliner:</span>
              <textarea name="text" className="form-text" ref="onelinerInput" defaultValue={text}></textarea>
            </label>
          </div>
          <div className="input-container text">
            <label>
              <span className="form-label">By (author):</span>
              <input type="text" name="author" className="form-input" ref="authorInput" defaultValue={author} />
            </label>
          </div>
          {buttons}
        </form>
      </section>
    );
  }
}
