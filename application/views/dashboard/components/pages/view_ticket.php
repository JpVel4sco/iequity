<title>Ticket summary</title>
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
            View ticket
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
    <div class="text-start">
        <div class="btn-group" role="group" aria-label="Button Group">

            <?php if ($get_ticket_ops_permissions->edit_ticket == "Yes"): ?>
                <?php if($ticket_info->t_ticket_status != 'closed' ):?>
                    <button class="btn btn-sm btn-success me-2" onclick="enableForm('edit_ticket_form')">Edit info <i class="bi bi-pencil-square"></i></button>
                <?php elseif($ticket_info->t_ticket_status == 'closed' ):?>
                    <button class="btn btn-sm btn-success me-2" disabled>Edit info <i class="bi bi-pencil-square"></i></button>    
                <?php endif; ?>
            <?php else: ?>
                <button class="d-none btn btn-sm btn-success me-2" onclick="enableForm('edit_ticket_form')">Edit info <i class="bi bi-pencil-square"></i></button>
            <?php endif; ?>

            <?php if ($get_ticket_ops_permissions->cancel_ticket == "Yes"): ?>
                <?php if($ticket_info->t_ticket_status != 'closed' ):?>
                    <button class="btn btn-sm btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirm_cancel_ticket">Cancel ticket <i class="bi bi-x-circle"></i></button>
                <?php elseif($ticket_info->t_ticket_status == 'closed' ):?>
                    <button class="btn btn-sm btn-danger me-2" disabled>Cancel ticket <i class="bi bi-x-circle"></i></button>    
                <?php endif; ?>    
            <?php else: ?>
                <button class="d-none btn btn-sm btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirm_cancel_ticket">Cancel ticket <i class="bi bi-x-circle"></i></button>
            <?php endif; ?>  
        </div>
    </div>
    <form action="<?php echo base_url('dashboard/run_ticket_update/'.$ticket_info->ticket_no);?>" method="post" class="needs-validation" novalidate name="edit_ticket_form">
        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <span class="fw-bold text-primary fs-5">Product information</span>
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Model</label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="t_model" id="t_model" class="form-control" value="<?php echo $ticket_info->t_model;?>" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Please provide the product model
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Serial no.</label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="t_serial_no" id="t_serial_no" class="form-control" value="<?php echo $ticket_info->t_serial_no;?>" maxlength="25" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Please provide the serial no. and a maximum of 25 characters only
                        </div>
                    </div> 
                </div>
                
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Delivery receipt no.</label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="t_dr_no" id="t_dr_no" class="form-control" value="<?php echo $ticket_info->t_dr_no;?>" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Type "n/a or none" if not available
                        </div>
                    </div> 
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Qty. <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="qty" class="form-control" required disabled max="25" value="<?php echo $ticket_info->t_qty;?>">
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add valid quantity
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Unit <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="unit" class="form-control" required disabled value="<?php echo $ticket_info->t_unit;?>">
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add unit
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Problem</label>
                    <div class="input-group input-group-sm">
                        <textarea name="t_problem" id="t_problem" cols="30" rows="5" class="form-control" required disabled><?php echo $ticket_info->t_problem; ?></textarea>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Please state the problem
                        </div>
                    </div> 
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Warranty <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="warranty" value="yes" <?php if($ticket_info->warranty == 'yes'){ echo 'checked'; } ?> disabled>
                        <label class="form-check-label" for="warranty_yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="warranty" value="no" <?php if($ticket_info->warranty == 'no'){ echo 'checked'; } ?> disabled>
                        <label class="form-check-label" for="warranty_no">
                            No
                        </label>
                    </div>
                </div>
            </div>

            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <span class="fw-bold text-primary fs-5">Company information</span>
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Company name <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="t_comp_name" id="t_comp_name" value="<?php echo $ticket_info->comp_name;?>" class="form-control" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Provide a company name or 'n/a' if not applicable.
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Address <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="address" name="t_comp_address" id="t_comp_address" value="<?php echo $ticket_info->comp_address;?>" class="form-control" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Provide a company address or 'n/a' if not applicable.
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Telephone <span class="text-secondary">(optional)</span></label>
                    <div class="input-group input-group-sm">
                        <input type="tel" name="t_comp_tel" id="t_comp_tel" value="<?php echo $ticket_info->comp_tel;?>" class="form-control" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Provide a company telephone or 'n/a' if not applicable.
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Department <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="t_department" id="t_department" value="<?php echo $ticket_info->department;?>" class="form-control" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Provide a company department or 'n/a' if not applicable.
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Tin no. <span class="text-secondary">(optional)</span></label>
                    <div class="input-group input-group-sm">
                        <input type="mobile" name="t_tin_no" id="t_tin_no" value="<?php echo $ticket_info->tin_no;?>" class="form-control" required disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Provide a tin no. or 'n/a' if not applicable.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <span class="fw-bold text-primary fs-5">Contact information</span>
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm">
                                <input type="text" name="t_fname" id="t_fname" placeholder="first name" value="<?php echo $ticket_info->fname; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required disabled>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Please capitalize the first letter.
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm">
                                <input type="text" name="t_mname" id="t_mname" placeholder="middle name" value="<?php echo $ticket_info->mname; ?>" class="form-control" disabled>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Please capitalize the first letter.
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm">
                                <input type="text" name="t_lname" id="t_lname" placeholder="last name" value="<?php echo $ticket_info->lname; ?>" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ ]*$" required disabled>
                                <div class="valid-feedback">
                                    Okay!
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
                        <input type="email" value="<?php echo $ticket_info->email; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Mobile no. <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="mobile" name="t_mobile" id="t_mobile" value="<?php echo $ticket_info->mobile; ?>" class="form-control" required pattern="\d{11}" disabled>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Enter a valid mobile no.
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
        
        <div class="mb-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-primary" disabled>Submit</button>
        </div>
    </form>    
</div>

<!-- cancel ticket form -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_cancellation_of_ticket.php'); ?>

<script>
    // Store the initial values of the inputs
var initialInputValues = {};
var isFormEnabled = false;
var submitButton = document.querySelector('button[type="submit"]');

// Hide the submit button initially
submitButton.style.display = 'none';

function enableForm(formName) {
var form = document.forms[formName];
var inputs = form.getElementsByTagName('input');
var textarea = form.getElementsByTagName('textarea')[0];
var button = form.getElementsByTagName('button')[0];

if (!isFormEnabled) {
    // Store the initial values of the inputs
    for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].name !== 't_email' && inputs[i].type !== 'email') {
        initialInputValues[inputs[i].name] = inputs[i].value;
    }
    }
    initialInputValues[textarea.name] = textarea.value;

    // Enable the inputs and textarea
    for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].name !== 't_email' && inputs[i].type !== 'email') {
        inputs[i].disabled = false;
    }
    }
    textarea.disabled = false;
    button.textContent = 'Update'; // Change button text to 'Save'
    isFormEnabled = true;

    // Unhide and enable the submit button
    submitButton.style.display = 'block';
    submitButton.disabled = false;
} else {
    // Disable the inputs and textarea
    for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].name !== 't_email' && inputs[i].type !== 'email') {
        inputs[i].disabled = true;
        // Restore the initial values of the inputs
        inputs[i].value = initialInputValues[inputs[i].name];
    }
    }
    textarea.disabled = true;
    textarea.value = initialInputValues[textarea.name]; // Restore the initial value of the textarea
    button.textContent = 'Edit'; // Change button text back to 'Edit'
    isFormEnabled = false;

    // Hide and disable the submit button
    submitButton.style.display = 'none';
    submitButton.disabled = true;
}
}
</script>