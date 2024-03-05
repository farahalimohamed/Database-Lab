import React, { useContext } from 'react';
import PostsContext from '../Components/PostsContextApi.jsx';

const PostsUsingContext = () => {
    let { posts } = useContext(PostsContext);

    return (
        <div className="pt-4 pb-4" style={{ backgroundColor: '#18191A', color: 'white', minHeight: '100vh' }}>
        <div className="container p-4">
            <h1 className="mb-4">Posts</h1>
            {posts ? (
                <div>
                    {posts.map((p) => (
                        <div key={p.id} className="mb-4">
                            <h2 className="text-primary">{p.id}. {p.title}</h2>
                            <p className="text-secondary">{p.content}</p>
                        </div>
                    ))}
                </div>
            ) : (
                <div>Loading...</div>
            )}
        </div>
    </div>
    );
};

export default PostsUsingContext;
