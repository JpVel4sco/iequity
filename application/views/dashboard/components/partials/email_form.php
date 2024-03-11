<!-- EMAIL FORM -->
<div class="modal fade" id="email_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Compose email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="<?php echo base_url('dashboard/compose_email/'.$ticket_info->ticket_no); ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">To<span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="email" class="form-control" required value="<?php echo $ticket_info->email;?>" disabled/>
                            <!--  -->
                            <input type="hidden" name="receiver" class="form-control d-none" required value="<?php echo $ticket_info->email;?>"/>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add a receiver
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Subject <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input name="subject" class="form-control" required />
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add a subject
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Message <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <textarea name="message" cols="30" rows="5" class="form-control" required></textarea>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add message
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Attachment <span class="text-secondary">(PDF and Word file only)</span></label>
                        <div class="input-group input-group-sm">
                            <input type="file" name="attachment[]" class="form-control" accept=".pdf, .doc, .docx" multiple />
                            <!-- <input type="file" name="attachment" class="form-control" accept=".pdf, .jpeg, .jpg, .png, .ppt, .pptx, .doc, .docx, .zip, .7z"/> -->
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add attachment
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Send"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF EMAIL FORM -->

<!-- Focus the button for submit button -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('email_form');
    const submitbutton = modal.querySelector('input[type="submit"]');

    $('#email_form').on('shown.bs.modal', function() {
        submitbutton.focus();
    });
  });
</script>