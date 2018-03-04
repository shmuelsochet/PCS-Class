import React, { Component } from 'react';
import RecipeList from './RecipeList';

export default class RecipeBook extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipes: [
                { name: 'Macaroni', instructions: 'Boil water, add macaroni', picture: 'macaroni.jpg' },
                { name: 'Eggs', instructions: 'Boil water, add eggs', picture: 'eggs.jpg' }
            ]
        };
    }

    addRecipe = (recipe) => {
        const recipes = [...this.state.recipes, recipe];
        this.setState({ recipes: recipes });
    }

    render() {
        return (
            <div>
                Im a recipe book
                <RecipeList recipes={this.state.recipes} />
                <hr />
            </div>
        );
    }
}
