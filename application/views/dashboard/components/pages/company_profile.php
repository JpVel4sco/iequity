<title>Company profile</title>
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
            Configure company profile
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
    Company form
        <form action="<?php echo base_url()?>dashboard/update_company_profile" method="post" class="needs-validation" novalidate name="edit_company_profile_form" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="bg-white my-3 rounded shadow-sm p-2">
                        <div class="my-2 p-1">
                            <span class="fw-bold text-primary fs-5">Images</span>    
                            
                            <div class="form-group mb-3">
                              <label for="" class="form-label fs-6">Logo <span class="text-danger">*</span></label>
                              <div class="input-group input-group-sm">
                                  <input type="file" name="comp_logo" id="comp_logo" class="form-control">
                                  <div class="valid-feedback">
                                      Okay!
                                  </div>
                              </div>
                              <div id="comp_logo_error" class="invalid-feedback">
                                  Enter a valid image file (PNG, JPG, JPEG) with maximum dimensions of 120x50 pixels.
                              </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Company building <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="file" name="comp_bldg_pic" id="comp_bldg_pic" class="form-control">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div id="comp_bldg_pic_error" class="invalid-feedback">
                                        Enter a valid image file (PNG, JPEG, JPG, max size: 1MB, max dimensions: 960px x 960px)
                                    </div>
                                </div>
                            </div>
                              
                        </div>

                        <div class="my-2 p-1">
                            <span class="fw-bold text-primary fs-5">Company information</span>    
                            
                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Company name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="comp_name" id="comp_name" class="form-control" required value="<?php echo $company_info->comp_name; ?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Provide a company name or 'n/a' if not applicable.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Address <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="comp_address" id="comp_address"class="form-control" required pattern="[a-zA-Z0-9#,.\s]*" value="<?php echo $company_info->comp_address; ?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Provide a company address or 'n/a' if not applicable.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Website <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="url" name="comp_web_address" id="comp_web_address" class="form-control" required placeholder="ex. https://www.website.com" value="<?php echo $company_info->comp_web_address; ?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please include at the beginning "https://"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="bg-white my-3 rounded shadow-sm p-2">
                        <div class="my-2 p-1">
                            <span class="fw-bold text-primary fs-5">Contact section</span>    

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Telefax <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="comp_telefax" id="comp_telefax"class="form-control" required value="<?php echo $company_info->comp_telefax; ?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter a valid telefax
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Email for inquiry <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="email" name="comp_email" id="comp_email"class="form-control" required value="<?php echo $company_info->comp_email; ?>">
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter a valid email
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Mobile contacts <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="contact_no" id="contact_no"class="form-control" pattern="\d{11}" value="<?php echo $company_info->contact_no; ?>">
                                    <button class="btn btn-sm btn-primary" id="add-mobile-btn" type="button">Add</button>
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter a valid mobile contacts
                                    </div>
                                </div>

                                <div class="d-none input-group input-group-sm mt-1">
                                    <textarea id="contact_nums" name="contact_nums" cols="30" rows="3" class="form-control" readonly required></textarea>
                                </div>
                                <div class="input-group input-group-sm mt-1" id="remove-mobile-container">
                                    <!-- Remove buttons will be dynamically added here -->
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label fs-6">Telephone no. <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="comp_tel" id="comp_tel"class="form-control" pattern="[0-9,#() -]+" value="<?php echo $company_info->comp_tel_no; ?>">
                                    <button class="btn btn-sm btn-primary" id="add-tel-btn" type="button">Add</button>
                                    <div class="valid-feedback">
                                        Okay!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter a valid telephone no.
                                    </div>
                                </div>

                                <div class="d-none input-group input-group-sm mt-1">
                                    <textarea id="comp_telephone_nums" name="comp_telephone_nums" cols="30" rows="3" class="form-control" readonly required></textarea>
                                </div>
                                <div class="input-group input-group-sm mt-1" id="remove-tel-container">
                                    <!-- Remove buttons will be dynamically added here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-success btn-sm" value="Submit"/>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- End of configurations -->

<script>
document.addEventListener('DOMContentLoaded', function() {
  var addMobileBtn = document.getElementById('add-mobile-btn');
  var contactNoInput = document.getElementById('contact_no');
  var contactNumsTextarea = document.getElementById('contact_nums');
  var removeBtnContainer = document.getElementById('remove-mobile-container');
  var form = document.forms['edit_company_profile_form'];

  function updateAddButtonState() {
    var mobileNumber = contactNoInput.value.trim();
    var isValidMobileNumber = /^(\+)?(\d{1,3})?[-.\s]?(\d{10})$/.test(mobileNumber);

    addMobileBtn.disabled = mobileNumber === '' || !isValidMobileNumber;
  }

  function resetMobileInput() {
    contactNoInput.value = '';
    contactNoInput.classList.remove('is-valid');
    contactNoInput.classList.remove('is-invalid');
    contactNoInput.setCustomValidity('');
  }

  function formatMobileNumber(mobileNumber) {
    return mobileNumber.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
  }

  function resetValidation(inputField) {
    inputField.setCustomValidity('');
  }

  function isMobileNumberUnique(mobileNumber) {
    var mobileNumbers = contactNumsTextarea.value.split(' | ');
    return !mobileNumbers.includes(mobileNumber);
  }

  function updateRemoveButtons() {
    var storedMobileNumbers = contactNumsTextarea.value.split(' | ');

    // Clear all remove buttons
    removeBtnContainer.innerHTML = '';

    // Create remove buttons for each stored mobile number
    storedMobileNumbers.forEach(function(number) {
      var removeBtn = document.createElement('button');
      removeBtn.type = 'button';
      removeBtn.classList.add('btn', 'btn-outline-success', 'btn-sm', 'me-1', 'mb-1');
      removeBtn.innerHTML = '<i class="bi bi-x-circle"></i> ' + number;
      removeBtn.addEventListener('click', function() {
        removeMobileNumber(removeBtn);
      });
      removeBtnContainer.appendChild(removeBtn);
    });
  }

  function removeMobileNumber(removeBtn) {
    var formattedMobileNumber = removeBtn.innerHTML.substring('<i class="bi bi-x-circle"></i>'.length);
    var mobileNumbers = contactNumsTextarea.value.split(' | ');

    // Remove the target mobile number from the array
    var updatedMobileNumbers = mobileNumbers.filter(function(number) {
      return number.trim() !== formattedMobileNumber.trim();
    });

    // Update the text area with the formatted mobile numbers
    contactNumsTextarea.value = updatedMobileNumbers
      .map(function(number, index) {
        if (index === 0) {
          return number.trim();
        } else {
          return ' | ' + number.trim();
        }
      })
      .join('');

    // Remove the remove button from the container
    removeBtnContainer.removeChild(removeBtn);

    updateAddButtonState();
  }

  contactNoInput.addEventListener('input', function() {
    updateAddButtonState();
  });

  contactNoInput.addEventListener('keyup', function(event) {
    if (event.key === 'Backspace' && contactNoInput.value === '') {
      resetMobileInput();
      updateAddButtonState();
    }
  });

  document.addEventListener('click', function(event) {
    if (!contactNoInput.contains(event.target)) {
      if (contactNoInput.value === '') {
        resetMobileInput();
      }
      updateAddButtonState();
    }
  });

  addMobileBtn.addEventListener('click', function() {
    var mobileNumber = contactNoInput.value.trim();
    if (mobileNumber !== '') {
      var formattedMobileNumber = formatMobileNumber(mobileNumber);
      if (isMobileNumberUnique(formattedMobileNumber)) {
        if (contactNumsTextarea.value !== '') {
          contactNumsTextarea.value += ' | ';
        }
        contactNumsTextarea.value += formattedMobileNumber;
        resetMobileInput();
        updateAddButtonState();
        updateRemoveButtons();
      } else {
        alert('The mobile number you entered is already added.');
        resetMobileInput();
        updateAddButtonState();
      }
    }
  });

  form.addEventListener('submit', function() {
    // Remove the trailing ' | ' before submitting the form
    contactNumsTextarea.value = contactNumsTextarea.value.replace(/\s*\|\s*$/, '');
  });

  form.addEventListener('reset', function() {
    contactNumsTextarea.value = '';
    updateAddButtonState();
    removeBtnContainer.innerHTML = '';
  });

  // Retrieve fetched data and populate remove buttons
  var fetchedData = contactNoInput.value.trim();
  if (fetchedData !== '') {
    var storedMobileNumbers = fetchedData.split(' | ');
    contactNumsTextarea.value = fetchedData;
    storedMobileNumbers.forEach(function(number) {
      var removeBtn = document.createElement('button');
      removeBtn.type = 'button';
      removeBtn.classList.add('btn', 'btn-outline-success', 'btn-sm', 'me-1', 'mb-1');
      removeBtn.innerHTML = '<i class="bi bi-x-circle"></i> ' + number;
      removeBtn.addEventListener('click', function() {
        removeMobileNumber(removeBtn);
      });
      removeBtnContainer.appendChild(removeBtn);
    });
    contactNoInput.value = '';
  }

  updateAddButtonState();
});
</script>

<script>
 // Get the necessary elements
const compTelInput = document.getElementById("comp_tel");
const addTelButton = document.getElementById("add-tel-btn");
const compTelNumsTextarea = document.getElementById("comp_telephone_nums");
const removeBtnContainer = document.getElementById("remove-tel-container");

// Array to store comp_tel inputs
let compTelInputs = [];

// Function to update the compTelNumsTextarea value
function updateCompTelNums() {
  compTelNumsTextarea.value = compTelInputs.join(" | ");
}

// Function to create a remove button for a comp_tel input
function createRemoveButton(compTelValue) {
  const removeBtn = document.createElement("button");
  removeBtn.type = "button";
  removeBtn.classList.add('btn', 'btn-outline-success', 'btn-sm', 'me-1', 'mb-1');
  removeBtn.innerHTML = '<i class="bi bi-x-circle"></i> ' + compTelValue;
  removeBtn.dataset.value = compTelValue;

  // Add an event listener to the remove button
  removeBtn.addEventListener("click", function () {
    const valueToRemove = this.dataset.value;
    const index = compTelInputs.indexOf(valueToRemove);
    if (index !== -1) {
      // Remove the value from compTelInputs
      compTelInputs.splice(index, 1);

      // Update the compTelNumsTextarea value
      updateCompTelNums();

      // Remove the remove button from the removeBtnContainer
      removeBtnContainer.removeChild(this);
    }
  });

  return removeBtn;
}

// Function to check the input validity and toggle the addTelButton state
function checkInputValidity() {
  const inputValue = compTelInput.value.trim();
  const isValid = inputValue !== "" && compTelInput.validity.valid;

  // Remove validation class if input value is empty
  if (inputValue === "") {
    compTelInput.classList.remove("is-valid");
    compTelInput.classList.remove("is-invalid");
  } else if (isValid) {
    compTelInput.classList.remove("is-invalid");
    compTelInput.classList.add("is-valid");
  } else {
    compTelInput.classList.remove("is-valid");
    compTelInput.classList.add("is-invalid");
  }

  addTelButton.disabled = !isValid;
}

// Disable the addTelButton initially if the input field is empty
addTelButton.disabled = true;

// Add an event listener to the compTelInput for input event
compTelInput.addEventListener("input", function () {
  checkInputValidity();
});

// Add an event listener to the addTelButton
addTelButton.addEventListener("click", function () {
  const compTelValue = compTelInput.value.trim();

  // Check if compTelValue is not empty
  if (compTelValue !== "") {
    // Check if the compTelValue already exists
    if (compTelInputs.includes(compTelValue)) {
      alert("Telephone number already added");
      compTelInput.value = "";
      checkInputValidity();
      return;
    }

    // Add the compTelValue to the compTelInputs array
    compTelInputs.push(compTelValue);

    // Update the compTelNumsTextarea value
    updateCompTelNums();

    // Create a remove button for the compTelValue
    const removeBtn = createRemoveButton(compTelValue);

    // Append the remove button to the removeBtnContainer
    removeBtnContainer.appendChild(removeBtn);
  }

  // Clear the compTelInput value
  compTelInput.value = "";

  // Restore input validity
  checkInputValidity();
});


// Add event listeners to the compTelInput for focus and blur events
compTelInput.addEventListener("focus", function () {
  compTelInput.classList.remove("is-valid");
  compTelInput.classList.remove("is-invalid");
});

compTelInput.addEventListener("blur", function () {
  checkInputValidity();
});

// Add an event listener to the document to remove the validation class when clicking outside the input
document.addEventListener("click", function (event) {
  if (!compTelInput.contains(event.target)) {
    compTelInput.classList.remove("is-valid");
    compTelInput.classList.remove("is-invalid");
  }
});

// Fetch the telephone numbers from the database
const fetchedTelephoneNumbers = "<?php echo $company_info->comp_tel_no; ?>";
if (fetchedTelephoneNumbers) {
  const telephoneNumbers = fetchedTelephoneNumbers.split("|").map(number => number.trim());
  compTelInputs = telephoneNumbers;
  updateCompTelNums();

  // Create remove buttons for the fetched telephone numbers
  telephoneNumbers.forEach(number => {
    const removeBtn = createRemoveButton(number);
    removeBtnContainer.appendChild(removeBtn);
  });

  // Clear the input value after fetching the telephone numbers
  compTelInput.value = "";
}

// Check the input validity initially
checkInputValidity();

</script>

<!-- Focus the input for fname -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const comp_logoInput = document.getElementById('comp_logo');
    comp_logoInput.focus();
  });
