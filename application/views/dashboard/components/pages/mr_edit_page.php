<title>MR</title>
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
            MR edit page
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
        <div class="col">Summary of MR goes here</div>
        <div class="col text-end">
            <?php if (!empty($mr_info)) { ?>
                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirm_delete_mr">
                    <i class="bi bi-trash"></i>
                    Delete MR
                </a>
                <a href="<?php echo base_url('dashboard/printMR/'.$ticket_info->ticket_no)?>" class="btn btn-dark btn-sm" target="_blank">
                    <i class="bi bi-printer"></i>
                    Open print page
                </a>
                <a href="#" class="d-none btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#cconfirm_create_mr">
                    <i class="bi bi-plus-circle"></i>
                    Create MR
                </a>
            <?php } else { ?>
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#confirm_create_mr">
                    <i class="bi bi-plus-circle"></i>
                    Create MR
                </a>
                <a href="#" class="d-none btn btn-dark btn-sm 2-25" target="_blank">
                    <i class="bi bi-printer"></i>
                    Open print page
                </a>
            <?php } ?>
        </div>
    </div>

    <?php if(!empty($mr_info)): ?>
        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <div class="row">
                    <div class="col">
                        <span class="fw-bold text-primary fs-5">MR Information</span>
                    </div>
                    <div class="col text-end">
                        
                    </div>
                </div>
                <table class="table table-borderless mt-3">
                    <tbody>
                        <tr>
                            <td class="fw-bold">COMPANY:</td>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->comp_name;} else{ echo " "; }?></td>
                            <td class="fw-bold">MR NO.:</td>
                            <td><?php if(!empty($mr_info)){echo $mr_info->mr_no;} else{ echo " "; }?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">NAME:</td>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->fname." ".$ticket_info->lname;} else{ echo " "; }?></td>
                            <td class="fw-bold">DATE CREATED:</td>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->ticket_registration_date;} else{ echo " "; }?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">ADDRESS:</td>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->comp_address;} else{ echo " "; } ?></td>
                            <td class="fw-bold">CONTACT NO.:</td>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->mobile;} else{ echo " "; } ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <td class="fw-bold">QTY</td>
                            <td class="fw-bold">UNIT</td>
                            <td class="fw-bold">DESCRIPTION</td>
                            <td class="fw-bold">REMARKS</td>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->t_qty;} else{ echo " "; }?></td>
                            <td><?php if(!empty($mr_info)){echo $ticket_info->t_unit;} else{ echo " "; }?></td>
                            <td>
                                <?php if(!empty($mr_info)): ?>
                                    <span>Model: <?php echo $ticket_info->t_model; ?></span><br>
                                    <span>SN: <?php echo $ticket_info->t_serial_no; ?></span><br><br>
                                    <span>Accessories: <br>
                                    <?php
                                        $accessories = explode(',', $mr_info->accessories);
                                        ?>

                                        <ul>
                                        <?php foreach ($accessories as $accessory): ?>
                                            <li><?php echo trim($accessory); ?></li>
                                        <?php endforeach; ?>
                                        </ul>

                                    </span>
                                <?php else: ?>
                                    <span></span>
                                <?php endif; ?>
                            </td>
                            <td><?php if(!empty($mr_info)){echo $mr_info->remarks;} else{ echo " "; }?></td>
                    </tbody>
                </table>

            </div>
        </div>
    <?php endif; ?>    

    
    <?php if(!empty($mr_info)): ?>
        <div class="row my-2 p-1">
            <div class="col p-3 bg-white m-2 rounded shadow-sm">
                <div class="row">
                    <div class="col">
                        <span class="fw-bold text-primary fs-5">Other items</span>
                    </div>
                    <div class="col text-end">
                        
                    </div>
                </div>
                <form action="<?php echo base_url('dashboard/update_mr/'.$ticket_info->ticket_no);?>" class="" method="post">

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Remarks <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <textarea name="remarks" cols="30" rows="5" class="form-control" required><?php echo $mr_info->remarks; ?></textarea>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add remarks
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Change serial no.  <span class="text-secondary">(Optional! Please separate serial numbers by adding ", " in between if it's multiple.)</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="serial_no" class="form-control" value="<?php echo $mr_info->serial_no; ?>"/>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add product serial no
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Accessories</label>

                    <?php $fetched_accessories = $mr_info->accessories; ?>

                    <div class="input-group input-group-sm">
                        <input type="text" name="accessory_input" class="form-control" id="accessory_input">
                        <button class="btn btn-sm btn-primary" id="add-accessory-btn" type="button">Add</button>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add accessories
                        </div>
                    </div>

                    <div class="d-none input-group input-group-sm mt-1">
                        <textarea id="accessory_list" name="accessory_list" cols="30" rows="3" class="form-control" readonly required><?php echo $fetched_accessories; ?></textarea>
                    </div>

                    <div class="input-group input-group-sm mt-1" id="remove-accessory-container">
                        <?php
                        if (!empty($fetched_accessories)) {
                            $accessory_array = explode(',', $fetched_accessories);
                            foreach ($accessory_array as $accessory) {
                                $accessory = trim($accessory); // Remove leading and trailing whitespaces
                                if (!empty($accessory)) {
                                    echo '<button class="btn btn-sm btn-danger remove-accessory-btn me-2 w-auto" type="button" data-accessory="' . $accessory . '"><i class="bi bi-x-circle"></i>&nbsp;' . $accessory . '</button>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Prepared by <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="prepared_by" class="form-control" required value="<?php echo $mr_info->prepared_by; ?>">
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add prepared by
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Received by <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="received_by" class="form-control" required value="<?php echo $mr_info->received_by; ?>">
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add received by
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="" class="form-label fs-6">Status <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="PULL-OUT" required <?php if($mr_info->status == 'PULL-OUT'){ echo 'checked'; } ?>>
                        <label class="form-check-label" for="Pull-out">
                            Pull-out
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="RETURN" required <?php if($mr_info->status == 'RETURN'){ echo 'checked'; } ?>>
                        <label class="form-check-label" for="Return">
                            Return
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="COMPLETION" required <?php if($mr_info->status == 'COMPLETION'){ echo 'checked'; } ?>>
                        <label class="form-check-label" for="Completion">
                            Completion
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="ISSUANCE" required <?php if($mr_info->status == 'ISSUANCE'){ echo 'checked'; } ?>>
                        <label class="form-check-label" for="Issuance">
                            Issuance
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="RECEIVE" required <?php if($mr_info->status == 'RECEIVE'){ echo 'checked'; } ?>>
                        <label class="form-check-label" for="Receive">
                            Receive
                        </label>
                    </div>
                </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-success btn-sm" value="Update"/>
                    </div>

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

<!-- confirm_create_mr -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_create_mr.php'); ?>

<!-- confirm_delete_invoice -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_delete_mr.php'); ?>

<script>
  const addedAccessories = []; // Array to track added accessories

  // Function to check for duplicate items
  function isDuplicate(value) {
    return addedAccessories.includes(value);
  }

  // Function to add an accessory to the list
  function addAccessory() {
    const input = document.getElementById('accessories_input');
    const value = input.value.trim();

    if (value !== '') {
      if (isDuplicate(value)) {
        alert('The item is already added.');
      } else {
        const list = document.getElementById('accessories_list');
        const accessoryItem = document.createElement('span');
        accessoryItem.textContent = value;
        accessoryItem.classList.add('badge', 'bg-primary', 'me-1');

        const removeButton = document.createElement('button');
        removeButton.innerHTML = '<i class="bi bi-x-circle"></i> ' + value; // Include the icon and the accessory value in the remove button
        removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'me-1');
        removeButton.addEventListener('click', function () {
          const index = addedAccessories.indexOf(value);
          addedAccessories.splice(index, 1);
          accessoryItem.remove();
          removeButton.remove();
          updateAccessoriesList(); // Call the function to update the container list
        });

        list.appendChild(accessoryItem);
        document.getElementById('remove-accessories-container').appendChild(removeButton);

        addedAccessories.push(value); // Add the accessory to the tracking array

        input.value = '';
        updateAccessoriesList(); // Call the function to update the container list
      }
    }
  }

  // Function to update the container list
  function updateAccessoriesList() {
    const list = document.getElementById('accessories_list');
    const accessories = addedAccessories.join(', ');
    list.textContent = accessories;
  }

  // Add event listener to the "Add" button
  document.getElementById('add-accessory-btn').addEventListener('click', addAccessory);
</script>

<script>
    // Add event listener to add button
    document.getElementById('add-accessory-btn').addEventListener('click', function() {
        var accessoryInput = document.getElementById('accessory_input');
        var removeAccessoryContainer = document.getElementById('remove-accessory-container');

        if (accessoryInput.value.trim() !== '') {
            var accessory = accessoryInput.value.trim();
            
            // Check if accessory already exists in the list
            var existingAccessories = document.getElementsByClassName('remove-accessory-btn');
            var isDuplicate = false;
            for (var i = 0; i < existingAccessories.length; i++) {
                var existingAccessory = existingAccessories[i].getAttribute('data-accessory');
                if (existingAccessory.toLowerCase() === accessory.toLowerCase()) {
                    isDuplicate = true;
                    break;
                }
            }
            
            if (isDuplicate) {
                alert('The accessory is already added.');
                accessoryInput.value = ''; // Clear the input field
                return;
            }

            var removeButton = document.createElement('button');
            removeButton.className = 'btn btn-sm btn-danger remove-accessory-btn me-2 w-auto';
            removeButton.type = 'button';
            removeButton.setAttribute('data-accessory', accessory);
            removeButton.innerHTML = '<i class="bi bi-x-circle"></i>&nbsp;' + accessory;

            removeButton.addEventListener('click', function() {
                var accessoryToRemove = this.getAttribute('data-accessory');
                this.parentNode.removeChild(this);
                updateAccessoryList(); // Update accessory list after removing the button
            });

            removeAccessoryContainer.appendChild(removeButton);
            accessoryInput.value = '';

            // Update accessory list
            updateAccessoryList();

            // Clear trailing comma in the accessory list
            var accessoryList = document.getElementById('accessory_list');
            accessoryList.value = accessoryList.value.replace(/,\s*$/, "");
        }
    });

    // Function to update accessory list and remove items
    function updateAccessoryList() {
        var accessoryList = document.getElementById('accessory_list');
        var removeAccessoryButtons = document.getElementsByClassName('remove-accessory-btn');

        // Clear existing accessory list
        var accessories = [];

        // Build array of accessories and add event listeners to remove buttons
        for (var i = 0; i < removeAccessoryButtons.length; i++) {
            var accessory = removeAccessoryButtons[i].getAttribute('data-accessory');
            accessories.push(accessory);

            removeAccessoryButtons[i].addEventListener('click', function() {
                var accessoryToRemove = this.getAttribute('data-accessory');
                this.parentNode.removeChild(this);
                updateAccessoryList(); // Update accessory list after removing the button
            });
        }

        // Update accessory list
        accessoryList.value = accessories.join(', ');
    }

    // Initial update of accessory list and remove buttons
    updateAccessoryList();

</script>