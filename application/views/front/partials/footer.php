<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<!-- toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- animate on scroll -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="<?php base_url()?>assets/js/homepage.js"></script>

<!-- dark mode -->
<script src="<?php base_url()?>assets/js/darkmode.js"></script>

<!-- Show password in Homepage Login Password input -->
<script>
const loginPasswordField = document.getElementById("login-password");
const loginTogglePasswordButton = document.getElementById("toggleLoginPasswordButton");

loginTogglePasswordButton.addEventListener("click", function () {
    if (loginPasswordField.type === "password") {
        loginPasswordField.type = "text";
        loginTogglePasswordButton.innerHTML = '<span class="bi bi-eye"></span>';
    } else {
        loginPasswordField.type = "password";
        loginTogglePasswordButton.innerHTML = '<span class="bi bi-eye-slash"></span>';
    }
});
</script>

</body>
</html>