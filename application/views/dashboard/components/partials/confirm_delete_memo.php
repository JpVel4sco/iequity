<!-- TICKETING FORM -->
<div class="modal fade" id="confirm_delete_memo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Are you sure to delete this memo?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/delete_memo/'.$memo->memo_id); ?>" method="POST">

                    <input type="hidden" name="ticket_no" value="<?php echo $t_no; ?>">

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Yes"/>
                        <button type="button" class="btn btn-sm btn-dark" data-bs-dismiss="modal">No</button>
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
    const modal = document.getElementById('confirm_delete_memo');
    const submitbutton = modal.querySelector('input[type="submit"]');

    $('#confirm_delete_invoice').on('shown.bs.modal', function() {
        submitbutton.focus();
    });
  });
</script>