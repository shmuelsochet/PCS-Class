import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class Recipe extends Component {
    constructor(props) {
        super(props)
        this.state = { showDetails: false };
    }

    onMouseEnter = () => {
        this.setState({ hover: true });
    }

    onMouseLeave = () => {
        this.setState({ hover: false });
    }

    toggleDetails = () => {
        this.setState({ showDetails: !this.state.showDetails });
    }

    render() {
        const details = this.state.showDetails ? <img style={{ width: 250 }} src={this.props.recipe.picture} /> : null;

        const hoverStyle = this.state.hover ? { color: 'yellow' } : null;
        return (
            <div>
                <h2>{this.props.recipe.name}</h2>
                <p>{this.props.recipe.instructions}</p>
                <div onMouseEnter={this.onMouseEnter} onMouseLeave={this.onMouseLeave} style={hoverStyle} onClick={this.toggleDetails}>
                    click {this.state.showDetails ? 'to hide' : 'for more details'}
                    {details}
                </div>
            </div>
        );
    }
}

Recipe.propTypes = {
    recipe: PropTypes.object,
};
