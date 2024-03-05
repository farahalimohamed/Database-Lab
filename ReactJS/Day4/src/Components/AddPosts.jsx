import React, { useCallback, useState } from 'react';
import axios from 'axios';

const AddPosts = () => {
  let [Prd, setPrd] = useState({
    title: '',
    slug: '',
    content: '',
    thumbnail: 'https://source.unsplash.com/random',
  });

  const handleChange = useCallback((e) => {
    const { name, value } = e.target;
    setPrd((old) => ({
      ...old,
      [name]: value,
    }));
  }, []);

  const addPost = (e) => {
    e.preventDefault();
    axios
      .post("http://localhost:2000/posts", Prd)
      .then((res) => {
        console.log(res.data);
        setPrd(res.data);
      })
      .catch((err) => console.log(err));
  };

  return (
    <div className="pt-4" style={{ backgroundColor: '#18191A', color: 'white' , minHeight: '100vh' }}>
    <div className="container" >
      <h1>Add New Post</h1>
      <form onSubmit={addPost}>
        <div class="mb-3">
            <label for="floatingInput" className="form-label">Post Title</label>
            <input type="text"
                    className="form-control bg-dark text-white"
                    id="floatingInput"
                    placeholder="Name"
                    name="title"
                    value={Prd.title}
                    onChange={handleChange}/>
        </div>
        <div className="mb-3">
        <label for="floatingInput" className="form-label">
            Post Image
          </label>
          <input
            type="text"
            className="form-control bg-dark text-white"
            id="floatingInput"
            placeholder="Image"
            name="url"
            value={Prd.thumbnail}
            onChange={handleChange}
          />
        </div>
        <div className="mb-3">
        <label for="floatingInput" className="form-label">
            Post Slug
          </label>
          <input
            type="text"
            className="form-control bg-dark text-white"
            id="floatingInput"
            placeholder="Slug"
            name="slug"
            value={Prd.slug}
            onChange={handleChange}
          />
        </div>
        <div className="mb-3">
        <label for="floatingInput" className="form-label">
            Post Content
          </label>
          <input
            type="text"
            className="form-control bg-dark text-white"
            id="floatingInput"
            placeholder="Content"
            name="content"
            value={Prd.content}
            onChange={handleChange}
          />
          
        </div>
        <button className="btn btn-secondary">Post</button>
      </form>
    </div>
    </div>
  );
};

export default AddPosts;
