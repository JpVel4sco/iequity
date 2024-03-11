<!-- TICKETING FORM -->
<div class="modal fade" id="confirm_create_mr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">MR Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="<?php echo base_url('dashboard/create_mr/'.$ticket_info->ticket_no); ?>" method="POST" id="mr_form">

                    <input type="hidden" name="serial_no" value="<?php $ticket_info->t_serial_no; ?>">

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Remarks <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <textarea name="remarks" cols="30" rows="5" class="form-control" required></textarea>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add remarks
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Accessories</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="accessories_input" class="form-control" id="accessories_input">
                            <button class="btn btn-sm btn-primary" id="add-accessory-btn" type="button">Add</button>
                            <div class="valid-feedback">
                            Okay!
                            </div>
                            <div class="invalid-feedback">
                            Add accessories
                            </div>
                        </div>

                        <div class="d-none input-group input-group-sm mt-1">
                            <textarea id="accessories_list" name="accessories_list" cols="30" rows="3" class="form-control" readonly required></textarea>
                        </div>
                        <div class="input-group input-group-sm mt-1" id="remove-accessories-container">
                            <!-- Remove buttons will be dynamically added here -->
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Prepared by <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="prepared_by" class="form-control" required>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add prepared by
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Received by</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="received_by" class="form-control" >
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add received by
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Status <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="PULL-OUT" required>
                            <label class="form-check-label" for="PULL-OUT">
                                Pull-out
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="RETURN" required>
                            <label class="form-check-label" for="RETURN">
                                Return
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="COMPLETION" required>
                            <label class="form-check-label" for="COMPLETION">
                                Completion
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="ISSUANCE" required>
                            <label class="form-check-label" for="ISSUANCE">
                                Issuance
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="RECEIVE" required>
                            <label class="form-check-label" for="RECEIVE">
                                Receive
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Submit"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF TCIKET FORM -->

<!-- Focus the button for submit button -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('confirm_create_invoice');
    const submitbutton = modal.querySelector('input[type="submit"]');

    $('#confirm_create_invoice').on('shown.bs.modal', function() {
        submitbutton.focus();
    });
  });
</script>
