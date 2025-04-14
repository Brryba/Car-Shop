async function updateFile(path) {
    const textArea = document.getElementById("text");
    const newText = textArea.value;
    const response = await fetch(`/admin/api/updateFile`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({path, newText})
    });

    if (!response.ok) {
        console.log(response)
        const errorData = await response.json().catch(() => null);
        const errorMessage = errorData?.message || response.statusText;
        alert(errorMessage);
    } else {
        window.location.reload();
    }

}