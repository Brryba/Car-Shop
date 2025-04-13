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

            @if ({{isDirectory}})
            <div>
                <button class="btn btn-primary" id="addFile" onclick="createFile('{{currDir}}')">Добавить файл</button>
                <button class="btn btn-secondary" id="addFile" onclick="createDirectory('{{currDir}}')">Создать папку</button>
            </div>
            @endif

        </div>

        <div class="file-manager">
            <div class="file-actions">
                <ul class="breadcrumb">
                    @foreach ({{link}} as {{links}})
                    <li>
                        <a class="link" onclick="redirect('{{link.href}}')">{{link.name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            @if ({{isNotMain}})
            <button class="btn btn-secondary back-button" onclick="redirect('{{backPage}}')">← Назад</button>
            @endif

            @ifwithelse ({{isDirectory}})
            <div class="file-list">
                @foreach ({{file}} as {{files}})
                <div class="file-item">
                    <span class="file-icon" onclick="redirect('{{file.path}}')">{{file.icon}}</span>
                    <span class="file-name" onclick="redirect('{{file.path}}')">{{file.name}}</span>
                    <div class="file-actions">
                        <button class="btn btn-primary" onclick="redirect('{{file.path}}')">Открыть</button>
                        <button class="btn btn-danger" onclick="deleteFile('{{file.path}}', false)">Удалить</button>
                    </div>
                </div>
                @endforeach
            </div>

            @else

            <div class="file-viewer">
                <h2>{{fileName}}</h2>

                <div class="file-meta">
                    <span>Тип: {{fileType}}</span>
                    <span>Размер: {{fileSize}} байт</span>
                </div>

                <div class="file-content">

                    @if ({{isImage}})
                    <img src="{{filePath}}" class="file-preview" alt="{{fileName}}">
                    @endif

                    @if ({{isText}})
                    <label>
                        <textarea id="text">{{fileContent}}</textarea>
                    </label>
                    @endif

                </div>

                <div class="file-actions">
                    <button class="btn btn-primary" >Скачать</button>
                    <button class="btn btn-danger" onclick="deleteFile('{{fileFullName}}', true)">Удалить</button>

                    @if ({{isText}})
                    <button class="btn btn-warning" onclick="updateFile('{{fileFullName}}')">Сохранить</button>
                    @endif

                </div>
            </div>
            @endifelse
        </div>
    </div>
    <script src="/public/js/adminRedirector.js"></script>
    <script src="/public/js/adminFilesCreator.js"></script>
    <script src="/public/js/adminDeleteFile.js"></script>
    <script src="/public/js/adminUpdateFile.js"></script>
</div>
</body>
</html>