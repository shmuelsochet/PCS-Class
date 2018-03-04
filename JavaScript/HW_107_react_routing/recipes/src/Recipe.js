import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';

export default class Recipe extends Component {
    constructor(props) {
        super(props)
        this.state = { showDetails: false, hover: false };
    }

    toggleDetails = () => {
        this.setState({ showDetails: !this.state.showDetails });
    }

    mouseEnter = () => {
        this.setState({ hover: true });
    }

    mouseLeave = () => {
        this.setState({ hover: false });
    }

    render() {
        const details = this.state.showDetails ? <img style={{ width: 250 }} src={this.props.recipe.picture} alt="recipe" /> : null;
        const style = this.state.hover ? { backgroundColor: 'yellow' } : null;

        return (

            <div>
                <Link to={`/recipe/${this.props.recipe.name}`} />
                <h2>{this.props.recipe.name}</h2>
                <p>{this.props.recipe.instructions}</p>
                <div style={style} onClick={this.toggleDetails} onMouseEnter={this.mouseEnter} onMouseLeave={this.mouseLeave}>
                    click {this.state.showDetails ? 'to hide' : 'for more details'}
                    <br />
                    {details}
                </div>
            </div>
        );
    }
}

Recipe.propTypes = {
    recipe: PropTypes.object,
};
