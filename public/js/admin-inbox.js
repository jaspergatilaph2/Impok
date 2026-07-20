document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('viewMessageModal');

    modal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        // Get data from button
        const title = button.getAttribute('data-title');
        const message = button.getAttribute('data-message');
        const sender = button.getAttribute('data-sender');
        const date = button.getAttribute('data-date');

        // Insert into modal
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalMessage').textContent = message;
        document.getElementById('modalSender').textContent = sender;
        document.getElementById('modalDate').textContent = date;
    });

});