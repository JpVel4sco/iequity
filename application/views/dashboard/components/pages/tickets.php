<title>Ticket management</title>
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
            <?php if($user_info_alt['account_type'] == 'user'){
                echo "My tickets";
            }else{
                echo "Tickets";
            }?>
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
            <span class="text-end me-2">Select status</span>
            <select id="status-filter" class="form-select form-select-sm" aria-label="Select status">
            <option>See all</option>
            <option value="closed">closed</option>
            <option value="open">open</option>
            <option value="unassigned">unassigned</option>
            </select>
        </div>

        <div class="me-3 flex-grow-1">
            <span class="text-end me-2">Starting date</span>
            <input id="start-date-filter" type="date" class="form-control form-control-sm">
        </div>

        <div class="me-3 flex-grow-1">
            <span class="text-end me-2">Ending date</span>
            <input id="end-date-filter" type="date" class="form-control form-control-sm">
        </div>

        <?php if ($get_print_permissions->print_list_of_tickets == "Yes"): ?>
            <div class="me-3 flex-grow-1">
                <span class="d-block">Export list</span>
                <a id="print-btn" href="#" class="btn btn-dark btn-sm w-100">
                    <i class="bi bi-printer"></i>
                    Print excel
                </a>
            </div>
        <?php else: ?>
            <div class="d-none me-3 flex-grow-1">
                <span class="d-block">Export list</span>
                <a id="print-btn" href="#" class="btn btn-dark btn-sm w-100">
                    <i class="bi bi-printer"></i>
                    Print excel
                </a>
            </div>
        <?php endif; ?>


        <div class="flex-grow-1">
            <span class="d-block">Total tickets:
            <span class="fw-bold">
                <?php if(!empty($ticket_count)){
                echo $ticket_count;
                }
                else{
                echo "0";
                } ?>
            </span>
            </span>
            <button class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ticket_form">
            <i class="bi bi-plus-circle"></i>
            New ticket
            </button>
        </div>
    </div>

    <div class="bg-white my-3 p-3 table-responsive rounded">
        <table id="data-table-tickets" class="table table-hover align-middle" width="100%">
            <thead>
                <tr>
                    <th scope="col">Ticket no.</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Company</th>
                    <th scope="col" hidden>Company Address</th>
                    <th scope="col" hidden>Company Telephone</th>
                    <th scope="col" hidden>Department</th>
                    <th scope="col" hidden>Tin. no</th>
                    <th scope="col">Contact person</th>
                    <th scope="col">Mobile no.</th>
                    <th scope="col" hidden>Email address</th>
                    <th scope="col">Technician</th>
                    <th scope="col">Ticket status</th>
                    <th scope="col" hidden>Model</th>
                    <th scope="col" hidden>Serial no.</th>
                    <th scope="col" hidden>Delivery receipt no.</th>
                    <th scope="col" hidden>Problem</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($all_tickets as $t_data):?>
                    <tr>
                        <td><?php echo $t_data['ticket_no']; ?></td>
                        <td><?php echo $t_data['ticket_registration_date']; ?></td>
                        <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data['comp_name']; ?></td>
                        <td hidden><?php echo $t_data['comp_address']; ?></td>
                        <td hidden><?php echo $t_data['comp_tel']; ?></td>
                        <td hidden><?php echo $t_data['department']; ?></td>
                        <td hidden><?php echo $t_data['tin_no']; ?></td>
                        <td><?php echo $t_data['fname']." ".$t_data['lname']; ?></td>
                        <td><?php echo $t_data['mobile']; ?></td>
                        <td hidden><?php echo $t_data['email']; ?></td>
                        <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data['t_technical_assigned']; ?></td>
                        <td>

                            <?php if($t_data['t_ticket_status'] == 'unassigned'){
                                echo '<button class="btn btn-sm btn-danger text-middle" style="width: 100%" disabled>unassigned</button>';
                            } 
                            elseif($t_data['t_ticket_status'] == 'closed'){
                                echo '<button class="btn btn-sm btn-success text-middle" style="width: 100%" disabled>closed</button>';
                            }
                            elseif($t_data['t_ticket_status'] == 'open'){
                                echo '<button class="btn btn-sm btn-warning text-middle" style="width: 100%" disabled>open</button>';
                            }
                            ?>
                    
                        </td>
                        <td hidden><?php echo $t_data['t_model']; ?></td>
                        <td hidden><?php echo $t_data['t_serial_no']; ?></td>
                        <td hidden><?php echo $t_data['t_dr_no']; ?></td>
                        <td hidden><?php echo $t_data['t_problem']; ?></td>
                        <td>
                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                <option value="">Select</option>
                                <option value="<?php echo base_url().'dashboard/view_ticket/'.$t_data['ticket_no'];?>">View information</option>
                                <option value="<?php echo base_url().'dashboard/technical_activity/'.$t_data['ticket_no'];?>">Updates on service</option>

                                <?php if ($get_print_permissions->service_invoice == "Yes"): ?>
                                    <option value="<?php echo base_url().'dashboard/service_invoice/'.$t_data['ticket_no'];?>">Service invoice</option>
                                <?php else: ?>
                                    <option class="d-none" value="<?php echo base_url().'dashboard/service_invoice/'.$t_data['ticket_no'];?>">Service invoice</option>
                                <?php endif; ?>

                                <?php if ($get_print_permissions->mr == "Yes"): ?>
                                    <option value="<?php echo base_url().'dashboard/mr/'.$t_data['ticket_no'];?>">MR</option>
                                <?php else: ?>
                                    <option class="d-none" value="">MR</option>
                                <?php endif; ?>

                                <?php if ($get_ticket_ops_permissions->delete_entirely == "Yes"): ?>
                                    <option value="<?php echo base_url().'dashboard/force_delete_ticket/'.$t_data['ticket_no'];?>">Delete entirely</option>
                                <?php else: ?>
                                    <option class="d-none" value="<?php echo base_url().'dashboard/force_delete_ticket/'.$t_data['ticket_no'];?>">Delete entirely</option>
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
<?php include(APPPATH.'views/dashboard/components/partials/ticket_form.php'); ?>