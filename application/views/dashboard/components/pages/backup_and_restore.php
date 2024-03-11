<title>System Maintenance</title>
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
            Backup and Restore Settings
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
    System data settings goes here
    <div class="bg-white rounded shadow-sm mb-5 mt-2">
        <div class="p-3">
            <div class="row mb-2">
                <div class="col">
                    <span class="fw-bold text-primary fs-5">Backup database</span><br>
                </div>
                <div class="col text-end">
                    <button class="btn btn-sm btn-success w-25" data-bs-toggle="modal" data-bs-target="#create_copy_of_database">Create</button>
                    <button class="btn btn-sm btn-dark w-25" data-bs-toggle="modal" data-bs-target="#restore_database">Restore</button>
                </div>
            </div>
            
            <div class="mb-2">
                Before you move forward, it's essential to back up your database. This simple step ensures the safety of vital data like user profiles, permissions, ticket histories, and more.
            </div>
            
            <?php
            // Helper function to format the file size
            function format_file_size($size)
            {
                $units = array('B', 'KB', 'MB', 'GB', 'TB');
                $unit_index = 0;

                while ($size >= 1024 && $unit_index < count($units) - 1) {
                    $size /= 1024;
                    $unit_index++;
                }

                return round($size, 2) . ' ' . $units[$unit_index];
            }
            ?>

            <!-- Database Backup Table -->
            <table class="table table-bordered">
                <thead>
                    <tr class="fw-bold text-center">
                        <th>Database Backup Filename</th>
                        <th>Date Created</th>
                        <th>File Size</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($database_file_list)): ?>
                        <tr>
                            <td colspan="4" class="text-center">No database backups available</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($database_file_list as $file_info): ?>
                            <tr>
                                <td><?php echo $file_info['filename']; ?></td>
                                <td class="text-center"><?php echo $file_info['date_created']; ?></td>
                                <td class="text-center"><?php echo format_file_size($file_info['file_size']); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('dashboard/download_backup_database/' . $file_info['filename']); ?>">Download</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded shadow-sm">
        <div class="p-3">

            <div class="row mb-2">
                <div class="col">
                    <span class="fw-bold text-primary fs-5">Backup assets</span><br>
                </div>
                <div class="col text-end">
                    <button class="btn btn-sm btn-success w-25" data-bs-toggle="modal" data-bs-target="#create_copy_of_asset_folder">Create</button> 
                    <button class="btn btn-sm btn-dark w-25" data-bs-toggle="modal" data-bs-target="#restore_assets">Restore</button>
                </div>
            </div>

            <div class="mb-2">
                Creating a backup of your folder, in addition to the database, is crucial for data redundancy, file-level recovery, system restoration, and data integrity. It ensures comprehensive protection and enables quick recovery in case of data loss or system failures.
            </div>
            
            <table class="table table-bordered">
                <thead>
                    <tr class="fw-bold text-center">
                        <th>Assets Backup Filename</th>
                        <th>Date Created</th>
                        <th>File Size</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($assets_file_list)): ?>
                        <tr>
                            <td colspan="4" class="text-center">No assets backups available</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($assets_file_list as $file_info): ?>
                            <tr>
                                <td><?php echo $file_info['filename']; ?></td>
                                <td class="text-center"><?php echo $file_info['date_created']; ?></td>
                                <td class="text-center"><?php echo format_file_size($file_info['file_size']); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('dashboard/download_backup_assets/' . $file_info['filename']); ?>">Download</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- create copy of database -->
<div class="modal fade" id="create_copy_of_database" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Create a copy of database?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/create_database_copy')?>" method="POST">

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Yes"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create copy of database -->

<!-- create copy of assets folder and files -->
<div class="modal fade" id="create_copy_of_asset_folder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Create a copy of assets folder?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/backup_assets_folder');?>" method="POST">

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Yes"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- create copy of assets folder and files -->

<!-- RESTORE DATABASE FORM -->
<div class="modal fade" id="restore_database" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Restore database</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/restore_database');?>" method="POST" enctype="multipart/form-data">
                    <h3 class="fs-5 mb-3">Upload the required file to restore the database</h3>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Backup file <span class="text-danger">* </span><span class="text-secondary">(upload a .sql file)</span></label>
                        <div class="input-group input-group-sm">
                            <input type="file" class="form-control" name="dump_file" accept=".sql" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Submit"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- RESTORE DATABASE FORM -->
<div class="modal fade" id="restore_assets" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-3 text-primary" id="exampleModalLabel">Restore assets</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('dashboard/restore_assets');?>" method="POST" enctype="multipart/form-data">
                    <h3 class="fs-5 mb-3">Upload the required file to restore the assets</h3>

                    <div class="form-group mb-3">
                        <label for="" class="form-label fs-6">Backup file <span class="text-danger">* </span> </span><span class="text-secondary">(upload a .zip file)</span></label>
                        <div class="input-group input-group-sm">
                            <input type="file" class="form-control" name="assets_zip" accept=".zip" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Submit"/>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>