<title>Access Control</title>
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
            Access control for printing documents
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
    
    <div class="d-flex flex-wrap mb-4">
        <div class="">
            <span class="text-end me-2">Choose settings</span>
            <select class="form-select form-select-sm" onchange="location = this.value;">
                <option value="">Select</option>
                <option value="<?php echo base_url();?>dashboard/print_permissions">Printing documents</option>
                <option value="<?php echo base_url();?>dashboard/ticket_operations">Ticket operations</option>
                <option value="<?php echo base_url();?>dashboard/technical_activity_permissions">Technical activity</option>
                <option value="<?php echo base_url();?>dashboard/account_management_permissions">Account management</option>
            </select>
        </div>
    </div>

    <div class="bg-white my-3 p-3 rounded">
        <span class="fw-bold text-primary fs-5">Printing documents</span>
        <form action="<?php echo site_url('dashboard/update_print_permissions'); ?>" method="post">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-center">Roles</th>
                        <th class="text-center">
                            Print list of tickets <br>
                            <span class="fw-normal text-secondary">(Allowed to print ticket list in excel format)</span>
                        </th>
                        <th class="text-center">
                            Print service invoice <br>
                            <span class="fw-normal text-secondary">(Allowed to create, edit, and print service invoice)</span>
                        </th>
                        <th class="text-center">
                            Print MR <br>
                            <span class="fw-normal text-secondary">(Allowed to create, edit, and print MR)</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($print_doc_permissions as $index => $pdp): ?>
                        <tr>
                            <td><?php echo $pdp->role; ?></td>
                            <input type="hidden" name="role_ids[]" value="<?php echo $pdp->role_id; ?>">
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $pdp->role_id; ?>][print_list_of_tickets]" <?php echo $pdp->print_list_of_tickets == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                <input type="hidden" name="original_permissions[<?php echo $pdp->role_id; ?>][print_list_of_tickets]" value="<?php echo $pdp->print_list_of_tickets; ?>">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $pdp->role_id; ?>][service_invoice]" <?php echo $pdp->service_invoice == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                <input type="hidden" name="original_permissions[<?php echo $pdp->role_id; ?>][service_invoice]" value="<?php echo $pdp->service_invoice; ?>">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $pdp->role_id; ?>][mr]" <?php echo $pdp->mr == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                <input type="hidden" name="original_permissions[<?php echo $pdp->role_id; ?>][mr]" value="<?php echo $pdp->mr; ?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <div class="text-end">
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Ticket form -->
<?php include(APPPATH.'views/dashboard/components/partials/ticket_form.php'); ?>