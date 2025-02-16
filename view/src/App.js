import ProductCard from "./components/ProductCard";
import './components/App.css'

function App() {
    return (
        <div>
            <h1 className={"main-header"}>Каталог автомобилей</h1>
            <div className={"products"}>
                <ProductCard
                    name={"Volvo S90"}
                    features={["Год выпуска: 2021",
                        "Коробка: Автомат",
                        "Двигатель: 465 л.с. / 2,0 л",
                        "Подключаемый полный привод",
                        "Пробег: 135000 км"]}
                    other={["Тип: Седан",
                        "Топливо: Бензин",
                        "Цвет: Синий",]}
                    price={"35,000 $"}
                    image={"./images/car1/pic1.png"}
                    images={["./images/car1/pic1.png",
                        "./images/car1/pic2.png",
                        "./images/car1/pic3.png",
                        "./images/car1/pic4.png",]}
                />
                <ProductCard
                    name={"Chevrolet Malibu"}
                    features={["Год выпуска: 2021",
                        "Коробка: Автомат",
                        "Двигатель: 250 л.с. / 2,0 л",
                        "Передний привод",
                        "Пробег: 50000 км"]}
                    other={["Тип: Седан",
                        "Топливо: Бензин",
                        "Цвет: Черный"]}
                    price={"17,000 $"}
                    image={"./images/car2/pic1.png"}
                    images={["./images/car2/pic1.png",
                        "./images/car2/pic2.png",
                        "./images/car2/pic3.png",
                        "./images/car2/pic4.png",]}
                />
                <ProductCard
                    name={"Volkswagen Polo"}
                    features={["Год выпуска: 2007",
                        "Коробка: Механика",
                        "Двигатель: 80 л.с. / 1,4 л",
                        "Передний привод",
                        "Пробег: 460000 км"]}
                    other={["Тип: Хэтчбек",
                        "Топливо: Бензин",
                        "Цвет: Темно-синий"]}
                    price={"4,800 $"}
                    image={"./images/car3/pic1.png"}
                    images={["./images/car3/pic1.png",
                        "./images/car3/pic2.png",
                        "./images/car3/pic3.png",
                        "./images/car3/pic4.png",]}
                />
                <ProductCard
                    name={"Xiaomi SU7"}
                    features={["Год выпуска: 2024",
                        "Коробка: Автомат",
                        "Двигатель: 673 л.с. / 495 кВ",
                        "Полный привод",
                        "Пробег: 5000 км"]}
                    other={["Тип: Седан",
                        "Топливо: Электро",
                        "Цвет: Белый"]}
                    price={"41,200 $"}
                    image={"./images/car4/pic1.png"}
                    images={["./images/car4/pic1.png",
                        "./images/car4/pic2.png",
                        "./images/car4/pic3.png",
                        "./images/car4/pic4.png",]}
                />
                <ProductCard
                    name={"Honda Civic"}
                    features={["Год выпуска: 2021",
                        "Коробка: Вариатор",
                        "Двигатель: 181 л.с. / 1,5 л",
                        "Передний привод",
                        "Пробег: 20000 км"]}
                    other={["Тип: Седан",
                        "Топливо: Бензин",
                        "Цвет: Белый"]}
                    price={"18,300 $"}
                    image={"./images/car5/pic1.png"}
                    images={["./images/car5/pic1.png",
                        "./images/car5/pic2.png",
                        "./images/car5/pic3.png",
                        "./images/car5/pic4.png", ]}
                />
                <ProductCard
                    name={"Volvo XC60"}
                    features={["Год выпуска: 2022",
                        "Коробка: Автомат",
                        "Двигатель: 250 л.с. / 2,0 л",
                        "Передний привод",
                        "Пробег: 37000 км"]}
                    other={["Тип: Внедорожник",
                        "Топливо: Бензин",
                        "Цвет: Черный"]}
                    price={"42,500 $"}
                    image={"./images/car6/pic1.png"}
                    images={["./images/car6/pic1.png",
                        "./images/car6/pic2.png",
                        "./images/car6/pic3.png",
                        "./images/car6/pic4.png", ]}
                />
            </div>
        </div>
    );
}

export default App;
