function AllLoansdownloadPDF() {
    const { jsPDF } = window.jspdf;

    const element = document.getElementById("printArea");

    if (!element) {
        alert("Report content not found.");
        return;
    }

    // HIDE PROFILE COLUMN
    const headerCells = element.querySelectorAll("thead th:nth-child(1)");
    const bodyCells = element.querySelectorAll("tbody td:nth-child(1)");

    headerCells.forEach(cell => cell.style.display = "none");
    bodyCells.forEach(cell => cell.style.display = "none");

    const today = new Date();
    const formattedDate = today.toLocaleDateString();
    const fileName = `Users_Loans_Report_${today.toISOString().split("T")[0]}.pdf`;

    const logo = new Image();
    logo.src = "/images/Logo1.png";

    logo.onload = function () {

        html2canvas(element, {
            scale: 3,
            useCORS: true,
            logging: false,
        })
        .then((canvas) => {

            const imgData = canvas.toDataURL("image/png");
            const pdf = new jsPDF("p", "mm", "a4");

            const pageWidth = 210;
            const pageHeight = 297;
            const margin = 15;

            const contentWidth = pageWidth - margin * 2;
            const imgHeight = (canvas.height * contentWidth) / canvas.width;

            let heightLeft = imgHeight;
            let position;
            let pageNumber = 1;

            //FUNCTION TO DRAW HEADER
            const drawHeader = () => {
                const logoWidth = 20;
                const logoHeight = 20;
                const logoX = margin;
                const logoY = 8;

                // Logo
                pdf.addImage(logo, "PNG", logoX, logoY, logoWidth, logoHeight);

                const centerX = pageWidth / 2;
                let y = logoY + 5;

                // Header Text
                pdf.setFont("helvetica", "normal");
                pdf.setFontSize(10);
                pdf.text("Republic of the Philippines", centerX, y, { align: "center" });

            
                y += 5;
                pdf.setFontSize(10);
                pdf.text("Province of Southern Leyte", centerX, y, { align: "center" });

                y += 5;
                pdf.setFont("helvetica", "normal");
                pdf.text("MUNICIPALITY OF LIBAGON", centerX, y, { align: "center" });

                y += 5;
                pdf.text("Nahulid, Libagon, Southern Leyte", centerX, y, { align: "center" });

                // Optional right-side box
                pdf.rect(pageWidth - margin - 40, logoY + 5, 35, 12);

                // Line separator
                y += 4;
                pdf.setLineWidth(0.5);
                pdf.line(margin, y, pageWidth - margin, y);

                return y + 6; // return content start Y
            };

            // FIRST PAGE
            let contentY = drawHeader();

            position = contentY;

            pdf.addImage(imgData, "PNG", margin, position, contentWidth, imgHeight);

            // Footer
            pdf.setFontSize(9);
            pdf.text(`Page ${pageNumber}`, pageWidth - 25, pageHeight - 10);

            heightLeft -= (pageHeight - contentY - margin);

            // MULTI PAGE
            while (heightLeft > 0) {
                pdf.addPage();
                pageNumber++;

                contentY = drawHeader();

                position = contentY - (imgHeight - heightLeft);

                pdf.addImage(imgData, "PNG", margin, position, contentWidth, imgHeight);

                // Footer
                pdf.setFontSize(9);
                pdf.text(`Page ${pageNumber}`, pageWidth - 25, pageHeight - 10);

                heightLeft -= (pageHeight - contentY - margin);
            }

            pdf.save(fileName);
        })
        .catch((error) => {
            console.error("PDF generation error:", error);
            alert("Failed to generate PDF. Please try again.");
        })
        .finally(() => {
            // RESTORE PROFILE COLUMN
            headerCells.forEach(cell => cell.style.display = "");
            bodyCells.forEach(cell => cell.style.display = "");
        });
    };
}