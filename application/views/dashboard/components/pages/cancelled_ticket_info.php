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
            Cancelled Ticket Information
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
    <form action="" method="post">
        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <span class="fw-bold text-primary fs-5">Product information</span>
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Model</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" value="<?php echo $ticket_info->t_model;?>" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Serial no.</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" value="<?php echo $ticket_info->t_serial_no;?>" disabled>
                    </div> 
                </div>
                
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Delivery receipt no.</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" value="<?php echo $ticket_info->t_dr_no;?>" disabled>
                    </div> 
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Qty. <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text"class="form-control"disabled value="<?php echo $ticket_info->t_qty;?>">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Unit <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" disabled value="<?php echo $ticket_info->t_unit;?>">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Problem</label>
                    <div class="input-group input-group-sm">
                        <textarea cols="30" rows="5" class="form-control" disabled><?php echo $ticket_info->t_problem; ?></textarea>
                    </div> 
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Warranty <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="warranty" value="yes" <?php if($ticket_info->warranty == 'yes'){ echo 'checked'; } ?> disabled>
                        <label class="form-check-label" for="warranty_yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="warranty" value="no" <?php if($ticket_info->warranty == 'no'){ echo 'checked'; } ?> disabled>
                        <label class="form-check-label" for="warranty_no">
                            No
                        </label>
                    </div>
                </div>
            </div>

            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <span class="fw-bold text-primary fs-5">Company information</span>
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Company name <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" value="<?php echo $ticket_info->comp_name;?>" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Address <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="address" value="<?php echo $ticket_info->comp_address;?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Telephone <span class="text-secondary">(optional)</span></label>
                    <div class="input-group input-group-sm">
                        <input type="tel" value="<?php echo $ticket_info->comp_tel;?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Department <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" value="<?php echo $ticket_info->department;?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Tin no. <span class="text-secondary">(optional)</span></label>
                    <div class="input-group input-group-sm">
                        <input type="mobile" value="<?php echo $ticket_info->tin_no;?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <span class="fw-bold text-primary fs-5">Contact information</span>
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm">
                                <input type="text" value="<?php echo $ticket_info->fname; ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm">
                                <input type="text" value="<?php echo $ticket_info->mname; ?>" class="form-control" disabled>
        
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm">
                                <input type="text" value="<?php echo $ticket_info->lname; ?>" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Email <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="email" value="<?php echo $ticket_info->email; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Mobile no. <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="mobile" name="t_mobile" id="t_mobile" value="<?php echo $ticket_info->mobile; ?>" class="form-control" required pattern="\d{11}" disabled>
                    </div>
                </div>

                
            </div>
        </div>
    </form>    
</div>