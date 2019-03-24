import React, { Component } from 'react';
import CategoryModel from '../../Model/CategoryModel';

export default class CategoryInstance extends Component {

    constructor(props){
        super(props);

        this.toggleClass = this.toggleClass.bind(this);
        this.state = {
            /** @type CategoryModel **/
            model: this.props.model
        };
    }

    toggleClass() {

        let currentModel = this.state.model;
        currentModel.setDropped(!currentModel.getDropped());

        this.setState({
            model: currentModel
        });
    }

    render() {
        this.list = this.list ? this.list : '';

        return (
            <div className="category-item">
                <input type="checkbox" value={this.state.model.selected} />
                <li onClick={() => this.toggleClass()}
                    itemID={this.state.model.getId()}
                    className={this.state.model.getDropped() ? 'dropped' : ''}>
                        {this.state.model.getName()}
                </li>
                    {this.list}
            </div>
        )
    }

    generateList() {
        if(this.childrenRendered && this.childrenRendered.length > 0) {
            console.log(this.childrenRendered);
            return (
                <ul parent={this.state.model.getId()}>
                    {this.childrenRendered}
                </ul>
            );
        }

        return '';
    }

    componentWillMount() {
        this.children();
        this.list = this.generateList();
    }

    children() {
        this.childrenRendered = [];
        this.state.model.getChildren().forEach((item) => {
            this.childrenRendered.push(
              <CategoryInstance key={item.getId()} model={item}/>
            );
        });

        console.log(this.childrenRendered);

        this.forceUpdate();
    }
}