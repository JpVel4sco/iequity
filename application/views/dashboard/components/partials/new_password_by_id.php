<!-- EDIT PASSWORD FORM -->
<div class="modal fade" id="edit_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Update account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="editpasswordform" action="<?php echo base_url('dashboard/edit_password/'.$account_info->account_no); ?>" method="POST">

                    <!-- ACCOUNT INFO -->
                    <h3 class="fs-5 mb-3">Login credentials</h3>
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Email</label>
                        <div class="input-group input-group-sm">
                            
                            <!-- for display -->
                            <input type="email" name="email" value="<?php echo $account_info->email; ?>" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">New password <span class="text-danger">*</span></label>
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
                    <!-- END OF ACCOUNT INFO -->

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btn-block btn-sm" value="Submit"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF PASSWORD FORM -->

<!-- Focus the input for password and place the cursor at the end -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('edit_password_modal');
    const passwordInput = modal.querySelector('input[name="password"]');

    $('#edit_password_modal').on('shown.bs.modal', function() {
      passwordInput.focus();
      const passwordLength = passwordInput.value.length;
      passwordInput.setSelectionRange(passwordLength, passwordLength);
    });
  });
</script>