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
            
            <?php if ($technician_permissions->edit_memo == "Yes"): ?>
                <?php if($ticket_info->t_ticket_status != 'closed' ):?>
                    <?php if($u_data['account_type'] == 'technical' || $u_data['account_type']=='technical support'): ?>
                        <?php if ($ticket_info->t_technical_assigned != $u_data['fname']." ".$u_data['lname']): ?>
                            <button class="d-none btn btn-sm btn-dark me-2" onclick="enableForm('memo_form')">Edit memo <i class="bi bi-pencil-square"></i></button>
                        <?php else: ?>
                            <button class="btn btn-sm btn-dark me-2" onclick="enableForm('memo_form')">Edit memo <i class="bi bi-pencil-square"></i></button>
                        <?php endif; ?>
                    <?php else:?>
                        <button class="btn btn-sm btn-dark me-2" onclick="enableForm('memo_form')">Edit memo <i class="bi bi-pencil-square"></i></button>
                    <?php endif; ?>
                <?php elseif($ticket_info->t_ticket_status == 'closed' ):?>
                    <button class="btn btn-sm btn-dark me-2" disabled>Edit memo <i class="bi bi-pencil-square"></i></button>
                <?php endif; ?>    
            <?php else: ?>
                <button class="d-none btn btn-sm btn-dark me-2" onclick="enableForm('memo_form')">Edit memo <i class="bi bi-pencil-square"></i></button>
            <?php endif; ?>

            <?php if ($technician_permissions->delete_memo == "Yes"): ?>
                <?php if($ticket_info->t_ticket_status != 'closed' ):?>
                    <?php if($u_data['account_type'] == 'technical' || $u_data['account_type']=='technical support'): ?>
                        <?php if ($ticket_info->t_technical_assigned != $u_data['fname']." ".$u_data['lname']): ?>
                            <button class="d-none btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_memo">Delete memo <i class="bi bi-trash"></i></button>
                        <?php else: ?>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_memo">Delete memo <i class="bi bi-trash"></i></button>
                        <?php endif; ?>
                    <?php else: ?>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_memo">Delete memo <i class="bi bi-trash"></i></button>
                    <?php endif; ?> 
                <?php elseif($ticket_info->t_ticket_status == 'closed' ):?> 
                    <button class="btn btn-sm btn-danger" disabled>Delete memo <i class="bi bi-trash"></i></button>
                <?php endif; ?>    
            <?php else: ?>
                <button class="d-none btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_memo">Delete memo <i class="bi bi-trash"></i></button>
            <?php endif; ?>

        </div>
    </div>

    <div class="row my-2 p-1">
        <div class="col p-3 bg-white m-2 rounded shadow-sm">
            <form action="<?php echo base_url('dashboard/update_memo/'.$memo->memo_id.'/'.$ticket_info->ticket_no);?>" method="post" name="memo_form" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label for="" class="form-label fs-6">Reported problem <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <textarea name="problem" cols="30" rows="3" class="form-control" disabled><?php echo $memo->problem; ?></textarea>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label fs-6">Repair Solution <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <textarea name="repair_solution" cols="30" rows="3" class="form-control" disabled required><?php echo $memo->repair_solution; ?></textarea>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add repair solution
                        </div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label fs-6">Accessories <span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="accessories" class="form-control" disabled value="<?php echo $memo->accessories; ?>" required>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Add accessories
                        </div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label fs-6">Add Attachment</label>
                    <p class="text-danger">Note: <span class="text-secondary"> It can only upload the files like PDF, JPEG, JPG, PNG, PPT, PPTX, DOC, DOCX, zip or 7z files</span></p>
                    <div class="input-group input-group-sm">
                        <input type="file" name="attachments[]" class="form-control" accept=".pdf, .jpeg, .jpg, .png, .ppt, .pptx, .doc, .docx, .zip, .7z" disabled multiple>
                    </div>
                </div>


                <!-- Display attachments, if any -->
                <?php if (!empty($attachments)) : ?>
                    <h4>Attachments:</h4>
                    <ul class="list-unstyled" style="margin-left: 15px;">
                        <?php foreach ($attachments as $attachment) : ?>
                            <?php $file_extension = pathinfo($attachment, PATHINFO_EXTENSION); ?>
                            <?php if ($file_extension === 'pdf') : ?>
                                <li>
                                    <a href="<?php echo base_url('assets/attachments/' . $attachment); ?>" target="_blank"><?php echo $attachment; ?></a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?php echo base_url('assets/attachments/' . $attachment); ?>" target="_blank"><?php echo $attachment; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No attachments found.</p>
                <?php endif; ?>

                <?php if (!empty($memo->attachment) && file_exists('./assets/attachments/' . $memo->attachment)) { ?>
                 
                <?php } else{?> 
                <!-- Nothing to display if empty -->

                <?php } ?>  
                
                <div class="form-group mb-2" id="status_indicator">
                    <label for="" class="form-label fs-6">Status <span class="text-danger">*</span></label><br>
                    <?php if ($memo->status == 'repaired'): ?>
                        <button class="btn btn-sm btn-success" disabled>Repaired</button>
                    <?php elseif ($memo->status == 'on-progress'): ?>
                        <button class="btn btn-sm btn-warning" disabled>On-progress</button>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3" id="status_update">
                    <label for="" class="form-label fs-6">Status <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="repaired" <?php if($memo->status == 'repaired'){ echo 'checked'; } ?> disabled>
                        <label class="form-check-label" for="status_repaired">
                            Repaired
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="on-progress" <?php if($memo->status == 'on-progress'){ echo 'checked'; } ?> disabled>
                        <label class="form-check-label" for="status_on_progress">
                            On-progress
                        </label>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary" disabled>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- diagnose form -->
<?php include(APPPATH.'views/dashboard/components/partials/diagnose_form.php'); ?>

<!-- confirm close ticket -->
<?php include(APPPATH.'views/dashboard/components/partials/confirm_delete_memo.php'); ?>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        var form = document.forms['memo_form'];
        var inputs = form.getElementsByTagName('input');
        var textareas = form.getElementsByTagName('textarea');
        var submitButton = form.querySelector('button[type="submit"]');
        var statusIndicator = document.getElementById('status_indicator');
        var statusUpdate = document.getElementById('status_update');

        for (var i = 0; i < textareas.length; i++) {
            textareas[i].disabled = true;
        }

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = true;
        }

        submitButton.disabled = true;

        statusIndicator.style.display = 'block';
        statusUpdate.style.display = 'none';
        submitButton.style.display = 'none';
    });

    function enableForm(formName) {
        var form = document.forms[formName];
        var inputs = form.getElementsByTagName('input');
        var textareas = form.getElementsByTagName('textarea');
        var submitButton = form.querySelector('button[type="submit"]');
        var statusIndicator = document.getElementById('status_indicator');
        var statusUpdate = document.getElementById('status_update');

        for (var i = 0; i < textareas.length; i++) {
            textareas[i].disabled = false;
        }

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
        }

        submitButton.disabled = false;

        statusIndicator.style.display = 'none';
        statusUpdate.style.display = 'block';
        submitButton.style.display = 'block';
    }
</script>