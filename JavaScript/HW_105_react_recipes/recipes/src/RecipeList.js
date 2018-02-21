import React, { Component } from 'react';
import Recipe from './Recipe';

export default class RecipeList extends Component {
    constructor(props) {
        super(props);
        this.state = { selectedRecipe: '' }
    }

    recipes = [
        { name: 'bread', instructions: 'kneed water and flour' },
        { name: 'eggs', instructions: 'crack eggs, add salt' },
        { name: 'tuna', instructions: 'open can add mayo' },
    ]

    displayInstructions = () => {

        this.setState({ selectedRecipe: this });
    }

    render() {
        const recipeComponents = this.recipes.map((recipe, index) => <Recipe onClick={this.displayInstructions} key={index} recipe={recipe} />)

        return (
            <div> {recipeComponents}  </div>
        );
    }
}