function downloadPDF() {
    const { jsPDF } = window.jspdf;

    const element = document.getElementById("printArea");

    if (!element) {
        alert("Report content not found.");
        return;
    }


    const today = new Date();
    const formattedDate = today.toISOString().split("T")[0];


    const userIdInput = document.getElementById("userId");
    const userId = userIdInput ? userIdInput.value : "000";

    const fileName = `Wallet_Loans_ID-${userId}_${formattedDate}.pdf`;


    html2canvas(element, {
        scale: 3, 
        useCORS: true,
        logging: false,
    })
        .then((canvas) => {
            const imgData = canvas.toDataURL("image/png");

            const pdf = new jsPDF("p", "mm", "a4");

            // PAGE SETTINGS
            const pageWidth = 210;
            const pageHeight = 297;

            const margin = 10; // professional margin
            const contentWidth = pageWidth - margin * 2;

            const imgHeight = (canvas.height * contentWidth) / canvas.width;

            let heightLeft = imgHeight;
            let position = margin;

            pdf.addImage(
                imgData,
                "PNG",
                margin,
                position,
                contentWidth,
                imgHeight,
            );
            heightLeft -= pageHeight - margin * 2;

            while (heightLeft > 0) {
                pdf.addPage();
                position = margin - (imgHeight - heightLeft);

                pdf.addImage(
                    imgData,
                    "PNG",
                    margin,
                    position,
                    contentWidth,
                    imgHeight,
                );

                heightLeft -= pageHeight - margin * 2;
            }

            pdf.save(fileName);
        })
        .catch((error) => {
            console.error("PDF generation error:", error);
            alert("Failed to generate PDF. Please try again.");
        });
}
