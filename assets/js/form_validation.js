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