<title>Ticket operations</title>
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
            Access control for ticket operations
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
        <span class="fw-bold text-primary fs-5">Ticket operations</span>
            <form action="<?php echo site_url('dashboard/update_ticket_operation_permissions'); ?>" method="post">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="text-center">Roles</th>
                            <th class="text-center">
                                Edit info <br>
                                <span class="fw-normal text-secondary">(Allowed to change details)</span>
                            </th>
                            <th class="text-center">
                                Resume ticket <br>
                                <span class="fw-normal text-secondary">(Allowed to re-open the ticket status after closing)</span>
                            </th>
                            <th class="text-center">
                                Cancel ticket <br>
                                <span class="fw-normal text-secondary">(Allowed to cancel the ticket status)</span>
                            </th>
                            <th class="text-center">
                                Delete entirely <br>
                                <span class="fw-normal text-secondary">(Includes service invoices, MRs, memos, and more.)</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ticket_operations_permissions as $index => $top): ?>
                            <tr>
                                <td><?php echo $top->role; ?></td>
                                <input type="hidden" name="role_ids[]" value="<?php echo $top->role_id; ?>">
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $top->role_id; ?>][edit_ticket]" <?php echo $top->edit_ticket == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $top->role_id; ?>][resume_ticket]" <?php echo $top->resume_ticket == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $top->role_id; ?>][cancel_ticket]" <?php echo $top->cancel_ticket == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $top->role_id; ?>][delete_entirely]" <?php echo $top->delete_entirely == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
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