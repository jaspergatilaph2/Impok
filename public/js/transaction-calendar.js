document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("calendar");
    const modalEl = document.getElementById("openDateModal");
    const confirmBtn = document.getElementById("confirmOpenDate");
    const alertBox = document.getElementById("alertBox");

    if (!calendarEl || !modalEl || !confirmBtn || !alertBox) {
        console.error("Missing required elements!");
        return;
    }

    // ✅ ALERT FUNCTION
    function showAlert(type, message) {
        alertBox.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show mt-2" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        setTimeout(() => {
            alertBox.innerHTML = "";
        }, 3000);
    }

    const modal = new bootstrap.Modal(modalEl);
    let selectedDate = null;
    let isSubmitting = false;

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        height: 650,

        // ✅ LOAD EVENTS FROM DATABASE
        events: "{{ route('admin.calendar.eventsCalendar') }}",

        dateClick: function (info) {
            const clickedDate = info.dateStr;

            // ✅ CHECK IF ALREADY SAVED
            const isSaved = calendar.getEvents().some((event) => {
                return (
                    event.start.toISOString().slice(0, 10) === clickedDate &&
                    event.extendedProps?.type === "saved"
                );
            });

            if (isSaved) {
                showAlert(
                    "warning",
                    "This date is already open for transactions."
                );
                return;
            }

            selectedDate = clickedDate;

            // ❌ REMOVE OLD TEMP HIGHLIGHT
            calendar.getEvents().forEach((event) => {
                if (event.extendedProps?.tempHighlight) {
                    event.remove();
                }
            });

            // ❌ REMOVE OLD SELECTED CSS
            document.querySelectorAll(".fc-daygrid-day").forEach((day) => {
                day.classList.remove("selected-date");
            });

            // ✅ ADD SELECTED CSS (BORDER HIGHLIGHT)
            info.dayEl.classList.add("selected-date");

            // ✅ ADD TEMP GRAY BACKGROUND
            calendar.addEvent({
                start: selectedDate,
                end: selectedDate,
                display: "background",
                backgroundColor: "#6c757d",
                borderColor: "#6c757d",
                allDay: true,
                overlap: false,
                extendedProps: {
                    tempHighlight: true,
                },
            });

            document.getElementById("selectedDate").value = selectedDate;
            document.getElementById("selectedDateText").innerText =
                "Open transactions on " + selectedDate + "?";

            modal.show();
        },
    });

    calendar.render();

    // ✅ CONFIRM BUTTON
    confirmBtn.addEventListener("click", function () {
        if (isSubmitting) return;
        isSubmitting = true;

        const date = document.getElementById("selectedDate").value;
        const url = confirmBtn.dataset.url;

        let formData = new FormData();
        formData.append("date", date);

        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: formData,
        })
            .then(async (res) => {
                let text = await res.text();

                try {
                    return JSON.parse(text);
                } catch {
                    throw new Error("Invalid JSON response");
                }
            })
            .then((data) => {
                if (data.success) {
                    modal.hide();

                    // ❌ REMOVE TEMP GRAY
                    calendar.getEvents().forEach((event) => {
                        if (event.extendedProps?.tempHighlight) {
                            event.remove();
                        }
                    });

                    // ❌ REMOVE SELECTED CSS AFTER SAVE
                    document.querySelectorAll(".fc-daygrid-day").forEach((day) => {
                        day.classList.remove("selected-date");
                    });

                    // ✅ FORCE RELOAD EVENTS (GREEN FROM DB)
                    calendar.removeAllEvents();
                    calendar.refetchEvents();

                    showAlert("success", data.message);
                } else {
                    showAlert(
                        "danger",
                        data.message || "Something went wrong."
                    );
                }

                isSubmitting = false;
            })
            .catch((err) => {
                console.error("FETCH ERROR:", err);
                showAlert("danger", "Something went wrong. Please try again.");
                isSubmitting = false;
            });
    });
});