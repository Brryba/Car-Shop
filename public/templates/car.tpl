<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автомобиль</title>
    <link rel="stylesheet" type="text/css" href="/public/css/car.css">
</head>
<body>
<div class="car-form">
    <h1 class="main-header">Автомобиль</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Id автомобиля (будет генерироваться через БД, пока так ;) ):</label>
            @ifwithelse ({{isNew}})
            <input type="text" id="id" name="id" class="form-control" required>
            @else
            <input type="text" id="id" name="id" class="form-control" value="{{id}}" required>
            @endifelse
        </div>
        <div class="form-group">
            <label for="name">Марка и модель:</label>
            @ifwithelse ({{isNew}})
            <input type="text" id="name" name="name" class="form-control" required>
            @else
            <input type="text" id="name" name="name" class="form-control" value="{{name}}" required>
            @endifelse

        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            @ifwithelse ({{isNew}})
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            @else
            <textarea id="description" name="description" class="form-control" rows="4" required>{{description}}</textarea>
            @endifelse
        </div>

        <div class="form-group">
            <label for="price">Цена ($):</label>
            @ifwithelse ({{isNew}})
            <input type="text" id="price" name="price" class="form-control" required>
            @else
            <input type="text" id="price" name="price" class="form-control" value="{{price}}" required>
            @endifelse
        </div>

        <div class="form-group">
            <label for="image">Фотография:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            @ifwithelse ({{isNew}})
            <img id="imagePreview" class="image-preview" alt="Предпросмотр">
            @else
            <img id="imagePreview" class="image-preview" src="{{image}}" alt="Предпросмотр">
            @endifelse
        </div>


        <div class="form-group">
            <label for="name">Ваше имя:</label>
            @ifwithelse ({{isNew}})
            <input type="text" id="user" name="user" class="form-control" required>
            @else
            <input type="text" id="user" name="user" class="form-control" value="{{user}}" required>
            @endifelse

        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-cancel" onclick="window.location.href='/'">Отмена</button>
            <button type="submit" class="btn btn-submit">Сохранить</button>
        </div>
    </form>
</div>

<script src="/public/js/chooseImage.js">

</script>
</body>
</html>