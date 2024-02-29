import React from 'react';
import ImageSlider from './components/ImageSlider';
import ProductList from './components/ProductList';

const App = () => {
  const images = [
    'https://img.freepik.com/free-photo/galactic-night-sky-astronomy-science-combined-generative-ai_188544-9656.jpg?t=st=1709201035~exp=1709204635~hmac=2bf0a76f7d0c2769a76e74d90828f8c9bcf5b489622435e8b581549108bf0822&w=1060',
    'https://img.freepik.com/free-photo/hot-air-balloon-flying-beautiful-sand-dunes-ai-generated-image_511042-1744.jpg?t=st=1709200929~exp=1709204529~hmac=f9b4ea9b3069a114916dd73f502669733f25c289f24485eeee987f6fb036e136&w=1060',
    'https://img.freepik.com/free-photo/beautiful-shot-rock-formations-near-sea-with-crazy-sea-waves-crashing_181624-7122.jpg?t=st=1709201006~exp=1709204606~hmac=b94eb6b90faba3089dce69003f14bbaf1ec0c16029bc0575acead3526f053683&w=900',
  ];

  return (
    <div>
      <h1>Image Slider</h1>
      <ImageSlider images={images} />
      <ProductList />S
    </div>
  );
};

export default App;
