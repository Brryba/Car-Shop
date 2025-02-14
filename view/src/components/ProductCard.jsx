import React from "react";
import ImageSlider from "./ImageSlider";
import './ProductCard.css'


function ProductCard(props) {
    const {useState} = React;

    const [isModalOpen, setIsModalOpen] = useState(false);

    const handleOpenModal = () => {
        setIsModalOpen(true);
        document.body.style.overflow = 'hidden';
    };

    const handleCloseModal = () => {
        setIsModalOpen(false);
        document.body.style.overflow = 'auto';
    };

    return (
        <div className="product-card-container">
            <h2>{props.name}</h2>
            <div className="content">
                <div className="text">
                    {props.video}
                    {(props.features !== undefined) ?
                    props.features.map((feature) => (
                        <div className={"feature"}>{feature}</div>
                    )) : <div/>}
                    <h3>Цена: {props.price}</h3>
                    <button onClick={handleOpenModal}>Подробнее</button>
                </div>
                <div className="photo">
                    <img src={props.image} alt="Фото не найдено." onClick={handleOpenModal}></img>
                </div>
            </div>

            {isModalOpen && (
                <div className="modal-background" onClick={handleCloseModal}>
                    <div className="modal" onClick={(closing) => closing.stopPropagation()}>
                        <ImageSlider
                            image=<img className="modal-image" src={props.image} alt="Фото не найдено."/>
                        images={props.images}
                        />
                        <div className="content">
                            <h2>{props.name}</h2>
                            <div className="features">
                                {(props.features !== undefined) ?
                                    props.features.map((feature) => (
                                        <div className={"feature"}>{feature}</div>
                                    )) : <div/>}
                                {(props.other !== undefined) ?
                                    props.other.map((feature) => (
                                    <div className={"feature"}>{feature}</div>
                                )) : <div/>}
                                {props.video}
                            </div>
                            <h3>Цена: {props.price}</h3>
                        </div>
                        <span onClick={handleCloseModal} className="closer">
                            <img src={"./images/main/close.png"} alt={"Закрыть"} className={"close-icon"}/>
                        </span>
                    </div>
                </div>
            )}
        </div>
    );
}

export default ProductCard;