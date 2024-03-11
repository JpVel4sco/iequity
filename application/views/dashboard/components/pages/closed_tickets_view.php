<title>Closed tickets</title>
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
            Closed tickets list
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
    Tickets
    <div class="bg-white my-3 rounded shadow-sm p-2 table-responsive">
        <table id="data-table-tickets" class="table table-hover align-middle" cellspacing="0" width="100%">
            <?php if($user_info_alt['account_type'] == 'user') { ?>
                <thead>
                    <tr>
                        <th scope="col">Ticket no.</th>
                        <th scope="col">Model</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Contact person</th>
                        <th scope="col">Date of registration</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($closed_tickets as $t_data):?>
                        <tr>
                            <td><?php echo $t_data->ticket_no; ?></td>
                            <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data->t_model; ?></td>
                            <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data->t_problem; ?></td>
                            <td><?php echo $t_data->fname." ".$t_data->lname; ?></td>
                            <td><?php echo $t_data->ticket_registration_date; ?></td>
                            <td>
                                <select class="form-select form-select-sm" onchange="location = this.value;">
                                    <option>Select</option>
                                    <option value="<?php echo base_url().'dashboard/view_ticket/'.$t_data->ticket_no;?>">View information</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } else { ?>
                <thead>
                    <tr>
                        <th scope="col">Ticket No.</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">Date of Registration</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($closed_tickets as $t_data):?>
                        <tr>
                            <td><?php echo $t_data->ticket_no; ?></td>
                            <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data->comp_name; ?></td>
                            <td><?php echo $t_data->fname." ".$t_data->lname; ?></td>
                            <td><?php echo $t_data->ticket_registration_date; ?></td>
                            <td>
                                <select class="form-select form-select-sm" onchange="location = this.value;">
                                    <option value="">Select</option>
                                    <option value="<?php echo base_url().'dashboard/view_ticket/'.$t_data->ticket_no;?>">View information</option>
                                    <option value="<?php echo base_url().'dashboard/technical_activity/'.$t_data->ticket_no;?>">Updates on service</option>

                                    <?php if ($get_print_permissions->service_invoice == "Yes"): ?>
                                        <option value="<?php echo base_url().'dashboard/service_invoice/'.$t_data->ticket_no;?>">Service invoice</option>
                                    <?php else: ?>
                                        <option class="d-none" value="<?php echo base_url().'dashboard/service_invoice/'.$t_data->ticket_no;?>">Service invoice</option>
                                    <?php endif; ?>

                                    <?php if ($get_print_permissions->mr == "Yes"): ?>
                                        <option value="<?php echo base_url().'dashboard/mr/'.$t_data->ticket_no;?>">MR</option>
                                    <?php else: ?>
                                        <option class="d-none" value="">MR</option>
                                    <?php endif; ?>

                                    <?php if ($get_ticket_ops_permissions->delete_entirely == "Yes"): ?>
                                        <option value="<?php echo base_url().'dashboard/force_delete_ticket/'.$t_data->ticket_no;?>">Delete entirely</option>
                                    <?php else: ?>
                                        <option class="d-none" value="<?php echo base_url().'dashboard/force_delete_ticket/'.$t_data->ticket_no;?>">Delete entirely</option>
                                    <?php endif; ?>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>