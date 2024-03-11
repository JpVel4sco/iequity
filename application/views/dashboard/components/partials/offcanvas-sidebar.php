<!-- OFFCANVAS STYLE 1 -->
<div class="offcanvas offcanvas-start" data-bs-backdrop="true" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 200px;">
    <div class="offcanvas-header justify-content-center">
        <h5 class="offcanvas-title me-3" id="offcanvasWithBothOptionsLabel">
            <img src="<?php echo base_url('assets/images/company_profile/'.$company_info->comp_logo); ?>" width="100%" height="100%" alt="logo">
        </h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav flex-column">
            <li class="nav-item my-1">
                <a class="nav-link" href="<?php echo base_url();?>dashboard">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="nav-item my-1">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-ticket-perforated me-2"></i>
                    Tickets
                </a>
                <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url();?>dashboard/tickets">All tickets</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url();?>dashboard/cancelled_tickets">Cancelled</a></li>
                </ul>
            </li>

            <?php foreach ($user_info as $u_data): ?>
                <?php if($u_data['account_type'] == 'technical' || $u_data['account_type'] == 'technical support' ): ?>
                    <li class="nav-item my-1">
                        <a class="nav-link" href="<?php echo base_url();?>dashboard/assigned_tickets">
                            <i class="bi bi-ticket-perforated me-2"></i>
                            Assigned tickets
                        </a>
                    </li>
                <?php endif; ?>    
            <?php endforeach; ?>

            <?php foreach ($user_info as $u_data): ?>
                <?php if($u_data['account_type'] == 'admin' || $u_data['account_type'] == 'super admin'): ?>
                    <li class="nav-item my-1">
                        <a class="nav-link" href="<?php echo base_url();?>dashboard/users">
                            <i class="bi bi-people me-2"></i>
                            Users
                        </a>
                    </li>
                <?php endif; ?>    
            <?php endforeach; ?>

            <?php foreach ($user_info as $u_data): ?>
                    <li class="nav-item my-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear me-2"></i>
                            Settings
                        </a>
                        <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if($u_data['account_type'] == 'admin' || $u_data['account_type'] == 'super admin'): ?>
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/company_profile">Company profile</a></li>
                            <?php endif; ?>
                            <?php if($u_data['account_type'] == 'super admin'): ?>
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/rbac">Access control</a></li>
                            <?php endif; ?>
                            <?php if($u_data['account_type'] == 'admin' || $u_data['account_type'] == 'super admin'): ?>
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/backup_and_restore">Backup and Restore</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/edit_profile_page">Edit profile</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('login_controller/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
            <?php endforeach; ?>
            
        </ul>       
    </div>
</div>