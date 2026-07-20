function printTable() {
    let content = document.getElementById('printArea').innerHTML;

    let printWindow = window.open('', '', 'width=900,height=650');

    printWindow.document.write(`
        <html>
            <head>
                <title>Print Report</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                <style>
                    body { padding: 20px; font-size: 12px; }
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #000; padding: 5px; }
                    img { width: 40px; height: 40px; }
                </style>
            </head>
            <body>
                ${content}
            </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();

    // wait for content to load before printing
    printWindow.onload = function() {
        printWindow.print();
        printWindow.close();
    };
}