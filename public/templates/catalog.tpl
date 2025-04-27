<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог автомобилей</title>
    <link rel="stylesheet" type="text/css" href="/public/css/product-card.css">
</head>
<body>
<div class="filter-container">
    <a href="/">
        <button id="showAllBtn" class="toggle-btn active">Показать все</button>
    </a>

    <form class="search-form" action="/user" method="GET">
        <input
                type="text"
                class="search-input"
                name="name"
                placeholder="Введите имя..."
                required
        >
        <button type="submit" class="search-btn">Найти</button>
    </form>
</div>

<h1 class="main-header">Каталог автомобилей</h1>

<div class="products">
    @foreach ({{car}} as {{cars}})
    <div class="product-card-container">
        <h2>{{car.name}}</h2>
        <div class="content">
            <div class="text">
                <p>{{car.description}}</p>
                <h3>{{car.price}}</h3>
                @if ({{isOwn}})
                <div class="actions">
                    <button class="btn btn-edit">Редактировать</button>
                    <button class="btn btn-delete">Удалить</button>
                </div>
                @endif
            </div>
            <div class="photo">
                <img src="{{car.imagePath}}" alt="Фото не найдено.">
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
</script>
</body>
</html>