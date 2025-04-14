async function deleteFile(path, isSelf) {
    const response = await fetch(`/admin/api/deleteFile`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({path})
    });

    if (!response.ok) {
        console.log(response)
        const errorData = await response.json().catch(() => null);
        const errorMessage = errorData?.message || response.statusText;
        alert(errorMessage);
    } else {
        if (isSelf) {
            window.location.href = window.location.href.substring(0, window.location.href.lastIndexOf("/"))
        } else {
            window.location.reload();
        }
    }
}