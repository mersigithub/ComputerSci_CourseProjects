import './App.css';
// bootstrap css
import 'bootstrap/dist/css/bootstrap.min.css';
import AddProduct from './components/funcComp';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <h1>PRODUCT INVENTORY FORM APP</h1>
        <AddProduct/>
      </header>

    </div>



  );
}
export default App;