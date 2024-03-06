import { useEffect, useState } from 'react';
import axios from 'axios';

const useFetch = (url) => {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const fetchData = (filteredData = null) => {
    setLoading(true);
    axios.get(url)
      .then(res => {
        setData(filteredData || res.data);
        setLoading(false);
      })
      .catch(err => {
        console.error("Network Error:", err);
        setError(err.message);
        setLoading(false);
      });
  };

  useEffect(() => {
    fetchData();
  }, [url]);

  return { data, loading, error, fetchData };
};

export default useFetch;
