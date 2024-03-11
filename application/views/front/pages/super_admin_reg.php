<?php
  // Load the URL helper
  $this->load->helper('url');
?>

<!-- Popups -->
<?php include(APPPATH.'views/dashboard/components/partials/session_popups.php'); ?>

<title>Super admin registration</title>
    
</head>
<body>
    
    <div class="container">
        <span class="fw-bold text-primary fs-1">Create Super Admin</span>
        <br><br>
        <form class="needs-validation mt-1" novalidate id="sign_up" action="<?php echo base_url('homepage/save_super_admin'); ?>" method="POST">
                                
            <!-- Other inputs required -->
            <input type="text" name="user_registration_date"  id="user_registration_date" value="<?php echo date("Y-m-d"); ?>" hidden>

            <!-- PERSONAL INFO -->
            <h3 class="fs-5 mb-3">Personal Information</h3>
            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm">
                            <input type="text" name="fname" placeholder="first name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Please capitalize the first letter.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm">
                            <input type="text" name="mname" placeholder="middle name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Please capitalize the first letter.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm">
                            <input type="text" name="lname" placeholder="last name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Please capitalize the first letter.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Email <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                    <input type="email" name="email" placeholder="example@mail.com" class="form-control" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Enter a valid email address
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Mobile no. <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                    <input type="tel" name="mobile" class="form-control" required pattern="\d{11}">
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Enter a valid mobile no.
                    </div>
                </div>
            </div>
            <!-- END OF PERSONAL INFO -->

            <!-- COMPANY INFO -->
            <h3 class="fs-5 mb-3 mt-5">Company Information</h3>
            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Company name <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                    <input type="text" name="comp_name" class="form-control" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Provide a company name or 'n/a' if not applicable.
                    </div>
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Address <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                    <input type="address" name="comp_address" class="form-control" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Provide a company address or 'n/a' if not applicable.
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Telephone <span class="text-secondary">(optional)</span></label>
                <div class="input-group input-group-sm">
                    <input type="tel" name="comp_tel" class="form-control" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Provide a company telephone or 'n/a' if not applicable.
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Department <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                    <input type="text" name="department" class="form-control" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Provide a company department or 'n/a' if not applicable.
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-label fs-6">Tin no. <span class="text-secondary">(optional)</span></label>
                <div class="input-group input-group-sm">
                    <input type="mobile" name="tin_no" class="form-control" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Provide a Tin no or 'n/a' if not applicable.
                    </div>
                </div>
            </div>
            <!-- END OF COMPANY INFO -->

            <!-- ACCOUNT DETAIL -->
            <h3 class="fs-5 mb-3 mt-5">Additional Acccount Information</h3>
            <div class="form-group mb-3">
                <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                    <input type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="login-password">
                    <button class="btn btn-outline-secondary" type="button" id="toggleLoginPasswordButton">
                        <span class="bi bi-eye-slash"></span>
                    </button>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                    <div class="invalid-feedback">
                        Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter
                    </div>
                </div>
            </div>
            <!-- END OF ACCOUNT DETAIL -->
            
            <br><br>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block" id="add">Submit</button>
            </div>

        </form>
    </div>
    <script>
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
</script>