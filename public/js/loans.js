document.querySelectorAll("form[id^='transactionForm']").forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let userId = this.id.replace("transactionForm", "");
        let alertBox = document.getElementById("alertBox" + userId);
        let actionUrl = this.getAttribute("action");

        fetch(actionUrl, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": this.querySelector('input[name="_token"]')
                    .value,
                Accept: "application/json",
            },
            body: formData,
        })
            .then(async (res) => {
                let data;
                try {
                    data = await res.json();
                } catch {
                    throw new Error("Invalid JSON response");
                }
                return data;
            })
            .then((data) => {
                if (data.success) {
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
                        ${data.message || "Transaction failed"}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                }
            })
            .catch((err) => {
                console.error(err);

                alertBox.innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something went wrong! Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            });
    });
});
