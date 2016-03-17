import React from 'react';

export default class AddComebackForm extends React.Component {

  static propTypes = {
    onelinerId: React.PropTypes.number.isRequired
  };

  constructor(props, context) {
    super(props, context);
  }
  submitHandler(event) {
    event.preventDefault();
    let textInput = this.refs.textInput;
    if(textInput.value === '') {
      textInput.focus();
      return;
    }
    let authorInput = this.refs.authorInput;
    if(authorInput.value === '') {
      authorInput.focus();
      return;
    }
    let comeback = {
      key: Date.now(),
      onelinerId: this.props.onelinerId,
      author: authorInput.value,
      text: textInput.value
    };
    textInput.value = '';
    authorInput.value = '';
    this.props.addComeback(comeback);
  }
  render() {
    return (
      <section className="page-section onliner-form">
        <header className="page-section-header"><h1>Add Comeback</h1></header>
        <form className="comeback-form" onSubmit={e => this.submitHandler(e)}>
          <div className="input-container text">
            <label>
              <span className="form-label">Comeback:</span>
              <textarea name="text" className="form-text" ref="textInput"></textarea>
            </label>
          </div>
          <div className="input-container text">
            <label>
              <span className="form-label">By (your name):</span>
              <input type="text" name="author" className="form-input" ref="authorInput" />
            </label>
          </div>
          <div className="input-container submit">
            <input type="submit" name="action" value="Add Comeback" className="form-submit" />
          </div>
        </form>
      </section>
    );
  }
}
