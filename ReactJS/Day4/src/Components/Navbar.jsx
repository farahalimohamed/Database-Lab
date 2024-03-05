import React from 'react';
import { Link, useNavigate } from 'react-router-dom';

const NavBar = () => {
  const navigate = useNavigate();

  const handleNavigateHome = () => {
    navigate('/');
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <Link className="navbar-brand ms-4" to="/" >
        Facebook
      </Link>
      <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span className="navbar-toggler-icon"></span>
      </button>
      <div className="collapse navbar-collapse" id="navbarNav">
        <ul className="navbar-nav mr-auto">
          <li className="nav-item">
            <Link className="nav-link" to="/post" onClick={handleNavigateHome}>
              Posts
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/addPosts">
              Add Post
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" aria-current="page" to="/postsContext">Posts Using context api</Link>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default NavBar;
