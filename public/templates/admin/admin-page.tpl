<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="/public/css/admin-page.css">
</head>
<body>
<div class="admin-container">

    <div class="main-content">
        <div class="header">
            <h1>Файловый менеджер</h1>
            <button class="btn btn-primary" id="addFile">Добавить файл</button>
        </div>

        <div class="file-manager">
            <div class="file-actions">
                <ul class="breadcrumb">
                    <li><a href="#">Корневая папка</a></li>
                    <li><a href="#">public</a></li>
                    <li><a href="#">uploads</a></li>
                </ul>
            </div>

            <div class="file-list">
                <div class="file-item">
                    <span class="file-icon">📁</span>
                    <span class="file-name">images</span>
                    <div class="file-actions">
                        <button class="btn btn-primary">Открыть</button>
                        <button class="btn btn-danger">Удалить</button>
                    </div>
                </div>

                <!-- Пример файлов -->
                <div class="file-item">
                    <span class="file-icon">📄</span>
                    <span class="file-name">document.pdf</span>
                    <div class="file-actions">
                        <button class="btn btn-primary">Скачать</button>
                        <button class="btn btn-danger">Удалить</button>
                    </div>
                </div>

                <div class="file-item">
                    <span class="file-icon">🖼️</span>
                    <span class="file-name">photo.jpg</span>
                    <div class="file-actions">
                        <button class="btn btn-primary">Просмотр</button>
                        <button class="btn btn-danger">Удалить</button>
                    </div>
                </div>

                <div class="file-item">
                    <span class="file-icon">📄</span>
                    <span class="file-name">report.xlsx</span>
                    <div class="file-actions">
                        <button class="btn btn-primary">Скачать</button>
                        <button class="btn btn-danger">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>