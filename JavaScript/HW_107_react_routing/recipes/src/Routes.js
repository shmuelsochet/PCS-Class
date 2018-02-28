import React, { Component } from 'react';
import { Switch, Route, Redirect } from 'react-router-dom';
import Recipe from './Recipe';
import RecipeBook from './RecipeBook';


class Test extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <h1>Im a test! {this.props.value}</h1>
        );
    }
}

const theValue = 21;

const Routes = (
    <Switch>
        <Route path="/recipes" component={RecipeBook} />
        <Route path="/recipe/:name" component={Recipe} />
        <Route path="/test" render={() => <Test value={theValue} />} />
        <Redirect exact from="/" to="/recipes" />
        <Route render={() => <div>404</div>} />
    </Switch>
);

export default Routes;