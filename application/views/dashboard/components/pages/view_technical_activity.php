<title>Ticket summary</title>
</head>
<body class="bg-dark-subtle">

<!-- Popups -->
<?php include(APPPATH.'views/dashboard/components/partials/session_popups.php'); ?>

<!-- topnav -->
<nav class="navbar sticky-top bg-white m-3 p-0 shadow-sm rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" onclick="history.back()">
            <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="background-color: transparent;">
                <i class="bi bi-list"></i>
            </button>
            Updates on Service
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
    <div class="row">
        <div class="col">
            Summary of services goes here
        </div>
        <div class="col text-end">
            <div class="btn-group">

                <?php if ($technician_permissions->close_ticket == "Yes"): ?>
                    <?php if($ticket_info->t_ticket_status != 'closed' ):?>
                        <?php if($u_data['account_type'] == 'technical' || $u_data['account_type']=='technical support'):?>
                            <?php if ($ticket_info->t_technical_assigned != $u_data['fname']." ".$u_data['lname']): ?>
                                <button class="d-none btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirm_close_ticket">Close ticket</button>
                            <?php else: ?>
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirm_close_ticket">Close ticket</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirm_close_ticket">Close ticket</button>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <button class="d-none btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirm_close_ticket">Close ticket</button>
                <?php endif; ?>

                <?php if ($get_ticket_ops_permissions->resume_ticket == "Yes"): ?>
                    <?php if($ticket_info->t_ticket_status == 'closed' ):?>
                        <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#confirm_re_open_ticket">Re-open</button>
                    <?php endif; ?>
                <?php endif; ?>  


            </div>
        </div>
    </div>
    <div class="row my-2 p-1">

        <?php if ($technician_permissions->assign_technician == "Yes"): ?>
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <div class="row">
                    <div class="col">
                        <span class="fw-bold text-primary fs-5">Assigned Technical</span>
                    </div>
                    <div class="col text-end">
                        <?php if ($technician_permissions->close_ticket == "Yes"): ?>
                            <?php if($ticket_info->t_ticket_status != 'closed' ):?>
                                <?php if($u_data['account_type'] == 'technical' || $u_data['account_type']=='technical support'):?>
                                    <?php if ($ticket_info->t_technical_assigned != $u_data['fname']." ".$u_data['lname']): ?>
                                        <button class="d-none btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#technician_assign_form">New technician</button>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#technician_assign_form">New technician</button>
                                    <?php endif; ?>  
                                <?php else: ?>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#technician_assign_form">New technician</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>    
                            <button class="d-none btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#technician_assign_form">New technician</button>
                        <?php endif; ?>        
                            
                    </div>
                </div>
                <table class="table table-borderless mt-2">
                    <tr>
                        <th>Name</th>
                        <th>Date assigned</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $technicianNames = array_map('trim', explode(', ', $ticket_info->t_technical_assigned));
                    foreach ($ticket_status_info as $status_info) :
                        ?>
                        <tr>
                            <td><?php echo $status_info['technician_name']; ?></td>
                            <td><?php echo $status_info['date_assigned']; ?></td>
                            <td>
                                <?php
                                $currentTechnician = false;
                                foreach ($technicianNames as $technicianName) {
                                    if ($technicianName === $status_info['technician_name']) {
                                        $currentTechnician = true;
                                        break;
                                    }
                                }

                                if ($currentTechnician) {
                                    echo "<button class='btn btn-sm btn-primary'>Current</button>";
                                } else {
                                    echo ' ';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
    </div>
                        
    <div class="row my-2 p-1">
        <div class="col p-3 bg-white m-2 rounded shadow-sm">
            <div class="row">
                <div class="col">
                    <span class="fw-bold text-primary fs-5">Memo</span>
                </div>
                <div class="col text-end">

                    <?php if ($technician_permissions->create_diagnose == "Yes"): ?>
                        <?php if($ticket_info->t_ticket_status != 'closed'):?>
                            <?php if($u_data['account_type'] == 'technical' || $u_data['account_type']=='technical support'):?>
                                <?php if ($ticket_info->t_technical_assigned != $u_data['fname']." ".$u_data['lname']): ?>
                                    <button class="d-none btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#diagnose_form">Create memo</button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#diagnose_form">Create memo</button>
                                <?php endif; ?>
                            <?php else: ?>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#diagnose_form">Create memo</button>
                            <?php endif; ?>    
                        <?php endif; ?>
                    <?php else: ?>
                        <button class="d-none btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#diagnose_form">Create memo</button>
                    <?php endif; ?>

                </div>
            </div>
            <table class="table table-borderless mt-2 table-responsive">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Reported problem</th>
                        <th>Description</th>
                        <th>Accessories</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getDiagnoseData as $row): ?>
                        <tr>
                            <td><?php echo $row->date; ?></td>
                            <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $row->problem; ?></td>
                            <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $row->repair_solution; ?></td>
                            <td><?php echo $row->accessories; ?></td>
                            <td>
                                <?php if ($row->status == 'repaired'): ?>
                                    <button class="btn btn-sm btn-success" disabled style="width: 100%">Repaired</button>
                                <?php elseif ($row->status == 'on-progress'): ?>
                                    <button class="btn btn-sm btn-warning" disabled style="width: 100%">On-progress</button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <select class="form-select form-select-sm" onchange="location = this.value;">
                                    <option>Select</option>
                                    <option value="<?php echo base_url('dashboard/view_memo/'.$row->memo_id.'/'.$ticket_info->ticket_no); ?>">View</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row my-2 p-1">
        <div class="col p-3 bg-white m-2 rounded shadow-sm">
            <span class="fw-bold text-primary fs-5">Old tickets</span>
            
                <div class="row mt-2">

                <?php if (empty($old_tickets)): ?>
                    <p>No old tickets</p>
                <?php else: ?>
                    <?php foreach ($old_tickets as $ot_data): ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?php echo base_url('dashboard/view_ticket/'.$ot_data['ticket_no']); ?>" class="text-decoration-none">
                                <div class="card border-5 border-top-0 border-end-0 border-bottom-0 <?php if($ot_data['t_ticket_status']=='unassigned'){ echo "border-danger"; } elseif($ot_data['t_ticket_status']=='open'){echo "border-warning";} elseif($ot_data['t_ticket_status']=='closed'){ echo "border-success";} ?> shadow-sm h-100 p-2 bg-body-tertiary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="fs-6 text-secondary">
                                                    <span class="fw-bold">#<?php echo $ot_data['ticket_no']." ".$ot_data['t_problem']; ?></span>
                                                </div>
                                                <div class="fs-6 text-secondary">
                                                    <?php echo $ot_data['ticket_registration_date']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>   
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                </div>

        </div>
    </div>
</div>

<!-- assign technician form -->
<?php include(APPPATH.'views/dashboard/components/partials/assign_technician_form.php'); ?>

<!-- diagnose form -->
<?php include(APPPATH.'views/dashboard/components/partials/diagnose_form.php'); ?>

<!-- confirm close ticket -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_close_ticket.php'); ?>

<!-- confirm re-open ticket -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_re_open_ticket.php'); ?>