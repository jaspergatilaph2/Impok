function openImagePreview(src) {
    document.getElementById('previewImg').src = src;
    document.getElementById('imagePreviewModal').style.display = 'flex';
}

function closeImagePreview() {
    document.getElementById('imagePreviewModal').style.display = 'none';
}

// Preview uploaded image instantly
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('uploadedAvatar').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}