document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const carId = this.getAttribute('data-car-id');

            fetch(`/api/car/delete`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: carId })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ошибка при удалении');
                    }
                    return "Удалено";
                })
                .then(data => {
                    this.closest('.product-card-container').remove();
                })
                .catch(error => {
                    alert(error.message);
                });
        });
    });
});