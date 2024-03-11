<title>Assigned tickets</title>
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
            Assigned tickets to Technician
        </a>

        <div class="dropdown">
             <?php foreach ($user_info as $u_data): ?>
                <span class="text-secondary"><?php echo $u_data['account_type']; ?> | </span><span class="fw-bold text-black"><?php echo $u_data['fname'].' '.$u_data['lname']; ?></span>
            <?php endforeach; ?>
        </div>

    </div>
</nav>
<!-- end of topnav -->

<!-- Configurations -->
<div class="container-fluid px-3">
    Table of tickets
    <div class="bg-white my-3 p-3 table-responsive rounded">
        <table id="data-table-tickets" class="table table-hover align-middle" width="100%">
            <thead>
                <tr>
                    <th>Ticket no</th>
                    <th>Registration date</th>
                    <th>Company</th>
                    <th>Contact person</th>
                    <th>Mobile no.</th>
                    <th>Technician</th>
                    <th>Ticket status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assigned_tickets as $ticket): ?>
                    <tr>
                        <td><?php echo $ticket->ticket_no; ?></td>
                        <td><?php echo $ticket->ticket_registration_date; ?></td>
                        <td><?php echo $ticket->comp_name; ?></td>
                        <td><?php echo $ticket->fname . ' ' . $ticket->lname; ?></td>
                        <td><?php echo $ticket->mobile; ?></td>
                        <td><?php echo $ticket->t_technical_assigned; ?></td>
                        <td>

                            <?php if($ticket->t_ticket_status == 'unassigned'){
                                echo '<button class="btn btn-sm btn-danger text-middle" style="width: 100%">unassigned</button>';
                            } 
                            elseif($ticket->t_ticket_status == 'closed'){
                                echo '<button class="btn btn-sm btn-success text-middle" style="width: 100%">closed</button>';
                            }
                            elseif($ticket->t_ticket_status == 'open'){
                                echo '<button class="btn btn-sm btn-warning text-middle" style="width: 100%">open</button>';
                            }
                            ?>
                    
                        </td>
                        <td>
                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                <option value="">Select</option>
                                <option value="<?php echo base_url().'dashboard/view_ticket/'.$ticket->ticket_no;?>">View information</option>
                                <option value="<?php echo base_url().'dashboard/technical_activity/'.$ticket->ticket_no;?>">Updates on service</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
</div>