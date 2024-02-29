// src/components/ImageSlider.js
import React, { useState, useRef, useEffect } from 'react';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import './ImageSlider.css';

const ImageSlider = ({ images }) => {
    const [isSliderPlaying, setSliderPlaying] = useState(true);
    const sliderRef = useRef(null);

    const settings = {
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: isSliderPlaying,
        autoplaySpeed: 2000,
    };

    const toggleSlider = () => {
        setSliderPlaying(!isSliderPlaying);
    };

    const goToPrev = () => {
        sliderRef.current.slickPrev();
    };

    const goToNext = () => {
        sliderRef.current.slickNext();
    };

    const goToSlide = (index) => {
        sliderRef.current.slickGoTo(index);
    };

    const toggleAutoplay = () => {
        setSliderPlaying(!isSliderPlaying);
    };

    useEffect(() => {
        let interval;

        if (isSliderPlaying) {
            interval = setInterval(() => {
                sliderRef.current.slickNext();
            }, settings.autoplaySpeed);
        }

        return () => clearInterval(interval);
    }, [isSliderPlaying, settings.autoplaySpeed]);

    return (
        <div className="slider-container">
            <Slider {...settings} ref={sliderRef}>
                {images.map((image, index) => (
                    <div key={index}>
                        <img src={image} alt={`slide-${index}`} />
                    </div>
                ))}
            </Slider>
            <div className="button-container">
                <button className="slider-button" onClick={goToPrev}>
                    Previous
                </button>
                <button className="slider-button" onClick={toggleSlider}>
                    {isSliderPlaying ? 'Stop' : 'Play'}
                </button>
                <button className="slider-button" onClick={goToNext}>
                    Next
                </button>
                <button className="slider-button" onClick={toggleAutoplay}>
                    Slider
                </button>
            </div>
        </div>
    );
};

export default ImageSlider;
