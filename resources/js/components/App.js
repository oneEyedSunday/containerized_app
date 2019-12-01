import React , { Component } from 'react';
import ReactDOM from 'react-dom';

import Header from './Header';
import ProjectList from './ProjectList';
import NewProject from './NewProject'
import SingleProject from './SingleProject'

import { BrowserRouter, Route, Switch } from 'react-router-dom';


class App extends Component {
  render() {
    return (
          <BrowserRouter>
            <div>
              <Header />
              <Switch>
                <Route exact path="/" component={ProjectList} />
                <Route path='/create' component={NewProject} />
                <Route path='/:id' component={SingleProject} />
              </Switch>
            </div>
          </BrowserRouter>
        )
  }
}

ReactDOM.render(<App />, document.getElementById('app'));
