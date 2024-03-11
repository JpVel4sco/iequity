<!-- TECHNICIAN ASSIGN FORM -->
<div class="modal fade" id="diagnose_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Memo form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/save_diagnose/'.$ticket_info->ticket_no);?>" method="POST" enctype="multipart/form-data">
                    <h3 class="fs-5 mb-3">Update about the service</h3>
                    
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Reported problem <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <textarea name="problem" cols="30" rows="3" class="form-control" required><?php echo $ticket_info->t_problem; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <label for="" class="form-label fs-6">Description <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <textarea name="repair_solution" cols="30" rows="3" class="form-control" required></textarea>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add repair solution
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <label for="" class="form-label fs-6">Accessories <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="accessories" class="form-control" required>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add accessories
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <label for="" class="form-label fs-6">Attachments</label>
                        <p class="text-danger">Note: <span class="text-secondary"> It can only upload the files like PDF, JPEG, JPG, PNG, PPT, PPTX, DOC, DOCX, zip or 7z files</span></p>
                        <div class="input-group input-group-sm">
                            <input type="file" name="attachments[]" class="form-control" accept=".pdf, .jpeg, .jpg, .png, .ppt, .pptx, .doc, .docx, .zip, .7z" multiple>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Please upload PDF, JPEG, JPG, PNG, PPT, PPTX, DOC, or DOCX files.
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Status <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="repaired" required>
                            <label class="form-check-label" for="Repair">
                                Repaired
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="on-progress" required>
                            <label class="form-check-label" for="On-progress">
                                On-progress
                            </label>
                        </div>
                    </div>

                    <input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" hidden>

                    <div class="d-grid">
                        <input id="submit-btn" type="submit" class="btn btn-sm btn-primary w-100" value="Submit"/>
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