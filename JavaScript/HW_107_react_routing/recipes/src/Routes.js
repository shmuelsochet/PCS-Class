import React from 'react';
import { Switch, Route, Redirect } from 'react-router-dom';
import RecipeBook from './RecipeBook';
import AddRecipe from './AddRecipe';

const Routes = (
    <Switch>
        <Route path="/recipes" component={RecipeBook} />
        <Route path="/addrecipe" component={AddRecipe} />
        <Redirect exact from="/" to="/recipes" />
        <Route render={() => <div>404</div>} />
    </Switch>
);

export default Routes;