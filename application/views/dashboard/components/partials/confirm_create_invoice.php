<!-- TICKETING FORM -->
<div class="modal fade" id="confirm_create_invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Confirm to create service invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/create_invoice/'.$ticket_info->ticket_no); ?>" method="POST">

                    <input type="hidden" name="checked_by" value="<?php echo $ticket_info->t_technical_assigned;?>">
                    <input type="hidden" name="released_by" value="<?php echo $ticket_info->fname." ".$ticket_info->lname;?>">
                    <input type="hidden" name="serial_no" value="<?php echo $ticket_info->t_serial_no;?>">

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Yes"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
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