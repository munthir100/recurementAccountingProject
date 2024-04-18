document.addEventListener('DOMContentLoaded', function () {
    const removeButtons = document.querySelectorAll('.remove-item-btn');
    removeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.dataset.id;
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15 mx-5">' +
                    '<h4>Are you Sure </h4>' +
                    '<p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this Item</p>' +
                    '</div></div>',
                confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
                confirmButtonText: "delete it",
                cancelButtonClass: "btn btn-danger w-xs mb-1",
                buttonsStyling: false,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form' + itemId).submit();
                }
            });
        });
    });
});