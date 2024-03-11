<!-- TICKETING FORM -->
<div class="modal fade" id="parts_and_mats_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Parts / Material charges form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ticket_form" action="<?php echo base_url('dashboard/add_parts_and_mats/'.$ticket_info->ticket_no); ?>" method="POST" class="needs-validation" novalidate>
                
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Description</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="description" class="form-control">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add description
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Qty.</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="qty" class="form-control" pattern="^\d+$">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add valid quantity
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Unit</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="unit" class="form-control">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add unit
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Price</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="price" class="form-control" pattern="^[\d, .]+$">
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add valid price
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

<!-- Focus the input for fname -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('parts_and_mats_form');
    const descriptionInput = modal.querySelector('input[name="description"]');

    $('#parts_and_mats_form').on('shown.bs.modal', function() {
        descriptionInput.focus();
    });
  });
</script>