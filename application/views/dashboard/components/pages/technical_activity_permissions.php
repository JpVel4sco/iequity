<title>Technical Activity</title>
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
            Access control for Technical activity
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
        <span class="fw-bold text-primary fs-5">Technical activity</span>
            <form action="<?php echo site_url('dashboard/update_technical_activity_permissions'); ?>" method="post">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="text-center">Roles</th>
                            <th class="text-center">Assign technician</th>
                            <th class="text-center">Close ticket</th>
                            <th class="text-center">Create memo</th>
                            <th class="text-center">Edit memo</th>
                            <th class="text-center">Delete memo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($technical_activity_permissions as $index => $tap): ?>
                            <tr>
                                <td><?php echo $tap->role; ?></td>
                                <input type="hidden" name="role_ids[]" value="<?php echo $tap->role_id; ?>">
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $tap->role_id; ?>][assign_technician]" <?php echo $tap->assign_technician == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $tap->role_id; ?>][close_ticket]" <?php echo $tap->close_ticket == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $tap->role_id; ?>][create_diagnose]" <?php echo $tap->create_diagnose == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $tap->role_id; ?>][edit_memo]" <?php echo $tap->edit_memo == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input mx-auto d-block" name="permissions[<?php echo $tap->role_id; ?>][delete_memo]" <?php echo $tap->delete_memo == 'Yes' ? 'checked' : ''; ?><?php echo $index === 0 ? ' disabled' : ''; ?>>
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