// to open the edit_profile_modal
$(document).ready(function() {
  $('#edit-profile-link').click(function(e) {
      e.preventDefault();
      $('#edit_profile_modal').modal('show');
  });
});

// toggle dropdown
const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))

// initialize aos
AOS.init();

// scrollspy behavior
  const scrollSpy = new bootstrap.ScrollSpy(document.body, {
  target: '#navbar-example'
})

// OPEN MODAL
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

// to open edit ticket form modal
function openEditTicketModal(ticketNo) {
  $('#edit_ticket_form').modal('show');
  
  // You can use the `ticketNo` parameter to perform any necessary actions
}

// See password in the input password in user form for admin only
var passwordField = document.getElementById("password");
var toggleButton = document.getElementById("togglePasswordButton");
toggleButton.addEventListener("click", function () {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleButton.innerHTML = '<span class="bi bi-eye"></span>';
    } else {
        passwordField.type = "password";
        toggleButton.innerHTML = '<span class="bi bi-eye-slash"></span>';
    }
});

function revealPassword() {
    var passwordElement = document.getElementById('password-placeholder');
    passwordElement.innerText = '<?php echo $account_info->password ;?>';
}