const openTransactionDates = @json($openTransactionDates);

    document.addEventListener('DOMContentLoaded', function () {

        const input = document.getElementById(
            'transaction_date_{{ $user->id }}'
        );

        const status = document.getElementById(
            'transaction_status_{{ $user->id }}'
        );

        function checkTransactionDate() {

            // Get today's date in YYYY-MM-DD format
            const today = new Date();

            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');

            const todayString = `${year}-${month}-${day}`;

            // Find an open date that has arrived
            const availableDate = openTransactionDates.find(date => {
                return date <= todayString;
            });

            if (availableDate) {

                input.disabled = false;

                // Set the available date
                input.value = availableDate;

                status.textContent = 'Transaction date is now available.';
                status.classList.remove('text-muted');
                status.classList.add('text-success');

            } else {

                input.disabled = true;

                status.textContent =
                    'Transaction date is not yet available.';
            }
        }

        checkTransactionDate();

        // Check again every minute
        setInterval(checkTransactionDate, 60000);
    });