import React, { useEffect } from 'react';
import { useState, useCallback } from 'react';
import { useParams , useNavigate } from 'react-router-dom';
import axios from 'axios';

const EditPost = () => {
    const { postId } = useParams();
    const Navigate = useNavigate()
    let [Prd, setPrd] = useState({
        title: '',
        slug: '',
        content: '',
        thumbnail: 'https://source.unsplash.com/random',
    });
    let GetById = (postId) => {
        axios.get(`http://localhost:2000/posts/${postId}`)
            .then(res => setPrd(res.data))
            .catch(err => console.log(err))
    }
    useEffect(() => { GetById(postId) }, [])
    let EditPost = (e) => {
        e.preventDefault();
        axios.put(`http://localhost:2000/posts/${postId}`,Prd)
        .then((res)=>setPrd(res.data))
        .catch(err=>console.log(err))
        Navigate("/post")
    }
    let HandleChange = useCallback((e) => {
        console.log(e)
        const { name, value } = e.target;
        setPrd((old) => ({
            ...old,
            [name]: value
        }))
    })
    return (
        <div className="pt-4" style={{ backgroundColor: '#18191A', color: 'white' , minHeight: '100vh' }}>
            <div className='container'>
            <h1>Edit</h1>
            <form action="" onSubmit={EditPost}>
                <div class="mb-3">
                    <label for="floatingInput" className="form-label">Post Title</label>
                    <input type="text" class="form-control bg-dark text-white" id="floatingInput" placeholder="title" name="title" value={Prd.title} onChange={HandleChange} />
                </div>
                <div class="mb-3">
                    <label for="floatingInput" className="form-label">Post Image</label>
                    <input type="text" class="form-control bg-dark text-white" id="floatingInput" placeholder="thumbnail" name="thumbnail" value={Prd.thumbnail} onChange={HandleChange} />
                </div>
                <div class="mb-3">
                    <label for="floatingInput" className="form-label">Post Slug</label>
                    <input type="text" class="form-control bg-dark text-white" id="floatingInput" placeholder="slug" name="slug" value={Prd.slug} onChange={HandleChange} />
                </div>
                <div class="mb-3">
                <label for="floatingInput" className="form-label">Post Content</label>
                    <input type="text" class="form-control bg-dark text-white" id="floatingInput" placeholder="content" name="content" value={Prd.content} onChange={HandleChange} />
                </div>
                <button className="btn btn-secondary">Submit</button>
            </form>
            </div>
        </div>
    );
};

export default EditPost;