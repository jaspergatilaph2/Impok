document.querySelectorAll("form[id^='transactionForm']").forEach(form => {

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let userId = this.id.replace('transactionForm', '');
        let alertBox = document.getElementById('alertBox' + userId);

        fetch(this.action, {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {

            if (data.success) {

                // ✅ SUCCESS MESSAGE (FROM YOUR JSON)
                alertBox.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${data.message}<br>
                        <strong>New Balance:</strong> ₱${data.new_balance}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;

                form.reset();

                setTimeout(() => {
                    location.reload();
                }, 2000);

            } else {

                alertBox.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
            }

        })
        .catch(err => {
            console.error(err);

            alertBox.innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something went wrong!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
        });

    });

});