import React from "react";
import './ImageSlider.css'

function ImageSlider(props) {
    const {useState} = React;
    const [imageIndex, setImageIndex] = useState(0);

    function next() {
        setImageIndex((imageIndex + 1) % props.images.length);
    }

    function prev() {
        if (imageIndex === 0) {
            setImageIndex(props.images.length - 1);
        } else {
            setImageIndex(imageIndex - 1);
        }
    }

    return (
        <div className="image-slider">
            <img src={props.images[imageIndex]} className={"modal-image"} alt={"Фото не найдено."}/>
            <div className="move-buttons-container">
                <button className="move-buttons prevButton" onClick={prev}>
                    <img src="./images/main/left-arrow.png" alt="Предыдущая"></img>
                </button>
                <button className="move-buttons nextButton" onClick={next}>
                    <img src="./images/main/right-arrow.png" alt="Следующая"></img>
                </button>
            </div>
            <div className="dots-container">
                {props.images.map((_, index) => (
                    <span
                        key={index}
                        className={`dot ${index === imageIndex ? 'active' : ''}`}
                        onClick={() => setImageIndex(index)}
                    ></span>
                ))}
            </div>
        </div>
    );
}

export default ImageSlider