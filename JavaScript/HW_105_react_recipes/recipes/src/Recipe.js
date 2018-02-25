import React, { Component } from 'react';
import RecipeList from './RecipeList';

export default class Recipe extends Component {
    constructor(props) {
        super(props);
        this.state = { display: 'none' }
    }

    displayInstructions = () => {

        this.setState({ display: 'block' });
    }

    render() {

        const { name, instructions } = this.props.recipe;
        return (
            <div><h1 onClick={this.displayInstructions}>{name}</h1><h2 style={{ 'display': this.state.display, color: 'red' }}>{instructions}</h2></div >
        );
    }
}