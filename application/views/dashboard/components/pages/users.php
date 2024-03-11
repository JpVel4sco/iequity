<title>User management</title>
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
            Users
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

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div class="me-3 flex-grow-1">
            <span class="text-end me-2">Select role</span>
            <?php foreach ($user_info as $u_data): ?>
                <select class="form-select form-select-sm" aria-label="Select status" id="role-filter">
                    <option>See All</option>
                    <?php if($u_data['account_type'] == 'admin'): ?>
                
                        <option value="Admin">Admin</option>
                        <option value="Service Support">Service support</option>
                        <option value="Service">Service</option>
                        <option value="Technical Support">Technical support</option>
                        <option value="Technical">Technical</option>
                        <option value="User">User</option>
                    <?php endif; ?>
                </select>
            <?php endforeach; ?>
        </div>

        <div class="me-3 flex-grow-1">
            <span class="text-end me-2">Starting date</span>
            <input type="date" class="form-control form-control-sm" id="start_date">
        </div>

        <div class="me-3 flex-grow-1">
            <span class="text-end me-2">Ending date</span>
            <input type="date" class="form-control form-control-sm" id="end_date">
        </div>

        <div class="me-3 flex-grow-1">
            <span class="d-block">Export list</span>
            <a id="user-print-btn" href="#" class="btn btn-dark btn-sm w-100">
                <i class="bi bi-printer"></i>
                Print excel
            </a>
        </div>

        <div class="flex-grow-1">
            <span class="d-block">Total users:
            <span class="fw-bold">
                <?php if(!empty($users_count)){
                    echo $users_count;
                }
                else{
                    echo "0";
                } ?>
            </span>
            </span>
            <button class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#regform">
            <i class="bi bi-plus-circle"></i>
            New user
            </button>
        </div>
    </div>

    <div class="bg-white my-3 p-3 table-responsive rounded">
        <table id="data-table-users" class="table table-hover align-middle" width="100%">
            <thead>
                <tr>
                    <th scope="col">Account ID.</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Company</th>
                    <th scope="col" hidden>Company Address</th>
                    <th scope="col" hidden>Company Telephone</th>
                    <th scope="col" hidden>Department</th>
                    <th scope="col" hidden>Tin no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile no.</th>
                    <th scope="col" hidden>Email Address </th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                foreach($all_users as $u_data):?>
                    <tr>
                        <td><?php echo $u_data['account_no']; ?></td>
                        <td><?php echo $u_data['user_registration_date']; ?></td>
                        <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $u_data['comp_name']; ?></td>
                        <td hidden><?php echo $u_data['comp_address']; ?></td>
                        <td hidden><?php echo $u_data['comp_tel']; ?></td>
                        <td hidden><?php echo $u_data['department']; ?></td>
                        <td hidden><?php echo $u_data['tin_no']; ?></td>
                        <td><?php echo $u_data['fname']." ".$u_data['lname']; ?></td>
                        <td><?php echo $u_data['mobile']; ?></td>
                        <td hidden><?php echo $u_data['email']; ?></td>
                        <td><?php echo $u_data['account_type']; ?></td>
                        <td>
                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                <option value="">Select</option>
                                <option value="<?php echo base_url().'dashboard/view_user/'.$u_data['account_no'];?>">View information</option>

                                <?php if ($account_management->delete_account == "Yes"): ?>
                                    <option value="<?php echo base_url().'dashboard/delete_account_by_admins/'.$u_data['account_no'];?>">Delete account</option>
                                <?php else: ?>
                                    <option class="d-none" value="<?php echo base_url().'dashboard/delete_account_by_admins/'.$u_data['account_no'];?>">Delete account</option>
                                <?php endif; ?>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
    </div>
</div>

<!-- Ticket form -->
<?php include(APPPATH.'views/dashboard/components/partials/user_reg_form.php'); ?>