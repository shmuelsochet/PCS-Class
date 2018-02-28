import React, { Component } from 'react';
import './App.css';
import Routes from './Routes';
import { Link } from 'react-router-dom';

class App extends Component {
  render() {
    return (
      <div>
        <Link to="/recipes">Recipes</Link> | <Link to="/foo">Foo</Link> | <Link to="/test">Test</Link>
        {Routes}
      </div>
    );
  }
}

export default App;