async function createDirectory(currPath) {
    let directory = prompt("Введите имя новой папки");

    if (directory === null || directory === undefined) {
        return;
    }

    const response = await fetch("/admin/api/createDir", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({directory, currPath})
    });
    await showResponse(response);
}

async function createFile(currPath) {
    let file = prompt("Введите имя нового файла с расширением");

    if (file === null || file === undefined) {
        return;
    }

    const response = await fetch("/admin/api/createFile", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({file, currPath})
    });
    await showResponse(response);
}

async function showResponse(response) {
    if (!response.ok) {
        console.log(response)
        const errorData = await response.json().catch(() => null);
        const errorMessage = errorData?.message || response.statusText;
        alert(errorMessage);
    } else {
        window.location.reload();
    }
}