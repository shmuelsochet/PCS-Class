import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import Student from './Student';

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      'students': [
        {
          'name': 'Meir',
          'scores': [100, 100]
        },
        {
          'name': 'Elchonon',
          'scores': [99, 99]
        }
      ]
    };
  }

  printStudents(students) {
    const jsxStudents = students.map(student =>
      <Student name={student.name} scores={student.scores} />
    );

    return jsxStudents;
  }

  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to Shmuel React</h1>
        </header>

        {this.printStudents(this.state.students)}
        {

          //  <Student name="Bob" scores={[90, 80]} />
          // <Student name="Joe" scores={[99, 89]} />
        }

      </div>
    );
  }
}

export default App;
