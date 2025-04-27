document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const preview = document.getElementById('imagePreview');
            preview.src = event.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});

window.onload = function() {
    const preview = document.getElementById('imagePreview');
    if (preview.src && !preview.src.endsWith('undefined')) {
        preview.style.display = 'block';
    }
};