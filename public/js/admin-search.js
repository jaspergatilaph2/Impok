$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Search recipient...",
        allowClear: true,
        width: '100%',
        dropdownParent: $('.container') // ✅ Fix for modals/layout issues
    });
});