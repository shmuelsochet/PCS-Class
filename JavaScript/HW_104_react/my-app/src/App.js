import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import Student from './Student';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to Shmuel React</h1>
        </header>
        <p className="App-intro">
          To get started, edit <code>src/App.js</code> and save to reload.
        </p>
        <Student name="Bob" scores={[90, 80]} />
        <Student name="Joe" scores={[99, 89]} />
      </div>
    );
  }
}

export default App;
