lucide.createIcons();

document.querySelectorAll(".toggle-password").forEach(button => {

    button.addEventListener("click", () => {

        const input = document.getElementById(button.dataset.target);

        const icon = button.querySelector("svg");

        if(input.type === "password"){

            input.type = "text";

            icon.setAttribute("data-lucide","eye-off");

        }else{

            input.type = "password";

            icon.setAttribute("data-lucide","eye");

        }

        lucide.createIcons();

    });

});