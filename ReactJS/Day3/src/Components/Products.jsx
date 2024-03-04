import React, { useState } from 'react';
import useFetch from './useFetch';

const Products = () => {
  const { data: prds, loading, error, fetchData } = useFetch("http://localhost:2000/products");

  const handleOutOfStock = () => {
    let filteredProducts = prds.filter((p) => p.quantity > 0);
    fetchData(filteredProducts);
  };

  return (
    <div>
      <h1 class="text-center">Products</h1>
      <div className="text-center">
        <button className="btn btn-dark mt-2 mb-2 ms-3" onClick={handleOutOfStock}>
          Filter
        </button>
      </div>
      <div className="row w-75 mx-auto">
        {loading && <p>Loading...</p>}
        {error && <p>Error: {error.message}</p>}
        {!loading && !error && prds.map((p) => (
          <div className="col-12 col-md-4" key={p.id}>
            <div className="card mb-3 w-75" style={{ minHeight: '330px' }}>
              <img src={p.imgUrl} className="card-img-top" alt="..." style={{ height: '200px' }} />
              <div className="card-body bg-light">
                <h5 className="card-title">{p.name}</h5>
                <p className="card-text">{p.price}</p>
                <p className="card-text">
                  {p.quantity === 0 ? (
                    <p className="p-2 text-danger">Out Of Stock</p>
                  ) : (
                    <p>{p.quantity}</p>
                  )}
                </p>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Products;
