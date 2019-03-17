import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class RegisterFormGroup extends Component {
    render() {
        this.props.lowerCaseName = this.props.name.toLowerCase();

        return (
            <div className="form-group row">
                <label htmlFor="{this.props.name}" className="col-md-4 col-form-label text-md-right">{this.props.name}</label>

                <div className="col-md-6">
                    <input id="name" type="{this.props.type}"
                           className="form-control {this.additionalClass()}"
                           name="name" value="{this.oldValue()}" {this.requiredArgs()} autoFocus />
                    {this.renderError()}
                </div>
            </div>
        );
    }

    additionalClass() {
        if(this.props.hasError)
            return 'is-invalid';
        return '';
    }

    requiredArgs() {
        if(this.props.required)
            return 'required';
        return '';
    }

    oldValue() {
        if(this.props.oldValue)
            return this.props.oldValue;
        return '';
    }

    renderError() {
        if(this.props.hasError)
            return (
                <span className="invalid-feedback" role="alert">
                    <strong>{this.props.error}</strong>
                </span>
            );
        return '';
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
