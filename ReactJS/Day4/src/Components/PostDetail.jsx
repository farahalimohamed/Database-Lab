import React from 'react';
import { useParams } from 'react-router-dom';
import useFetch from './useFetch';

const PostDetail = () => {
  const { postId } = useParams();
  const { data: post, loading, error } = useFetch(`http://localhost:2000/posts/${postId}`);

  if (loading) {
    return <p>Loading...</p>;
  }

  if (error) {
    return <p>Error: {error.message}</p>;
  }

  return (
    <div className="pt-4" style={{ backgroundColor: '#18191A', color: 'white', minHeight: '100vh' }}>
      <div className="container w-50">
        
        <div className="card bg-dark text-white">
          <img src={post.thumbnail} className="card-img-top" alt="Post Thumbnail" style={{ height: '200px', objectFit: 'cover' }} />
          <div className="card-body">
          <h1 className="text-center">{post.title}</h1>
            <p className="card-text">{post.content}</p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default PostDetail;
