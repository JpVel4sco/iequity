<title>Service Invoice</title>
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
            Service Invoice Edit Page
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
    <div class="row">
        <div class="col">Summary of Service Invoice goes here</div>
        <div class="col text-end">
            <?php if (!empty($service_invoice_info)) { ?>
                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirm_delete_invoice">
                    <i class="bi bi-trash"></i>
                    Delete invoice
                </a>
                <a href="<?php echo base_url('dashboard/printPDF/'.$ticket_info->ticket_no)?>" class="btn btn-dark btn-sm" target="_blank">
                    <i class="bi bi-printer"></i>
                    Open print page
                </a>
                <a href="#" class="d-none btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#confirm_create_invoice">
                    <i class="bi bi-plus-circle"></i>
                    Create Invoice
                </a>
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#email_form">
                    Send email
                </button>
            <?php } else { ?>
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#confirm_create_invoice">
                    <i class="bi bi-plus-circle"></i>
                    Create Invoice
                </a>
            <?php } ?>
        </div>
    </div>

    <?php if (!empty($service_invoice_info)): ?>
        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <div class="row">
                    <div class="col">
                        <span class="fw-bold text-primary fs-5">SERVICE INVOICE</span>
                    </div>
                    <div class="col text-end">
                        
                    </div>
                </div>
                <table class="table table-borderless mt-3">
                    <tbody>
                        <tr>
                            <td class="fw-bold">CUSTOMER:</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->comp_name;} else{ echo " "; }?></td>
                            <td class="fw-bold">DATE RECEIVED:</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->ticket_registration_date;} else{ echo " "; }?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">ADDRESS</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->comp_address;} else{ echo " "; }?></td>
                            <td class="fw-bold">DATE RELEASED:</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->date_of_release;} else{ echo " "; }?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">TELEPHONE:</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->mobile;} else{ echo " "; } ?></td>
                            <td class="fw-bold">TECHNICIAN:</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->t_technical_assigned;} else{ echo " "; } ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">CONTACT PERSON:</td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->fname.' '.$ticket_info->lname; } else{ echo " "; }?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <td class="fw-bold">DESCRIPTION</td>
                            <td class="fw-bold">SERIAL</td>
                            <td class="fw-bold">QTY.</td>
                            <td class="fw-bold">UNIT</td>
                            <td class="fw-bold">COMPLAIN</td>
                            <td class="fw-bold">WARRANTY</td>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->t_model;} else{ echo " "; }?></td>
                            <td><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->serial_no;} ;?></td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->t_qty;} else{ echo " "; }?></td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->t_unit;} else{ echo " "; }?></td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->t_problem; } else{ echo " "; }?></td>
                            <td><?php if(!empty($service_invoice_info)){echo $ticket_info->warranty;} else{ echo " "; }?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <div class="row">
                    <div class="col">
                        <span class="fw-bold text-primary fs-5">PARTS / MATERIAL CHARGES</span>
                    </div>
                    <div class="col text-end">
                        <a href="" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#parts_and_mats_form">
                            <i class="bi bi-plus-circle"></i>
                            Add
                        </a>
                    </div>
                </div>
                <table id="parts" class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <td class="fw-bold">DESCRIPTION</td>
                            <td class="fw-bold">QTY.</td>
                            <td class="fw-bold">UNIT</td>
                            <td class="fw-bold">PRICE</td>
                            <td class="fw-bold">AMOUNT</td>
                            <td class="fw-bold">ACTION</td>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php if(!empty($parts_or_material_charges)):?>
                            <?php foreach ($parts_or_material_charges as $charge): ?>
                                <tr>
                                    <td><?php echo $charge->description; ?></td>
                                    <td><?php echo $charge->qty; ?></td>
                                    <td><?php echo $charge->unit; ?></td>
                                    <td><?php echo $charge->price; ?></td>
                                    <td><?php echo $charge->amount; ?></td>
                                    <td>
                                        <select class="form-select form-select-sm" onchange="location = this.value;">
                                            <option value="">Select</option>
                                            <option value="<?php echo base_url('dashboard/edit_pmc/'.$charge->pmc_id.'/'.$ticket_info->ticket_no);?>">Edit</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No parts or material charges found.</p>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>  
        </div>

        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <div class="row">
                    <div class="col">
                        <span class="fw-bold text-primary fs-5">LABOR / OTHER CHARGES</span>
                    </div>
                    <div class="col text-end">
                        <a href="" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#labor_and_charges_form">
                            <i class="bi bi-plus-circle"></i>
                            Add
                        </a>
                    </div>
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <td class="fw-bold">CHARGES</td>    
                            <td class="fw-bold">AMOU    NT</td>
                            <td class="fw-bold">ACTION</td>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php if(!empty($labor_or_other_charges)):?>
                                <?php foreach ($labor_or_other_charges as $labor_charges): ?>
                                    <tr>
                                        <td><?php echo $labor_charges->charges;?></td>
                                        <td><?php echo $labor_charges->amount;?></td>
                                        <!-- <td>
                                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                                <option value="">Select</option>
                                                <option value="<?php echo base_url('dashboard/edit_pmc/'.$charge->pmc_id.'/'.$ticket_info->ticket_no);?>">Edit</option>
                                            </select>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                        <?php else: ?>
                            <p>No parts or material charges found.</p>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>  
        </div>

        <div class="bg-white rounded shadow-sm mb-3 mt-4">
             <div class="p-3">
                <form action="<?php echo base_url("dashboard/update_serial_info/".$ticket_info->ticket_no)?>" method="post" class="needs-validation" novalidate>
                    <div class="fw-bold text-primary fs-5 mb-3">OTHER ITEMS</div>

                    <div class="form-group mb-5">
                        <label for="" class="form-label fs-6">Remarks <span class="text-secondary">(please separate your remarks by adding ", " in between if it's multiple.)</span></label>
                        <div class="input-group input-group-sm">
                            <textarea colos="30" rows="3" name="remarks" class="form-control" required><?php if (!empty($service_invoice_info)) {echo $service_invoice_info->remarks;} ;?></textarea>
                            <div class="valid-feedback">
                                Okay!
                            </div>
                            <div class="invalid-feedback">
                                Add remarks
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Total amount of parts and material charges <span class="text-secondary">(optional)</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="pmc_charges_php" class="form-control" value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->pmc_charges_php;} ;?>"  placeholder="0.00">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add cost
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Total amount of labor and other charges <span class="text-secondary">(optional)</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="lo_charges_php" class="form-control" value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->lo_charges_php;} ;?>"  placeholder="0.00">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add cost
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Overall parts and labor cost <span class="text-secondary">(optional)</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="labor_and_parts_cost" class="form-control" value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->labor_and_parts_cost;} ;?>" placeholder="0.00">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add cost
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Change serial no.  <span class="text-secondary">(Optional! Please separate serial numbers by adding ", " in between if it's multiple.)</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="serial_no" class="form-control" value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->serial_no;} ;?>"/>
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add product serial no
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Change date of release <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="date" name="date_of_release" class="form-control" required value="<?php if(!empty($service_invoice_info)){echo $ticket_info->date_of_release;} else{ echo " "; }?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add date of release
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Approved by <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="approved_by" placeholder="ex. Juan M. Cruz" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ \.]*$" required value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->approved_by;} ;?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Capitalize the first letter
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Checked by <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="checked_by" placeholder="ex. Juan M. Cruz" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ \.]*$" required value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->checked_by;} ;?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Capitalize the first letter
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Released_by <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="released_by" placeholder="ex. Juan M. Cruz" class="form-control" pattern="^[A-ZÑñ][a-zA-ZÑñ \.]*$" required value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->released_by;} ;?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Capitalize the first letter
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Date of signature <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="date" name="date" class="form-control" required value="<?php if (!empty($service_invoice_info)) {echo $service_invoice_info->date; } ;?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add date of signature
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>                    
                
                    <?php if (!empty($service_invoice_info)) { ?>
                        <div class="mb-3 d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary btn-sm" value="Save"/>
                        </div>  
                    <?php } ?>
                </form>
             </div>
        </div>
    <?php endif; ?>            
</div>
<!-- End of configurations -->

<!-- parts_and_mats_form -->
<?php include(APPPATH.'views/dashboard/components/partials/parts_and_mats_form.php'); ?>

<!-- labor_and_charges_form -->
<?php include(APPPATH.'views/dashboard/components/partials/labor_and_other_charges_form.php'); ?>

<!-- confirm_create_invoice -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_create_invoice.php'); ?>

<!-- confirm_delete_invoice -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_delete_invoice.php'); ?>

<!-- email_form -->
<?php include(APPPATH.'views/dashboard/components/partials/email_form.php'); ?>