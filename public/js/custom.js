function togglePasswordVisibility(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);

    if (passwordInput && toggleIcon) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.add("fa-eye");
            toggleIcon.classList.remove("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.add("fa-eye-slash");
            toggleIcon.classList.remove("fa-eye");
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Product name word limit
    const productName = document.getElementById("product_name");
    if (productName) {
        productName.addEventListener("input", function () {
            let words = this.value.trim().split(/\s+/);
            if (words.length > 10) {
                this.value = words.slice(0, 10).join(" ");
            }
        });
    }

    // Definition word limit
    const definition = document.getElementById("floatingTextarea");
    if (definition) {
        definition.addEventListener("input", function () {
            let words = this.value.trim().split(/\s+/);
            if (words.length > 40) {
                this.value = words.slice(0, 40).join(" ");
            }
        });
    }

    // Price input formatting
    const priceInput = document.getElementById("price");
    if (priceInput) {
        priceInput.addEventListener("input", function () {
            let value = this.value;

            value = value.replace(/[^0-9.]/g, "");
            let parts = value.split(".");

            if (parts.length > 2) {
                parts = [parts[0], parts[1]];
            }

            if (parts[0].length > 6) {
                parts[0] = parts[0].slice(0, 6);
            }

            if (parts[1]) {
                parts[1] = parts[1].slice(0, 2);
            }

            value = parts.join(".");

            let digitsOnly = value.replace(".", "");
            if (digitsOnly.length > 8) {
                digitsOnly = digitsOnly.slice(0, 8);
                if (parts.length === 2) {
                    value =
                        digitsOnly.slice(0, digitsOnly.length - 2) +
                        "." +
                        digitsOnly.slice(-2);
                } else {
                    value = digitsOnly;
                }
            }

            this.value = value;
        });
    }
});
