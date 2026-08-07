const termsCheckbox = document.getElementById("termsCheckbox");
const createAccountBtn = document.getElementById("createAccountBtn");

termsCheckbox.addEventListener("change", function () {

    createAccountBtn.disabled = !this.checked;

});