</script>

<script>
document.getElementById('comp_logo').addEventListener('change', function () {
    var fileInput = this;
    var file = fileInput.files[0];

    var validExtensions = ['png', 'jpg', 'jpeg'];
    var maxAllowedWidth = 1000;
    var maxAllowedHeight = 1000;
    var maxAllowedSize = 1 * 1024 * 1024; // 1MB

    var isValid = true;
    var errorMessage = '';

    if (file) {
        var fileName = file.name.toLowerCase();
        var extension = fileName.split('.').pop();

        if (validExtensions.indexOf(extension) === -1) {
            isValid = false;
            errorMessage = 'Please select a PNG, JPG, or JPEG image file.';
        } else if (file.size > maxAllowedSize) {
            isValid = false;
            errorMessage = 'Maximum file size allowed is 1MB.';
        } else {
            var img = new Image();
            img.src = window.URL.createObjectURL(file);

            img.onload = function () {
                if (img.width > maxAllowedWidth || img.height > maxAllowedHeight) {
                    isValid = false;
                    errorMessage = 'Maximum image dimensions are 1000x1000 pixels.';
                }

                if (!isValid) {
                    fileInput.classList.add('is-invalid');
                    fileInput.classList.remove('is-valid');
                    document.getElementById('comp_logo_error').style.display = 'block';
                    document.getElementById('comp_logo_error').textContent = errorMessage;
                } else {
                    fileInput.classList.add('is-valid');
                    fileInput.classList.remove('is-invalid');
                    document.getElementById('comp_logo_error').style.display = 'none';
                }
            };
        }
    }

    if (!file) {
        fileInput.classList.remove('is-valid');
        fileInput.classList.remove('is-invalid');
        document.getElementById('comp_logo_error').style.display = 'none';
    } else if (file.size > maxAllowedSize) {
        fileInput.classList.remove('is-valid');
        fileInput.classList.add('is-invalid');
        document.getElementById('comp_logo_error').style.display = 'block';
        document.getElementById('comp_logo_error').textContent = 'Maximum file size allowed is 1MB.';
    }
});

