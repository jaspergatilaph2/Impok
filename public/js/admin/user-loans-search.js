function setupSearch(inputId) {
    const input = document.getElementById(inputId);
    if (!input) return;

    input.addEventListener('keyup', function () {
        let value = this.value.toLowerCase().trim();

        let container = this.closest('.card-body');
        let rows = container.querySelectorAll('table tbody tr');

        rows.forEach(row => {

            // Skip "No users found"
            if (row.querySelector('td[colspan]')) return;

            let name = row.querySelector('.user-name')?.textContent.toLowerCase() || '';
            let email = row.querySelector('.user-email')?.textContent.toLowerCase() || '';

            if (name.includes(value) || email.includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });
    });
}

// APPLY
setupSearch('userSearch');
setupSearch('userSearchId');
setupSearch('adminSearch');