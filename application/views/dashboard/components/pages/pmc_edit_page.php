<title>Memo Information</title>
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
            Memo
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
    <div class="text-start">
        <div class="btn-group" role="group" aria-label="Button Group">
            
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_pmc">Delete <i class="bi bi-trash"></i></button>

        </div>
    </div>

    <div class="row my-2 p-1">
        <div class="col p-3 bg-white m-2 rounded shadow-sm">
            <form action="<?php echo base_url('dashboard/update_pmc/'.$ticket_info->ticket_no);?>" method="post">

                <input type="hidden" name="pmc_id" value="<?php echo $pmc_info->pmc_id; ?>">

                <div class="form-group mb-2">
                    <label for="" class="form-label fs-6">Description</label>
                    <div class="input-group input-group-sm">
                        <textarea name="description" cols="30" rows="3" class="form-control"><?php echo $pmc_info->description; ?></textarea>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add description
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="" class="form-label fs-6">Qty.</label>
                            <div class="input-group input-group-sm">
                                <input name="qty" class="form-control" value="<?php echo $pmc_info->qty; ?>"/>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Add quantity
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="" class="form-label fs-6">Unit</label>
                            <div class="input-group input-group-sm">
                                <input name="unit" class="form-control" value="<?php echo $pmc_info->unit; ?>"/>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Add unit
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="" class="form-label fs-6">Price</span></label>
                            <div class="input-group input-group-sm">
                                <input name="price" class="form-control" value="<?php echo $pmc_info->price; ?>"/>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Add price
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="" class="form-label fs-6">Amount</label>
                            <div class="input-group input-group-sm">
                                <input name="amount" class="form-control" <?php echo $pmc_info->amount; ?>/>
                                <div class="valid-feedback">
                                    Okay!
                                </div>
                                <div class="invalid-feedback">
                                    Add amount
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- diagnose form -->
<?php include(APPPATH.'views/dashboard/components/partials/diagnose_form.php'); ?>

<!-- confirm parts and mats charges -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_delete_pmc.php'); ?>