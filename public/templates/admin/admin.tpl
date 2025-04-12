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
                    @foreach ({{link}} as {{links}})
                    <li>
                        <a href="{{link.href}}">{{link.name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>


            @ifwithelse ({{isDirectory}})
            <div class="file-list">
                @foreach ({{file}} as {{files}})
                <div class="file-item">
                    <span class="file-icon">{{file.icon}}</span>
                    <span class="file-name" onclick="">{{file.name}}</span>
                    <div class="file-actions">
                        <button class="btn btn-primary">Открыть</button>
                        <button class="btn btn-danger">Удалить</button>
                    </div>
                </div>
                @endforeach
            </div>
            @else

            @endifelse
        </div>
    </div>
</div>
</body>
</html>