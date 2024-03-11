<!-- TICKETING FORM -->
<div class="modal fade" id="ticket_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Ticketing Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="ticket_form" action="<?php echo base_url('dashboard/ticket_reg'); ?>" method="POST">
                    
                    <!-- Current location -->
                    <input type="hidden" name="previous_url" value="">

                    <!-- Other inputs required -->
                    <input type="text" name="ticket_registration_date" id="t_ticket_registration_date" value="<?php echo date("Y-m-d"); ?>" hidden>

                    <!-- PERSONAL INFO -->
                    <h3 class="fs-5 mb-3">Personal Information</h3>
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>

                        <!-- looping of userinfo -->
                        <?php foreach ($user_info as $u_data): ?>

                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="t_fname" id="t_fname" placeholder="first name" value="<?php echo $u_data['fname']; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please capitalize the first letter
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="t_mname" id="t_mname" placeholder="middle name" value="<?php echo $u_data['mname']; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$">
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
                                    <input type="text" name="t_lname" id="t_lname" placeholder="last name" value="<?php echo $u_data['lname']; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required>
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
                            <input type="email" name="t_email" id="t_email" placeholder="example@mail.com" value="<?php echo $u_data['email']; ?>" class="form-control" required>
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
                            <input type="mobile" name="t_mobile" id="t_mobile" value="<?php echo $u_data['mobile']; ?>" class="form-control" required pattern="\d{11}">
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
                            <input type="text" name="t_comp_name" id="t_comp_name" value="<?php echo $u_data['comp_name']; ?>" class="form-control" required>
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
                            <input type="address" name="t_comp_address" id="t_comp_address" value="<?php echo $u_data['comp_address']; ?>" class="form-control" required>
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
                            <input type="tel" name="t_comp_tel" id="t_comp_tel" value="<?php echo $u_data['comp_tel']; ?>" class="form-control" required>
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
                            <input type="text" name="t_department" id="t_department" value="<?php echo $u_data['department']; ?>" class="form-control" required>
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
                            <input type="mobile" name="t_tin_no" id="t_tin_no" value="<?php echo $u_data['tin_no']; ?>" class="form-control" required>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Provide a tin no. or 'n/a' if not applicable.
                            </div>
                        </div>
                    </div>
                    <!-- END OF COMPANY INFO -->

                    <!-- end of u_data looping -->
                    <?php endforeach; ?>

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

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-sm btn-primary btn-block" value="Submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF TCIKET FORM -->

<!-- Focus input for t_model -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ticketFormModal = document.getElementById('ticket_form');
        const tModelInput = ticketFormModal.querySelector('#t_model');

        ticketFormModal.addEventListener('shown.bs.modal', function() {
            tModelInput.focus();
        });
    });
</script>