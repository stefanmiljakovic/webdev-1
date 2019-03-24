import React, { Component } from 'react';
import CategoryFetcher from './Fetcher/CategoryFetcher';
import CategoryTree from './NavMenu/CategoryTree';

export default class AdvertNavMenu extends Component {
    render() {
        return (
            <div className="hello">
                <CategoryTree />
            </div>
        );
    }
}
