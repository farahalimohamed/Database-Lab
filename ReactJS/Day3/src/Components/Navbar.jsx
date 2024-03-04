import React from 'react';
import { Link, useNavigate } from 'react-router-dom';

const NavBar = () => {
  const navigate = useNavigate();

  const handleNavigateHome = () => {
    navigate('/');
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <Link className="navbar-brand ms-4" to="/" >
        Shop
      </Link>
      <div className="collapse navbar-collapse">
        <ul className="navbar-nav mr-auto">
          <li className="nav-item">
            <Link className="nav-link" to="/products" onClick={handleNavigateHome}>
              Products
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/addProducts">
              Add Product
            </Link>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default NavBar;