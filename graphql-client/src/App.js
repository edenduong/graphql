import logo from './logo.svg';
import './App.css';
import ApolloBoost, { gql } from 'apollo-boost'

const client = new ApolloBoost({
  uri: 'http://127.0.0.1/magento241/graphql'
})

const getUsers = gql`
  query {
    products(search: "Yoga", pageSize: 10) {
      total_count
    }
    cmsPage(id: 1) {
      identifier,
      content
    }
    country(id: "US") {
      id,
      full_name_locale
    }
    book(id: 1) {
      id
    }
  }
`

client.query({
  query: getUsers
}).then((response) => {
  console.log(response)
})
function App() {
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;
