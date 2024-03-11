<!-- TECHNICIAN ASSIGN FORM -->
<div class="modal fade" id="technician_assign_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Assign technician</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/save_selected_technician/'.$ticket_info->ticket_no);?>" method="POST">

                    <input type="hidden" name="email_of_ticket_owner" value="<?php echo $ticket_info->email; ?>">
                    <h3 class="fs-5 mb-3">New technician</h3>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Select <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <select class="form-select form-select-sm" name="selected_technician">
                                <option value="">Select</option>
                                <?php foreach ($technicianData as $row): ?>
                                    <option value="<?php echo $row['fname']." ".$row['lname'];?>"><?php echo $row['fname']." ".$row['lname'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Yes"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Focus the select for technician -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('technician_assign_form');
    const technicianInput = modal.querySelector('select[name="technician"]');

    $('#technician_assign_form').on('shown.bs.modal', function() {
        technicianInput.focus();
    });
  });
</script>