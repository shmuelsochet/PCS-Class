import React, { Component } from 'react';

export default class AddRecipe extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            instructions: ''
        };
    }

    handleSubmit = (event) => {
        this.props.addRecipe({
            name: this.state.name,
            instructions: this.state.instructions
        });
        event.preventDefault();
    }

    handleInputChange = (event) => {
        const target = event.target;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    render() {
        return (
            <div>
                <h2>Add Recipe</h2>
                <form onSubmit={this.handleSubmit}>
                    <label>
                        Name:
                        <input name="name" value={this.state.name} onChange={this.handleInputChange} />
                    </label>
                    <br />
                    <label>
                        Instructions:
                        <input name="instructions" value={this.state.instructions} onChange={this.handleInputChange} />
                    </label>
                    <br />
                    <input type="submit" value="AddRecipe" />
                </form>
            </div>
        );
    }
}