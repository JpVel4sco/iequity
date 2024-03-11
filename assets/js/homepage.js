// initialize aos

AOS.init();


// scrollspy behavior
const scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '#navbar-example'
});


$(document).ready(function() {
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.navbar').addClass('navbar-scrolled');
      $('.navbar-scrolled .nav-link').addClass('text-black');
    } else {
      $('.navbar').removeClass('navbar-scrolled');
      $('.navbar .nav-link').removeClass('text-black');
    }
  });
});

$(document).ready(function() {
  // Change navigation links color on scroll
  $(window).scroll(function() {
    var scrollPos = $(this).scrollTop();
    var windowHeight = $(window).height();

    $('#navbar-example .nav-link').each(function() {
      var refElement = $($(this).attr("href"));
      var refElementTop = refElement.offset().top;
      var refElementBottom = refElementTop + refElement.height();

      if (refElementTop <= (scrollPos + windowHeight / 2) && refElementBottom >= (scrollPos + windowHeight / 2)) {
        $(this).addClass("active-white");
      } else {
        $(this).removeClass("active-white");
      }
    });
  });
});

// real time validation for forms
(() => {
'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
const forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
    }

    form.classList.add('was-validated')
    }, false)

    // Add real-time validation as the user types
    Array.from(form.elements).forEach(field => {
    field.addEventListener('input', () => {
        if (field.checkValidity()) {
        field.classList.remove('is-invalid')
        field.classList.add('is-valid')
        } else {
        field.classList.remove('is-valid')
        field.classList.add('is-invalid')
        }
    })
    })
})
})()

$(document).ready(function() {
var forms = document.querySelectorAll('.needs-validation')

Array.prototype.slice.call(forms)
    .forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        }

        form.classList.add('was-validated')
    }, false)
    })

$('#sign_up_form').submit(function(event) {
    var form = this;
    event.preventDefault();
    event.stopPropagation();

    // Check form validity using bootstrap classes
    if (!form.checkValidity()) {
    $(form).addClass('was-validated');
    return;
    }

    var form_data = $(this).serialize();
    var url = $(this).attr('action');

    $.ajax({
    url: url,
    method: 'POST',
    data: form_data,
    dataType: 'json',
    success: function(response) {
        if (response.success) {
        alert('Registration successful!');
        // redirect to success page or do any other action
        } else {
        alert('Registration failed: ' + response.error);
        }
    },
    error: function(xhr, status, error) {
        alert('Registration failed: ' + error);
    }
    });
});
});

// OPEN MODAL
  document.addEventListener('DOMContentLoaded', function() {
  const regModal = document.getElementById('regform');
  const ticketModal = document.getElementById('ticket_form');
  const fnameReg = document.getElementById('fname');
  const fnameTicket = document.getElementById('t_fname');

  regModal.addEventListener('shown.bs.modal', function() {
    fnameReg.focus();
  });

  ticketModal.addEventListener('shown.bs.modal', function() {
    fnameTicket.focus();
  });
});

// See password in the input password in user form in homepage
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

// See password in the input password in ticket form in homepage
const togglePasswordTicketButton = document.getElementById("togglePasswordTicketButton");
const passwordInput = document.getElementById("t_password");
togglePasswordTicketButton.addEventListener("click", function () {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.querySelector(".bi").classList.toggle("bi-eye");
    this.querySelector(".bi").classList.toggle("bi-eye-slash");
});