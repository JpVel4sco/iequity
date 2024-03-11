<title>Dashboard</title>
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
            Dashboard
        </a>

        <div class="dropdown">
             <?php foreach ($user_info as $u_data): ?>
                <span class="text-secondary"><?php $account_type = $u_data['account_type'];
                                                $words = explode(' ', $account_type);
        
                                                foreach ($words as &$word) {
                                                    $word = ucfirst($word);
                                                }

                                                $capitalized_account_type = implode(' ', $words);

                                                echo $capitalized_account_type ; ?> | </span><span class="fw-bold text-black"><?php echo $u_data['fname'].' '.$u_data['lname']; ?></span>
            <?php endforeach; ?>
        </div>

    </div>
</nav>
<!-- end of topnav -->

<!-- monitoring -->
<div class="container-fluid px-3">
    Total tickets: <span class="fw-bold"><?php if(!empty($ticket_count)){
                echo $ticket_count;
            }
            else{
                echo "0";
            } ?></span>
    <div class="row my-2">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-5 border-top-0 border-end-0 border-bottom-0 border-info shadow-sm h-100 p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">
                                New entry
                            </div>
                            <div class="h5 mb-0 fw-bold text-secondary">

                            <?php if($ticket_count_unassigned != 0){
                                echo $ticket_count_unassigned;
                            }
                            else{
                                echo "0";
                            }
                            ?>

                            </div>
                        </div>
                        <!-- <div class="col-auto bg-info rounded">
                            <i class="bi bi-ticket-perforated-fill text-white fs-2"></i>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-5 border-top-0 border-end-0 border-bottom-0 border-warning shadow-sm h-100 p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                Open
                            </div>
                            <div class="h5 mb-0 fw-bold text-secondary">

                            <?php if($ticket_count_open != 0){
                                echo $ticket_count_open;
                            }
                            else{
                                echo "0";
                            }
                            ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('dashboard/open_tickets'); ?>" class="btn btn-sm btn-warning">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-5 border-top-0 border-end-0 border-bottom-0 border-success shadow-sm h-100 p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                Closed
                            </div>
                            <div class="h5 mb-0 fw-bold text-secondary">

                            <?php if($ticket_count_closed != 0){
                                echo $ticket_count_closed;
                            }
                            else{
                                echo "0";
                            }
                            ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('dashboard/closed_tickets'); ?>" class="btn btn-sm btn-success">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-5 border-top-0 border-end-0 border-bottom-0 border-danger shadow-sm h-100 p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="text-xs fw-bold text-danger text-uppercase mb-1">
                                Pending
                            </div>
                            <div class="h5 mb-0 fw-bold text-secondary">

                            <?php if($ticket_count_unassigned != 0){
                                echo $ticket_count_unassigned;
                            }
                            else{
                                echo "0";
                            }
                            ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('dashboard/pending_tickets'); ?>" class="btn btn-sm btn-danger">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end of monitoring -->

<!-- table -->
<div class="container-fluid px-3">
    Pending tickets
    <div class="bg-white my-3 rounded shadow-sm p-2 table-responsive">
        <table id="data-table-tickets" class="table table-hover align-middle" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">Ticket No.</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Contact Person</th>
                    <th scope="col">Date of Registration</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($all_tickets as $t_data):?>
                    <tr>
                        <td><?php echo $t_data['ticket_no']; ?></td>
                        <td class="text-truncate" style="max-width: 200px; overflow: hidden;"><?php echo $t_data['comp_name']; ?></td>
                        <td><?php echo $t_data['fname']." ".$t_data['lname']; ?></td>
                        <td><?php echo $t_data['ticket_registration_date']; ?></td>
                        </td>
                        <td>
                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                <option>Select</option>
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