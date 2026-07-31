function downloadPDF() {
    const { jsPDF } = window.jspdf;

    const element = document.getElementById("printArea");

    if (!element) {
        alert("Report content not found.");
        return;
    }

    // 📅 DATE FORMAT
    const today = new Date();
    const formattedDate = today.toISOString().split("T")[0];

    // ✅ GET USER ID FROM TEXT (since no input field exists)
    let userId = "000";
    const idText = document.body.innerText.match(/ID-(\d+)/);
    if (idText) {
        userId = idText[1];
    }

    const fileName = `Wallet_Report_ID-${userId}_${formattedDate}.pdf`;

    html2canvas(element, {
        scale: 2, // better performance than 3
        useCORS: true,
        backgroundColor: "#ffffff"
    }).then((canvas) => {

        const imgData = canvas.toDataURL("image/png");

        const pdf = new jsPDF("p", "mm", "a4");

        const pageWidth = 210;
        const pageHeight = 297;

        const margin = 10;
        const contentWidth = pageWidth - margin * 2;

        const imgHeight = (canvas.height * contentWidth) / canvas.width;

        let position = margin;
        let heightLeft = imgHeight;

        // FIRST PAGE
        pdf.addImage(imgData, "PNG", margin, position, contentWidth, imgHeight);
        heightLeft -= (pageHeight - margin * 2);

        // MULTIPLE PAGES
        while (heightLeft > 0) {
            pdf.addPage();

            position = margin - (imgHeight - heightLeft);

            pdf.addImage(imgData, "PNG", margin, position, contentWidth, imgHeight);

            heightLeft -= (pageHeight - margin * 2);
        }

        pdf.save(fileName);

    }).catch((error) => {
        console.error("PDF generation error:", error);
        alert("Failed to generate PDF.");
    });
}