document.addEventListener('DOMContentLoaded', function () {
    const message = document.body.dataset.flashMessage;
    const type = document.body.dataset.flashType;

    if (message && type === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: message,
            confirmButtonColor: '#15803d'
        });
    }
});