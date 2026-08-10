// document.getElementById('userSearch').addEventListener('keyup', function () {
//     let value = this.value.toLowerCase().trim();
//     let rows = document.querySelectorAll('table tbody tr');

//     rows.forEach(row => {
//         let name = row.querySelector('.user-name')?.textContent.toLowerCase() || '';
//         let first = row.querySelector('.user-first')?.textContent.toLowerCase() || '';
//         let last = row.querySelector('.user-last')?.textContent.toLowerCase() || '';
//         let email = row.querySelector('.user-email')?.textContent.toLowerCase() || '';

//         if (
//             name.includes(value) ||
//             first.includes(value) ||
//             last.includes(value) ||
//             email.includes(value)
//         ) {
//             row.style.display = '';
//         } else {
//             row.style.display = 'none';
//         }
//     });
// });

document.getElementById('adminSearch').addEventListener('keyup', function () {
    let value = this.value.toLowerCase().trim();
    let rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
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