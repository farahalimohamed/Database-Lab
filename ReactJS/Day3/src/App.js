import React from 'react';
import Products from './Components/Products';
import useFetch from './Components/useFetch';
import 'bootstrap/dist/css/bootstrap.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import ErrorPagee from './Components/ErrorPage.jsx';
import AddProducts from './Components/AddProducts.jsx';
import NavBar from './Components/Navbar.jsx';

const App = () => {
  const apiUrl = "http://localhost:2000/products";
  const { data: prds, loading, error } = useFetch(apiUrl);

  return (
    <div>
      {loading && <p>Loading...</p>}
      {error && <p>Error: {error}</p>}
      <BrowserRouter>
        <Routes>
          {
            ['products', '/', 'home'].map((path, index) => (
              <Route path={path} element={<><NavBar /><Products prds={prds} /></>} key={index} />
            ))
          }
          <Route path="addProducts" element={<><NavBar /><AddProducts /></>} />
          <Route path="*" element={<ErrorPagee />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
};

export default App;