</script>

<script>
    document.getElementById('comp_bldg_pic').addEventListener('change', function() {
        var fileInput = this;
        var file = fileInput.files[0];
        var fileTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        var maxSize = 1 * 1024 * 1024; // 1MB
        var maxWidth = 960;
        var maxHeight = 960;

        if (!file) {
            fileInput.setCustomValidity('Please select an image file.');
            fileInput.classList.add('is-invalid');
            fileInput.classList.remove('is-valid');
            document.getElementById('comp_bldg_pic_error').textContent = 'Please select an image file.';
            return;
        }

        if (!fileTypes.includes(file.type)) {
            fileInput.setCustomValidity('Only PNG, JPEG, and JPG images are allowed.');
            fileInput.classList.add('is-invalid');
            fileInput.classList.remove('is-valid');
            document.getElementById('comp_bldg_pic_error').textContent = 'Only PNG, JPEG, and JPG images are allowed.';
            return;
        }

        if (file.size > maxSize) {
            fileInput.setCustomValidity('The file size exceeds the maximum limit of 1MB.');
            fileInput.classList.add('is-invalid');
            fileInput.classList.remove('is-valid');
            document.getElementById('comp_bldg_pic_error').textContent = 'The file size exceeds the maximum limit of 1MB.';
            return;
        }

        var img = new Image();
        img.src = window.URL.createObjectURL(file);
        img.onload = function() {
            if (img.width > maxWidth || img.height > maxHeight) {
                fileInput.setCustomValidity('The image dimensions should be within 960px x 960px.');
                fileInput.classList.add('is-invalid');
                fileInput.classList.remove('is-valid');
                document.getElementById('comp_bldg_pic_error').textContent = 'The image dimensions should be within 960px x 960px.';
            } else {
                fileInput.setCustomValidity('');
                fileInput.classList.remove('is-invalid');
                fileInput.classList.add('is-valid');
            }
            window.URL.revokeObjectURL(img.src);
        };
    });
</script>