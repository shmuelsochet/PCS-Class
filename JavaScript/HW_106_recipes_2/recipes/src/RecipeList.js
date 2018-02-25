import React, { Component } from 'react';
import Recipe from './Recipe';
import PropTypes from 'prop-types';

export default class RecipeList extends Component {
    constructor(props) {
        super(props);
        this.state = {};
        //this.selectRecipe = this.selectRecipe.bind(this);
    }

    selectRecipe(recipe) {
        this.setState({ selectedRecipe: recipe })
    }


    render() {

        const recipes = this.props.recipes.map(recipe => (
            <li key={recipe.name} onClick={this.selectRecipe.bind(this, recipe)}>
                {recipe.name}
            </li>
        ));
        const selectedRecipe = this.state.selectedRecipe ? <Recipe recipe={this.state.selectedRecipe} /> : null;



        return (
            <div>
                <ul>
                    {recipes}
                </ul>
                <div>
                    {selectedRecipe}
                </div>
            </div>
        );
    }
}

RecipeList.propTypes = {
    recipes: PropTypes.array,
};
