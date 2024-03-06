import React from 'react';
import { useParams, Link } from 'react-router-dom';
import useFetch from './useFetch';
import { connect } from 'react-redux';
import { AddCart } from '../Actions';

const PrdDetails = ({ AddCart }) => {
  const { id } = useParams();
  const apiUrl = `http://localhost:2000/products/${id}`;

  const { data: prd, loading, error } = useFetch(apiUrl);

  return (
    <div>
      <h1>Product Details</h1>
      {loading && <p>Loading...</p>}
      {error && <p>Error: {error}</p>}
      {!loading && prd && (
        <div className="card">
          <img src={prd.imgUrl} className="card-img-top" alt="..." height="300px" />
          <div className="card-body">
            <h5 className="card-title">{prd.name}</h5>
            <p className="card-text">{prd.quantity}</p>
            <p className="card-text">{prd.price}</p>
            <button className="btn btn-primary" onClick={() => AddCart(prd)}>
                Add to Cart
              </button>
            <Link to="/products" className="btn btn-dark">
              Back
            </Link>
          </div>
        </div>
      )}
    </div>
  );
};

const mapDispatchToProps = (dispatch) => {
  return {
    AddCart: (item) => dispatch(AddCart(item)),
  };
};

export default connect(null, mapDispatchToProps)(PrdDetails);
