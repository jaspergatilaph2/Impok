function checkPasswordStrength(password) {
    const bar = document.getElementById("passwordStrengthBar");
    const text = document.getElementById("passwordStrengthText");

    let strength = 0;

    // Length
    if (password.length >= 8) {
        strength++;
    }

    // Lowercase
    if (/[a-z]/.test(password)) {
        strength++;
    }

    // Uppercase
    if (/[A-Z]/.test(password)) {
        strength++;
    }

    // Number
    if (/[0-9]/.test(password)) {
        strength++;
    }

    // Special character
    if (/[^A-Za-z0-9]/.test(password)) {
        strength++;
    }

    // Empty
    if (password.length === 0) {
        bar.style.width = "0%";
        text.textContent = "Enter a password";
        text.className = "text-muted";
        return;
    }

    // Weak
    if (strength <= 2) {
        bar.style.width = "33%";
        bar.className = "progress-bar bg-danger";

        text.textContent = "Weak password";
        text.className = "text-danger";
    }

    // Medium
    else if (strength <= 4) {
        bar.style.width = "66%";
        bar.className = "progress-bar bg-warning";

        text.textContent = "Medium password";
        text.className = "text-warning";
    }

    // Strong
    else {
        bar.style.width = "100%";
        bar.className = "progress-bar bg-success";

        text.textContent = "Strong password";
        text.className = "text-success";
    }
}
