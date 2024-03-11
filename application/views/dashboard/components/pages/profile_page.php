<title>My Profile</title>
</head>
<body class="bg-dark-subtle">

<!-- Popups -->
<?php include(APPPATH.'views/dashboard/components/partials/session_popups.php'); ?>

<!-- topnav -->
<nav class="navbar sticky-top bg-white m-3 p-0 shadow-sm rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="background-color: transparent;">
                <i class="bi bi-list"></i>
            </button>
            Summary of your profile
        </a>

        <div class="dropdown">
             <?php foreach ($user_info as $u_data): ?>
                <span class="text-secondary"><?php echo $u_data['account_type']; ?> | </span><span class="fw-bold text-black"><?php echo $u_data['fname'].' '.$u_data['lname']; ?></span>
            <?php endforeach; ?>
        </div>

    </div>
</nav>
<!-- end of topnav -->

<!-- monitoring -->
<div class="container-fluid px-3">
    Edit profile form

    <?php foreach($user_info as $u_data):?>
        <?php if($u_data['account_type'] ): ?>
            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit_password_if_admin">New password <i class="bi bi-pencil-square"></i></button>
        <?php endif;?>
    <?php endforeach; ?>

    <?php if ($account_management->delete_account == "Yes"): ?>
        <?php foreach ($user_info as $u_data): ?>
            <?php if ($u_data['account_type'] == 'admin' || $u_data['account_type'] == 'super admin'): ?>
                <button class="d-none btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_account">Delete account <i class="bi bi-trash"></i></button>
            <?php else: ?>
                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_account">Delete account <i class="bi bi-trash"></i></button>
            <?php endif;?>
        <?php endforeach; ?>
    <?php else: ?>
        <button class="d-none btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_account">Delete account <i class="bi bi-trash"></i></button>
    <?php endif; ?>


    <form action="<?php echo base_url('dashboard/update_user_profile') ; ?>" method="post" class="needs-validation" novalidate>
        <?php foreach ($user_info as $account_info): ?>
            <input type="hidden" class="d-none" name="account_no" value="<?php echo $account_info['account_no']; ?>">
            <div class="row my-2 p-1">
                <div class="col p-3 bg-white m-2 rounded shadow-sm">
                    <span class="fw-bold text-primary fs-5">Contact information</span>
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="fname" placeholder="first name" value="<?php echo $account_info['fname']; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please capitalize the first letter.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="mname" placeholder="middle name" value="<?php echo $account_info['mname']; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please capitalize the first letter.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="lname" placeholder="last name" value="<?php echo $account_info['lname']; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required >
                                    <div class="valid-feedback">
                                        Looks good!
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
                            <!-- <input type="email" name="email" value="<?php echo $account_info['email']; ?>" class="form-control" <?php if ($account_info['account_type'] != 'admin' && $account_info['account_type'] != 'super admin') { echo ' disabled'; } ?> /> -->

                            <!-- this email input is currently in use to disable the editing of email due to error in other functions that is connected and based on the email -->
                            <input type="email" name="email" value="<?php echo $account_info['email']; ?>" class="form-control" disabled/>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Mobile no. <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="mobile" name="mobile" value="<?php echo $account_info['mobile']; ?>" class="form-control" required pattern="\d{11}" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Enter a valid mobile no.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col p-3 bg-white m-2 rounded shadow-sm">
                    <span class="fw-bold text-primary fs-5">Company information</span>
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Company name <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="comp_name" value="<?php echo $account_info['comp_name'] ;?>" class="form-control" required >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please input your company name
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Address <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="address" name="comp_address" value="<?php echo $account_info['comp_address'] ;?>" class="form-control" required >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Enter the company address
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Telephone <span class="text-secondary">(optional)</span></label>
                        <div class="input-group input-group-sm">
                            <input type="tel" name="comp_tel" value="<?php echo $account_info['comp_tel'];?>" class="form-control">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Type "n/a or none" if not available
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Department <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="department" value="<?php echo $account_info['department'];?>" class="form-control" required >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please enter your department
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Tin no. <span class="text-secondary">(optional)</span></label>
                        <div class="input-group input-group-sm">
                            <input type="mobile" name="tin_no" value="<?php echo $account_info['tin_no'];?>" class="form-control">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Type "n/a or none" if not available
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-2 p-1">
                <div class="col p-3 bg-white m-2 rounded shadow-sm">
                    <span class="fw-bold text-primary fs-5">Other account information</span>
                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Email verification status <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="email_verification" value="<?php if($account_info['email_verification'] == 0){ echo 'not verified';} else{ echo 'verified'; }; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="mb-3 d-flex justify-content-end">
            <input type="submit" class="btn btn-small btn-primary" value="Submit">
        </div>
    </form>
</div>

<!-- EDIT PASSWORD FORM -->
<div class="modal fade" id="edit_password_if_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Update account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($user_info as $account_info): ?>
                    <form class="needs-validation" novalidate id="editpasswordform" action="<?php echo base_url('dashboard/edit_password_if_admin/'.$account_info['account_no']); ?>" method="POST">

                        <!-- ACCOUNT INFO -->
                        <h3 class="fs-5 mb-3">Login credentials</h3>
                        <div class="form-group mb-3">
                            <label for="" class="form-label fs-6">Email</label>
                            <div class="input-group input-group-sm">
                                
                                <!-- for display -->
                                <input type="email" name="email" value="<?php echo $account_info['email']; ?>" class="form-control" disabled>
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
                <?php endforeach; ?>    
            </div>
        </div>
    </div>
</div>
<!-- END OF PASSWORD FORM -->

<!-- confirm delete account -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_delete_account.php'); ?>

<!-- Focus the input for fname and place the cursor at the end -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const fnameInput = document.getElementById('fname');
    fnameInput.focus();
    fnameInput.setSelectionRange(fnameInput.value.length, fnameInput.value.length);
  });
</script>