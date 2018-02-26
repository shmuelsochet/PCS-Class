import React, { Component } from 'react';

export default class AddRecipe extends Component {


    constructor(props) {
        super(props);
        this.state = { name: "", instructions: "", image: "" };
    }


    handleInputChange = (event) => {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit = (e) => {

        console.log("In handle submit", this, this.state.name, this.state.instructions, this.state.image);
        let r = { "name": this.state.name, "instructions": this.state.instructions, "image": this.state.image };
        this.props.onSubmit(r)
        e.preventDefault(e);

    }

    render() {
        return (
            <form onSubmit={this.handleSubmit} >
                <h3>Add Recipe</h3>
                <label>
                    Name:
                    <input name="name" value={this.state.name} onChange={this.handleInputChange} />
                </label>
                <label>
                    Instructions:
                    <input name="instructions" value={this.state.instructions} onChange={this.handleInputChange} />
                </label>
                <label>
                    Image:
                    <input name="image" value={this.state.image} onChange={this.handleInputChange} />
                </label>
                <input type="submit" value="Add Recipe" />
            </form >
        );
    }
}


