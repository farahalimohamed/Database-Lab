import React from 'react';
import Products from './Components/Products';
import useFetch from './Components/useFetch';
import 'bootstrap/dist/css/bootstrap.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import ErrorPagee from './Components/ErrorPage.jsx';
import AddProducts from './Components/AddProducts.jsx';
import PrdDetails from './Components/PrdDetails.jsx';
import NavBar from './Components/Navbar.jsx';
import Cart from './Components/Cart.jsx';


const App = () => {
  const apiUrl = "http://localhost:2000/products";
  const { data: prds, loading, error } = useFetch(apiUrl);

  return (
    <div>
      {error && <p>Error: {error}</p>}
      <BrowserRouter>
        <Routes>
          {
            ['products', 'home'].map((path, index) => (
              <Route path={path} element={<><NavBar /><Products prds={prds} /></>} key={index} />
            ))
          }
          <Route path="addProducts" element={<><NavBar /><AddProducts /></>} />
          <Route path="products/:id" element={<><NavBar /><PrdDetails prds={prds} /></>} />
          <Route path="carts" element={<><NavBar /><Cart /></>} />
          <Route path="*" element={<ErrorPagee />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
};

export default App;