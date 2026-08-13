function setupSearch(inputId) {
    const input = document.getElementById(inputId);

    if (!input) return;

    input.addEventListener('keyup', function () {
        let value = this.value.toLowerCase().trim();

        let container = this.closest('.card-body');
        let rows = container.querySelectorAll('table tbody tr');

        rows.forEach(row => {

            // ❗ Skip "No users found" row
            if (row.querySelector('td[colspan]')) return;

            let name = row.querySelector('.user-name')?.textContent.toLowerCase() || '';
            let first = row.querySelector('.user-first')?.textContent.toLowerCase() || '';
            let last = row.querySelector('.user-last')?.textContent.toLowerCase() || '';
            let email = row.querySelector('.user-email')?.textContent.toLowerCase() || '';

            if (
                name.includes(value) ||
                first.includes(value) ||
                last.includes(value) ||
                email.includes(value)
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });
    });
}

//APPLY TO ALL SEARCH INPUTS
setupSearch('userSearch');     // this table
setupSearch('userSearchId');   // other table
setupSearch('adminSearch');    // admin table