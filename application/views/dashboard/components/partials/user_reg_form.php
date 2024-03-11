<!-- SIGN UP FORM -->
<div class="modal fade" id="regform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Registration form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="sign_up" action="<?php echo base_url('dashboard/sign_up'); ?>" method="POST">
                    
                    <!-- Current location -->
                    <input type="hidden" name="previous_url" value="">

                    <!-- Other inputs required -->
                    <input type="text" name="user_registration_date"  id="user_registration_date" value="<?php echo date("Y-m-d"); ?>" hidden>

                    <!-- PERSONAL INFO -->
                    <h3 class="fs-5 mb-3">Personal Information</h3>
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="fname" placeholder="First Name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                                    <input type="text" name="mname" placeholder="Middle Name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$">
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
                                    <input type="text" name="lname" placeholder="Last Name" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                                Please input your company name
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
                                Enter the company address
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
                                Type "n/a or none" if not available
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
                                Please enter your department
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
                                Type "n/a or none" if not available
                            </div>
                        </div>
                    </div>
                    <!-- END OF COMPANY INFO -->

                    <!-- ACCOUNT DETAIL -->
                    <h3 class="fs-5 mb-3 mt-5">Additional Account Information</h3>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Account type <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <?php if ($user_info_alt['account_type'] == 'admin'): ?>
                                <select class="form-select form-select-sm" name="account_type" required>
                                    <option>Select</option>
                                    <option value="Technical Support">Technical support</option>
                                    <option value="Technical">Technical</option>
                                    <option value="User">User</option>
                                </select>
                            <?php else: ?>
                                <select class="form-select form-select-sm" name="account_type" required>
                                    <option>Select</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Technical Support">Technical support</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Service Support">Service support</option>
                                    <option value="Service">Service</option>
                                    <option value="User">User</option>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>
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

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btn-sm btn-block" id="add">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF SIGN UP FORM -->

<!-- Focus the input for fname -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('regform');
    const fnameInput = modal.querySelector('input[name="fname"]');

    $('#regform').on('shown.bs.modal', function() {
      fnameInput.focus();
    });
  });
</script>