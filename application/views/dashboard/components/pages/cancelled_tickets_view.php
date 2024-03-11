<title>Cancelled</title>
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
            Cancelled Tickets
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

    <div class="bg-white my-3 p-3 table-responsive rounded">
        <table id="data-table-tickets" class="table table-hover align-middle" width="100%">
            <thead>
                <tr>
                    <th scope="col">Ticket no.</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Company</th>
                    <th scope="col">Contact person</th>
                    <th scope="col">Mobile no.</th>
                    <th scope="col">Technician</th>
                    <th scope="col">Ticket status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cancelled_tickets as $t_data):?>
                    <tr>
                        <td><?php echo $t_data['ticket_no']; ?></td>
                        <td><?php echo $t_data['ticket_registration_date']; ?></td>
                        <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data['comp_name']; ?></td>
                        
                        <td><?php echo $t_data['fname']." ".$t_data['mname']." ".$t_data['lname']; ?></td>
                        <td><?php echo $t_data['mobile']; ?></td>
                        <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data['t_technical_assigned']; ?></td>
                        <td>

                            <?php if($t_data['t_ticket_status'] == 'unassigned'){
                                echo '<button class="btn btn-sm btn-danger text-middle" style="width: 100%">unassigned</button>';
                            } 
                            elseif($t_data['t_ticket_status'] == 'closed'){
                                echo '<button class="btn btn-sm btn-success text-middle" style="width: 100%">closed</button>';
                            }
                            elseif($t_data['t_ticket_status'] == 'open'){
                                echo '<button class="btn btn-sm btn-warning text-middle" style="width: 100%">open</button>';
                            }
                            ?>
                    
                        </td>
                        <td>
                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                <option value="">Select</option>
                                <option value="<?php echo base_url().'dashboard/cancelled_ticket_info/'.$t_data['ticket_no'];?>">View information</option>

                                <?php if ($get_ticket_ops_permissions->delete_entirely == "Yes"): ?>
                                    <option value="<?php echo base_url().'dashboard/force_delete_ticket/'.$t_data['ticket_no'];?>">Delete entirely</option>
                                <?php else: ?>
                                    <option class="d-none" value="<?php echo base_url().'dashboard/force_delete_ticket/'.$t_data['ticket_no'];?>">Delete entirely</option>
                                <?php endif; ?>

                                <?php if ($get_ticket_ops_permissions->delete_entirely == "Yes"): ?>
                                    <option value="<?php echo base_url().'dashboard/retrieve_ticket/'.$t_data['ticket_no'];?>">Retrieve</option>
                                <?php else: ?>
                                    <option class="d-none" value="<?php echo base_url().'dashboard/retrieve_ticket/'.$t_data['ticket_no'];?>">Retrieve</option>
                                <?php endif; ?>

                                <option value="<?php echo base_url().'dashboard/retrieve_ticket/'.$t_data['ticket_no'];?>">Retrieve</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>