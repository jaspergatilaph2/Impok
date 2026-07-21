document.addEventListener("DOMContentLoaded", function () {
    const messageModal = document.getElementById("messageModal");

    messageModal.addEventListener("show.bs.modal", function (event) {
        const button = event.relatedTarget;

        // Get data
        const title = button.getAttribute("data-title");
        const message = button.getAttribute("data-message");
        const status = button.getAttribute("data-status");
        const broadcast = button.getAttribute("data-broadcast");

        // Inject into modal
        document.getElementById("modalTitle").textContent = title;
        document.getElementById("modalMessage").textContent = message;
        document.getElementById("modalStatus").textContent = status;
        document.getElementById("modalBroadcast").textContent = broadcast;
    });
});
