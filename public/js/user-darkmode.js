document.addEventListener('DOMContentLoaded', function () {

    const darkModeToggle = document.getElementById('darkModeToggle');

    // Only users/applicants have the toggle
    if (!darkModeToggle) {
        return;
    }

    // Load saved dark mode
    const darkMode = localStorage.getItem('darkMode');

    if (darkMode === 'enabled') {
        document.body.classList.add('dark-mode');
        darkModeToggle.checked = true;
    }

    // Toggle dark mode
    darkModeToggle.addEventListener('change', function () {

        if (this.checked) {

            document.body.classList.add('dark-mode');

            localStorage.setItem('darkMode', 'enabled');

        } else {

            document.body.classList.remove('dark-mode');

            localStorage.setItem('darkMode', 'disabled');

        }

    });

});