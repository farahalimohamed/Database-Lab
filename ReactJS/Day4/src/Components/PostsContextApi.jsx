import { useEffect, useState, createContext, useMemo } from 'react';
import axios from 'axios';

const PostsContext = createContext();

const useFetch = (url) => {
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const fetchData = async (filteredData = null) => {
    try {
      setLoading(true);
      const res = await axios.get(url);
      setLoading(false);
      return filteredData || res.data;
    } catch (err) {
      console.error("Network Error:", err);
      setError(err.message);
      setLoading(false);
      throw err;
    }
  };

  return { loading, error, fetchData };
};

export const PostsContextProvider = (props) => {
  const { children } = props;
  const { loading, error, fetchData } = useFetch("http://localhost:2000/posts");
  const [posts, setPosts] = useState([]);

  useEffect(() => {
    const getData = async () => {
      try {
        const data = await fetchData();
        setPosts(data);
      } catch (err) {
        console.log(err);
      }
    };

    getData();
  }, [fetchData]);

  const ContextValue = useMemo(() => ({ loading, error, posts, fetchData }), [loading, error, posts]);

  return (
    <PostsContext.Provider value={ContextValue}>
      {children}
    </PostsContext.Provider>
  );
};

export default PostsContext;
