import React, { Component } from 'react';

export default class Student extends Component {

    printScores(scores) {
        const jsxScores = scores.map(score =>
            <p>{score}</p>
        );

        return jsxScores;
    }

    render() {
        return (
            <div>
                <h2>
                    {this.props.name}
                </h2>
                <p>Scores: {this.printScores(this.props.scores)} </p>
            </div>
        );
    }

}
