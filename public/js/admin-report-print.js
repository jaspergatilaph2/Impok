function printTable() {
    const element = document.getElementById("printArea");

    if (!element) {
        alert("Print content not found.");
        return;
    }

    // Clone content so original is untouched
    const clone = element.cloneNode(true);

    // 🔹 HIDE PROFILE COLUMN (optional, same as PDF)
    const headerCells = clone.querySelectorAll("thead th:nth-child(1)");
    const bodyCells = clone.querySelectorAll("tbody td:nth-child(1)");

    headerCells.forEach((cell) => (cell.style.display = "none"));
    bodyCells.forEach((cell) => (cell.style.display = "none"));

    const printWindow = window.open("", "", "width=900,height=650");

    printWindow.document.write(`
        <html>
            <head>
                <title>Print Report</title>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

                <style>
                    body {
                        padding: 20px;
                        font-size: 12px;
                    }

                    .header {
                        text-align: center;
                        margin-bottom: 10px;
                    }

                    .header img {
                        position: absolute;
                        left: 20px;
                        top: 20px;
                        width: 60px;
                    }

                    .header h6, .header p {
                        margin: 0;
                        line-height: 1.2;
                    }

                    .line {
                        border-top: 1px solid #000;
                        margin-top: 10px;
                        margin-bottom: 15px;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th, td {
                        border: 1px solid #000;
                        padding: 5px;
                        text-align: left;
                    }

                    @media print {
                        body {
                            -webkit-print-color-adjust: exact;
                        }
                    }
                </style>
            </head>

            <body>

                <!-- HEADER -->
                <div class="header">
                    <img src="/images/Logo1.png" />

                    <p>Republic of the Philippines</p>
                    <h6><strong>Province of Southern Leyte</strong></h6>
                    <p>MUNICIPALITY OF LIBAGON</p>
                    <p>Nahulid, Libagon, Southern Leyte</p>
                    
                    <div class="line"></div>
                </div>

                ${clone.innerHTML}

            </body>
        </html>
    `);

    printWindow.document.close();

    // 🔹 WAIT FOR IMAGES & STYLES TO LOAD
    printWindow.onload = function () {
        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 500); // delay ensures rendering is complete
    };
}
