import React, { Component } from 'react';
import CategoryModel from '../Model/CategoryModel';
import CategoryFetcher from '../Fetcher/CategoryFetcher';
import CategoryInstance from './Tree/CategoryInstance';

export default class CategoryTree extends Component {

    render() {
        return(
            <div className="category-tree">{this.items}</div>
        );
    }

    componentWillMount() {
        this.items = null;
        this.fetcher = new CategoryFetcher();
        console.log(this.fetcher);
        this.fetcher.promise.then(() => {this.updateData(); console.log(this.fetcher)});
    }

    updateData() {
        this.items = [];
        this.fetcher.container.forEach((item) => {
            this.items.push(
                <CategoryInstance key={item.getId()}
                                  model={item} />
            )
        });

        console.log(this.items);

        this.forceUpdate();
    }

}