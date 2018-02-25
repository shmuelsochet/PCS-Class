import React, { Component } from 'react';
import RecipeList from './RecipeList';
import AddRecipe from './AddRecipe';

export default class RecipeBook extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipes: [
                { name: 'Macaroni', instructions: 'Boil water, add macaroni', picture: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUyjtfKf-mNn0LZpEdQ-rxmyXhoZMMKfy7K3QI7mNQBV7W8-TE' },
                { name: 'Eggs', instructions: 'Boil water, add eggs', picture: 'https://x9wsr1khhgk5pxnq1f1r8kye-wpengine.netdna-ssl.com/wp-content/uploads/cooking-eggs-freshness-matters1-930x550.jpg' }
            ]
        };
    }

    addRecipe = (recipe) => {
        console.log(recipe);
        let tempRecipes = this.state.recipes;
        tempRecipes.push(recipe);
        this.setState({ recipes: tempRecipes });
    }

    render() {
        return (
            <div>
                Im a recipe book
                <RecipeList recipes={this.state.recipes} />
                <AddRecipe onSubmit={this.addRecipe} />
            </div>
        );
    }
}
