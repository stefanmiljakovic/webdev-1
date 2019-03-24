import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import AdvertNavMenu from './Adverts/AdvertNavMenu';
import AdvertMain from './Adverts/AdvertMain';

export default class Example extends Component {
    render() {
        return (
            <div className="row">
                <div className="col-lg-3">
                    <AdvertNavMenu />
                </div>
                <div className="col-lg-9">
                    <AdvertMain />
                </div>
            </div>
        );
    }
}

if (document.getElementById('advert-route')) {
    ReactDOM.render(<Example />, document.getElementById('advert-route'));
}
