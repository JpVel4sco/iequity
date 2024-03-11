<!-- TICKETING FORM -->
<div class="modal fade" id="labor_and_charges_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Labor and Other charges</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ticket_form" action="<?php echo base_url('dashboard/add_labor_and_other_charges/'.$ticket_info->ticket_no); ?>" method="POST" class="needs-validation" novalidate>
                
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Charges <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="charges" class="form-control">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add charges
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Amount</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="amount" class="form-control" pattern="^[\d, .]+$">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add valid amount
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-sm btn-primary btn-block" value="Submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF TCIKET FORM -->

<!-- Focus the input for charges -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('labor_and_charges_form');
    const chargesInput = modal.querySelector('input[name="charges"]');

    $('#labor_and_charges_form').on('shown.bs.modal', function() {
        chargesInput.focus();
    });
  });
</script>