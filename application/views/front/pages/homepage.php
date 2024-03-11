<?php
  // Load the URL helper
  $this->load->helper('url');
?>

<!-- Popups -->
<?php include(APPPATH.'views/dashboard/components/partials/session_popups.php'); ?>

<title>Homepage</title>
    
</head>
<body>

<div class="container sticky-top">
    <div data-aos="fade-down">
        <nav class="navbar navbar-expand-lg bg-white" id="navbar-example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#welcome">
                    <img src="<?php echo base_url();?>assets/images/company_profile/<?php echo $company_info->comp_logo; ?>"  width="120" height="50" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link ms-2 active" href="#about-us" >About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="#our-services">Our services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="#customer-support">Customer support</a>
                        </li>
                    </ul>            
                </div>
                <!-- <div class="toggle-switch">
                    <input type="checkbox" id="dark-mode-toggle" class="toggle-switch-checkbox">
                    <label for="dark-mode-toggle" class="toggle-switch-label"></label>
                    <span id="toggleSwitchLabel"></span>
                </div> -->
            </div>
        </nav>
    </div>
</div>

<div class="container" data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-smooth-scroll="true">
    <div class="my-5 mw-100 mh-100" id="welcome">
        <div class="row">
            <div class="col-sm-8">
                <div class="my-5 py-5 px-3">
                    <div data-aos="fade-right">
                        <h5 class="fs-6">Welcome to <?php echo $company_info->comp_name; ?></h5>
                        <h1 class="fw-bold display-1">Service Desk</h1>
                        <a href="" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#ticket_form">Request</a>
                        
                        <br><br><br><br><br><br><br>
                    
                        <i class="bi bi-facebook me-3 text-primary"> <a href="https://www.facebook.com/profile.php?id=100064238883376&mibextid=ZbWKwL" target="_blank"class="text-decoration-none" style="color:<span id="facebookTextColor"></span>Facebook</a></i><br>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div data-aos="fade-left">
                    <form class="p-4 rounded-4 " novalidate method="post" action="<?php echo base_url('login_controller/process_login');?>">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="password" name="password" id="login-password" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleLoginPasswordButton">
                                    <span class="bi bi-eye-slash"></span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block btn-sm">Login</button>
                        </div>
                        
                        <div class="mt-2 mb-5 text-end text-secondary">
                            <a href="#" id="forgotPasswordLink" class="text-end text-secondary text-decoration-none">Forgot password?</a>
                        </div>

                        <div class="separator mb-5">
                            <p> OR </p>
                        </div>

                        <div class="text-center">
                            <p class="text-secondary">Need an account? <span class="fw-bold"><a href="" class="text-decoration-none text-black" data-bs-toggle="modal" data-bs-target="#regform">SIGN UP</a></span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- INPUT EMAIL FORM FOR FORGET PASSWORD -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('homepage/get_email_message');?>" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="forgotPasswordEmail" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="forgotPasswordEmail" name="email" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END INPUT EMAIL FORM FOR FORGET PASSWORD -->

    <!-- TICKETING FORM -->
    <div class="modal fade" id="ticket_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Ticketing Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="ticket_form" action="<?php echo base_url('homepage/ticket_reg'); ?>" method="POST">
                        
                        <!-- Other inputs required -->
                        <input type="text" name="t_account_type" id="t_account_type" value="user" hidden>
                        <input type="text" name="t_email_verification" id="t_email_verification" value="0" hidden>
                        <input type="text" name="ticket_registration_date" id="t_ticket_registration_date" value="<?php echo date("Y-m-d"); ?>" hidden>
                        <input type="text" name="t_user_registration_date"  id="t_user_registration_date" value="<?php echo date("Y-m-d"); ?>" hidden>

                        <!-- PERSONAL INFO -->
                        <h3 class="fs-5 mb-3">Personal Information</h3>
                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="t_fname" id="t_fname" placeholder="first name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                                        <input type="text" name="t_mname" id="t_mname" placeholder="middle name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$">
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
                                        <input type="text" name="t_lname" id="t_lname" placeholder="last name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                                <input type="email" name="t_email" id="t_email" placeholder="example@mail.com" class="form-control" required>
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
                                <input type="mobile" name="t_mobile" id="t_mobile" class="form-control" required pattern="\d{11}">
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
                                <input type="text" name="t_comp_name" id="t_comp_name" class="form-control" required>
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
                                <input type="address" name="t_comp_address" id="t_comp_address" class="form-control" required>
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
                                <input type="tel" name="t_comp_tel" id="t_comp_tel" class="form-control" required>
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
                                <input type="text" name="t_department" id="t_department" class="form-control" required>
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
                                <input type="mobile" name="t_tin_no" id="t_tin_no" class="form-control" required>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Provide a tin no. or 'n/a' if not applicable.
                                </div>
                            </div>
                        </div>
                        <!-- END OF COMPANY INFO -->

                        <!-- ACCOUNT DETAIL -->
                        <h3 class="fs-5 mb-3 mt-5">Additional Account Information</h3>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="password" name="t_password" id="t_password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordTicketButton">
                                    <span class="bi bi-eye-slash"></span>
                                </button>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Pasword must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter
                                </div>
                            </div>
                        </div>

                        <!-- PRODUCT INFO -->
                        <h3 class="fs-5 mb-3 mt-5">Product information</h3>
                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Model <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="t_model" id="t_model" class="form-control" required>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide the product model
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Serial no. <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="t_serial_no" id="t_serial_no" class="form-control" maxlength="25" required>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide the serial no. and a maximum of 25 characters only
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Delivery receipt no. <span class="text-secondary">(optional)</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="t_dr_no" id="t_dr_no" class="form-control" required>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Type "n/a or none" if not available
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Qty. <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="qty" class="form-control" required pattern="^\d+$">
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Add valid quantity
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Unit <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="unit" class="form-control" required>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Add unit
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Problem <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <textarea name="t_problem" id="t_problem" id="" cols="30" rows="10" class="form-control" required></textarea>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Please state the problem
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Warranty <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="warranty" value="yes">
                                <label class="form-check-label" for="warranty_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="warranty" value="no">
                                <label class="form-check-label" for="warranty_no">
                                    No
                                </label>
                            </div>
                        </div>
                        <!-- END OF PRODUCT INFO -->
                        

                        <!-- TERMS -->
                        <div class="form-check mb-5 p-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="t_invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions  <a href="<?php echo base_url()?>tac" target="_blank" class="text-decoration-none fw-bold text-black">Read</a> <i class="bi bi-question-circle"></i>
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>

                    </form>
                </div>
                <!-- <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- END OF TCIKET FORM -->

    <!-- SIGN UP FORM -->
    <div class="modal fade" id="regform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Registration form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="sign_up" action="<?php echo base_url('homepage/sign_up'); ?>" method="POST">
                        
                        <!-- Other inputs required -->
                        <input type="text" name="user_registration_date"  id="user_registration_date" value="<?php echo date("Y-m-d"); ?>" hidden>

                        <!-- PERSONAL INFO -->
                        <h3 class="fs-5 mb-3">Personal Information</h3>
                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="fname" id="fname" placeholder="First name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                                        <input type="text" name="mname" id="mname" placeholder="Middle name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$">
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
                                        <input type="text" name="lname" id="lname" placeholder="Last name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                                <input type="Email" name="email" id="email" placeholder="example@mail.com" class="form-control" required>
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
                                <input type="tel" name="mobile" id="mobile" class="form-control" required pattern="\d{11}">
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
                                <input type="text" name="comp_name" id="comp_name" class="form-control" required>
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
                                <input type="address" name="comp_address" id="comp_address" class="form-control" required>
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
                                <input type="tel" name="comp_tel" id="comp_tel" class="form-control" required>
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
                                <input type="text" name="department" id="department" class="form-control" required>
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
                                <input type="mobile" name="tin_no" id="tin_no" class="form-control" required>
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
                        <h3 class="fs-5 mb-3 mt-5">Additional Account Information</h3>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="password" name="password" id="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordButton">
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

                        <!-- TERMS -->
                        <div class="form-check mb-5 p-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions  <a href="<?php echo base_url()?>tac" target="_blank" class="text-decoration-none fw-bold text-black">Read</a> <i class="bi bi-question-circle"></i>
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block" id="add">Submit</button>
                        </div>

                    </form>
                </div>
                <!-- <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- END OF SIGN UP FORM -->

    <!-- ABOUT US SECTION -->
    <div class="mw-100 mh-100" id="about-us">
        <div data-aos="fade-up">
            <header class="py-5">
                <div class="p-4 p-lg-5 rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold text-primary">About Us</h1>
                        <p class="fs-4">iEquity Technologies Corporation was established on June 29, 2010, by its  incorporators to serve the small, medium and large business enterprise and to assist them in procuring the best,  appropriate and cost-effective IT equipment solutions</p>
                    </div>
                </div>
            </header>
        </div>

        <div data-aos="fade-up">
            <h3 class="mb-3 fs-3 text-center">Featured projects</h3>
            <div class="row mb-5">
                <div class="col">
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 border-0">
                            <img src="<?php echo base_url();?>assets/images/featured projects/Access Point Set-up and installation.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Access Point Set-up and installation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 border-0">
                            <img src="<?php echo base_url();?>assets/images/featured projects/Floor Mounted Rack Set-up.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Floor Mounted Rack Set-up</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 border-0">
                            <img src="<?php echo base_url();?>assets/images/featured projects/iLab Mac Set-up.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">iLab Mac Set-up</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div data-aos="fade-up" data-aos-delay="400">
                        <div class="card h-100 border-0">
                            <img src="<?php echo base_url();?>assets/images/featured projects/Wallk Mount IDF Installation.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Wall Mount IDF Installation.jpg</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF ABOUT US -->

    <!-- OUR SERVICES -->
    <div class="mh-100 mw-100" id="our-services">
        <div data-aos="fade-up">
            <header class="py-5">
                <div class="p-4 p-lg-5 rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold text-primary">What We Do.</h1>
                        <p class="fs-4">Our Technical Support Personnel will be deployed the next day upon receives of a request call from the client and will be performing the task as follows:</p>
                    </div>
                </div>
            </header>
        </div>

        <div class="row gx-lg-5">
            <div class="col mb-5">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature position-relative top-0 start-50 translate-middle bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-gear-wide-connected"></i></div>
                            <h2 class="fs-4 fw-bold">PHYSICAL MANAGEMENT</h2>
                            <p class="mb-0">Physical Management of computer (Software and Hardware)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-5">
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature position-relative top-0 start-50 translate-middle bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-database-check"></i></div>
                            <h2 class="fs-4 fw-bold">RECOVERY & RESTORATION OF DATA</h2>
                            <p class="mb-0">Plan disaster prevention, recovery and restoration procedures.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature position-relative top-0 start-50 translate-middle bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-cloud-arrow-up"></i></div>
                            <h2 class="fs-4 fw-bold">UPGRADE INFASTRUCTURE</h2>
                            <p class="mb-0">Come up with a proposal on the company's infrastracture for upgrading the existing system.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature position-relative top-0 start-50 translate-middle bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-shield-check"></i></div>
                            <h2 class="fs-4 fw-bold">CCTV, PROJECTOR, LFD TV, BIOMETRICS, DOOR ACCESS AND NETWORK INSTALLATION</h2>
                            <p class="mb-0">We do Site Survey, Planning, Design and Implementation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF SERVICES -->

    <!-- CUSTOMER SUPPORT -->
    <div class="mh-100 mw-100" id="customer-support">
        <header class="py-5">
            <div data-aos="fade-up">
                <div class="p-4 p-lg-5 rounded-3 text-center">
                    <div class="m-3 m-lg-3">
                        <h1 class="display-5 fw-bold text-primary">How can we help you?</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div data-aos="fade-right">
                        <form action="<?php echo base_url('homepage/submit_contact_form');?>" method="post">
                            <div class="p-5 mb-5">
                                <h3 class="fs-5 mb-3 mt">Send us a message</h3>
                                <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="first_name" placeholder="first name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="last_name" placeholder="last name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label fs-6">Email <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="email" name="email" placeholder="example@mail.com" class="form-control">
                                    </div>
                                </div>

                                <h3 class="fs-5 mt-5">What do you need help with? <span class="text-danger">*</span> <span class="text-secondary">(subject)</span></h3>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label fs-6">This helps us make sure you get the right answer as fast as possible</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="subject" class="form-control">
                                    </div>
                                </div>

                                <h3 class="fs-5 mb-3 mt-5">What is your question, comment or issue? <span class="text-danger">*</span> <span class="text-secondary">(message)</span></h3>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label fs-6">This helps us make sure you get the right answer as fast as possible</label>
                                    <div class="input-group input-group-sm">
                                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="12"></textarea>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 mt-5">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div data-aos="fade-left">
                        <h3 class="fs-5 mb-3 mt-5">Contact information</h3>
                        <div class="card h-100 border-0">
                            <img src="<?php echo base_url();?>assets/images/company_profile/<?php echo $company_info->comp_bldg_pic; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>
                                <p class="card-text"><?php echo $company_info->comp_address; ?></p>

                                <hr class="my-4">

                                <h5 class="card-title">Email us at</h5>
                                <p class="card-text"><?php echo $company_info->comp_email; ?></p>

                                <hr class="my-4">

                                <h5 class="card-title">Call us at</h5>
                                <p class="card-text"><i class="bi bi-telephone-fill"> <?php echo $company_info->comp_tel_no; ?></i></p>
                                <p class="card-text"><i class="bi bi-phone-fill"> <?php echo $company_info->contact_no; ?></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>
        <!-- Location of iEquity -->
<footer class="footer py-4 container bg-white" data-aos="fade-up" data-aos-delay="400">
    <div class="mh-100 mw-100" id="Location">
        <header class="py-5">
            <div data-aos="fade-up">
                <div class="p-4 p-lg-5 rounded-3 text-center">
                    <div class="m-3 m-lg-3">
                        <h1 class="display-5 fw-bold text-primary">LOCATION</h1>
                    </div>
                </div>
            </div>
        <iframe class="location-col" width="1100" height="610" src="https://sakay.ph/app/trip?to=14.582355,121.061527" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
</footer>
<script>
    document.getElementById('forgotPasswordLink').addEventListener('click', function() {
        // Show the modal when the link is clicked
        var modal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'));
        modal.show();
    });
</script>

<!-- Focus the input for email -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('forgotPasswordModal');
    const emailInput = modal.querySelector('input[name="email"]');

    $('#forgotPasswordModal').on('shown.bs.modal', function() {
        emailInput.focus();
    });
  });
</script>