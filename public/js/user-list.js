document.getElementById('AdminUserSearchInput').addEventListener('keyup', function () {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll('#userTable tbody tr');

    rows.forEach(row => {
        let name = row.querySelector('.user-name')?.textContent.toLowerCase();
        let email = row.querySelector('.user-email')?.textContent.toLowerCase();

        if (name.includes(value) || email.includes(value)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});