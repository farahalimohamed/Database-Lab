import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { connect } from 'react-redux';

const NavBar = ({ numberCart }) => {
  const navigate = useNavigate();

  const handleNavigateHome = () => {
    navigate('/');
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <Link className="navbar-brand ms-4">
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
          <li className="nav-item">
            <Link to="/carts" className="nav-link">
              Carts : {numberCart}
            </Link>
          </li>
        </ul>
      </div>
    </nav>
  );
};

const mapStateToProps = (state) => {
  return {
    numberCart: state._todoProduct.numberCart,
  };
};

export default connect(mapStateToProps, null)(NavBar);
