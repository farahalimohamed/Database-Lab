import React from 'react';
import Posts from './Components/Posts.jsx';
import useFetch from './Components/useFetch';
import 'bootstrap/dist/css/bootstrap.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import ErrorPagee from './Components/ErrorPage.jsx';
import AddPosts from './Components/AddPosts.jsx';
import NavBar from './Components/Navbar.jsx';
import PostDetail from './Components/PostDetail.jsx';
import EditPost from './Components/EditPosts.jsx';
import { PostsContextProvider } from './Components/PostsContextApi.jsx';
import PostsUsingContext from './Components/PostsUsingContextAPI.jsx'

const App = () => {
  const apiUrl = "http://localhost:2000/posts";
  const { data: prds, loading, error } = useFetch(apiUrl);

  return (
    <div>
      {error && <p>Error: {error}</p>}
      <PostsContextProvider>
        <BrowserRouter>
          <Routes>
            {
              ['post', '/', 'home'].map((path, index) => (
                <Route path={path} element={<><NavBar /><Posts prds={prds} /></>} key={index} />
              ))
            }
            <Route path="addPosts" element={<><NavBar /><AddPosts /></>} />
            <Route path="*" element={<ErrorPagee />} />
            <Route path="/post/:postId" element={<><NavBar /><PostDetail /></>} />
            <Route path="/edit/:postId" element={<><NavBar /><EditPost /></>} />
            <Route path="postsContext" element={<PostsUsingContext />} />
          </Routes>
        </BrowserRouter>
      </PostsContextProvider>
    </div>
  );
};

export default App;