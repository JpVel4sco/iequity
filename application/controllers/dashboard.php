<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class dashboard extends MY_Controller {
    
    // GLOBAL FUNCTION
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('crud_model');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->database();
        $this->load->helper('file');

    }

    // HOME
	public function index(){
        $email = $this->session->userdata('email');
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        
        if($user_info_alt['account_type'] == 'user'){
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $all_unassigned_tickets = $this->crud_model->get_unassigned_tickets_by_user($email);
            $ticket_count = $this->crud_model->ticket_count_by_user($email);
            $ticket_count_open = $this->crud_model->ticket_count_open_by_user($email);
            $ticket_count_closed = $this->crud_model->ticket_count_closed_by_user($email);
            $ticket_count_unassigned = $this->crud_model->ticket_count_unassigned_by_user($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'all_tickets' => $all_unassigned_tickets,
                'ticket_count' => $ticket_count,
                'ticket_count_open' => $ticket_count_open,
                'ticket_count_closed' => $ticket_count_closed,
                'ticket_count_unassigned' => $ticket_count_unassigned,
                'user_info' => $user_info,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/dashboard', $data);
            $this->load->view('dashboard/partials/footer');
        } else{
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $all_unassigned_tickets = $this->crud_model->get_unassigned_tickets();
            $ticket_count = $this->crud_model->ticket_count();
            $ticket_count_open = $this->crud_model->ticket_count_open();
            $ticket_count_closed = $this->crud_model->ticket_count_closed();
            $ticket_count_unassigned = $this->crud_model->ticket_count_unassigned();
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'all_tickets' => $all_unassigned_tickets,
                'ticket_count' => $ticket_count,
                'ticket_count_open' => $ticket_count_open,
                'ticket_count_closed' => $ticket_count_closed,
                'ticket_count_unassigned' => $ticket_count_unassigned,
                'user_info' => $user_info,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/dashboard', $data);
            $this->load->view('dashboard/partials/footer');
        }
	}

    // VIEWING OF ALL TICKETS
	public function tickets(){
        $email = $this->session->userdata('email');
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        
        if($user_info_alt['account_type'] == 'user'){
            $user_info = $this->crud_model->get_data_by_email($email);
            $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
            $company_info = $this->crud_model->get_company_profile();
            $all_tickets = $this->crud_model->get_tickets_by_user($email);
            $ticket_count = $this->crud_model->ticket_count_by_user($email);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            

            $data = array(
                'all_tickets' => $all_tickets,
                'ticket_count' => $ticket_count,
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
                'account_management' => $account_management,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/tickets', $data);
            $this->load->view('dashboard/partials/footer');
        }
        else{
            $user_info = $this->crud_model->get_data_by_email($email);
            $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
            $company_info = $this->crud_model->get_company_profile();
            $all_tickets = $this->crud_model->get_tickets();
            $ticket_count = $this->crud_model->ticket_count();
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

            $data = array(
                'all_tickets' => $all_tickets,
                'ticket_count' => $ticket_count,
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
                'account_management' => $account_management,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/tickets', $data);
            $this->load->view('dashboard/partials/footer');
        }

	}

    // TO VIEW TICKET INFO
	public function view_ticket($t_ticket_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $company_info = $this->crud_model->get_company_profile();
		$ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
        $role_from_user_info = $user_info_alt['account_type'];
        $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
			'ticket_info' => $ticket_info,
            'user_info' => $user_info,
            'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/view_ticket', $data);
		$this->load->view('dashboard/partials/footer');
	}

    // TO SAVE EDITED TICKET INFO
    public function run_ticket_update($t_ticket_no){
        
        $data = array(
            'fname' => $this->input->post('t_fname'),
            'mname' => $this->input->post('t_mname'),
            'lname' => $this->input->post('t_lname'),
            'mobile' => $this->input->post('t_mobile'),
            'comp_name' => $this->input->post('t_comp_name'),
            'comp_address' => $this->input->post('t_comp_address'),
            'comp_tel' => $this->input->post('t_comp_tel'),
            'department' => $this->input->post('t_department'),
            'tin_no' => $this->input->post('t_tin_no'),
            't_model' => $this->input->post('t_model'),
            't_serial_no' => $this->input->post('t_serial_no'),
            't_dr_no' => $this->input->post('t_dr_no'),
            't_problem' => $this->input->post('t_problem'),
            't_qty' => $this->input->post('qty'),
            't_unit' => $this->input->post('unit'),
            'warranty' => $this->input->post('warranty'),
        );

        $query = $this->crud_model->updateTicketInfo($data, $t_ticket_no);
        
        if($query){
            // Set alert message
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/view_ticket/'.$t_ticket_no));
        }
        else{
            // Set alert message
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/view_ticket/'.$t_ticket_no));
        }
    }

    // TO VIEW USER INFO
    public function view_user($account_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
		$account_info = $this->crud_model->get_user_info($account_no);
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
			'account_info' => $account_info,
            'user_info' => $user_info,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/view_user_info', $data);
		$this->load->view('dashboard/partials/footer');
	}

    // TO SAVE UPDATE ON USER's PROFILE
    public function update_user_profile(){
        $account_id = $this->input->post('account_no');

        $data = array(
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),

            // edit email was commented due to multiple errors
            // 'email' => $this->input->post('email'),

            'mobile' => $this->input->post('mobile'),
            'comp_name' => $this->input->post('comp_name'),
            'comp_address' => $this->input->post('comp_address'),
            'comp_tel' => $this->input->post('comp_tel'),
            'department' => $this->input->post('department'),
            'tin_no' => $this->input->post('tin_no'),
        );

        $query = $this->crud_model->updateUserInfoById($account_id, $data);
        
        if($query){
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/edit_profile_page'));
        }
        else{
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/edit_profile_page'));
        }
    }

    // TO SAVE EDITED USER INFO
    public function run_user_update($account_no){
        $data = array(
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),

            // editing of email was commented due to multiple errors
            // 'email' => $this->input->post('email'),
            
            'mobile' => $this->input->post('mobile'),
            'comp_name' => $this->input->post('comp_name'),
            'comp_address' => $this->input->post('comp_address'),
            'comp_tel' => $this->input->post('comp_tel'),
            'department' => $this->input->post('department'),
            'tin_no' => $this->input->post('tin_no'),
        );

        $query = $this->crud_model->updateUserInfoById($account_no, $data);
        
        if($query){
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/view_user/'.$account_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/view_user/'.$account_no));
        }
    }

    // TO VIEW TECHNICAL ACTIVITY AREA
    public function technical_activity($t_ticket_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $company_info = $this->crud_model->get_company_profile();
		$ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
        $technicianData = $this->crud_model->getTechnicianData();
        $ticket_statuses = $this->crud_model->get_ticket_statuses($t_ticket_no);
        $getDiagnoseData = $this->crud_model->getDiagnoseData($t_ticket_no);
        $serial_no = $ticket_info->t_serial_no;
        $old_tickets = $this->crud_model->get_related_tickets_based_on_same_serial_no($serial_no, $t_ticket_no);
        $role_from_user_info = $user_info_alt['account_type'];
        $technician_permissions = $this->crud_model->technician_permissions($role_from_user_info);
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
        $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

		$data = array(
            'ticket_status_info' => $ticket_statuses,
			'ticket_info' => $ticket_info,
            'user_info' => $user_info,
            'technicianData' => $technicianData,
            'getDiagnoseData' => $getDiagnoseData,
            'old_tickets' => $old_tickets,
            'technician_permissions' => $technician_permissions,
            'account_management' => $account_management,
            'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/view_technical_activity', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO VIEW ALL USERS
	public function users(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];

        if($user_info_alt['account_type'] == 'admin'){
            $company_info = $this->crud_model->get_company_profile();
            $all_users = $this->crud_model->get_users_by_admin();
            $users_count = $this->crud_model->users_count();
            $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

            $data = array(
                'all_users' => $all_users,
                'users_count' => $users_count,
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'account_management' => $account_management,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/users', $data);
            $this->load->view('dashboard/partials/footer');
        } else{
            $company_info = $this->crud_model->get_company_profile();
            $all_users = $this->crud_model->get_users_by_super_admin();
            $users_count = $this->crud_model->users_count();
            $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

            $data = array(
                'all_users' => $all_users,
                'users_count' => $users_count,
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'account_management' => $account_management,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/users', $data);
            $this->load->view('dashboard/partials/footer');
        }
	}

    // FOR USER REGISTRATION
    public function sign_up() {
        $email = $this->input->post('email');
        $user_exists = $this->crud_model->check_user_exists($email);
        $account_type = $this->input->post('account_type');
        
        if ($user_exists) {
            echo '<script>';
            echo 'alert("Email address already exists!");';
            echo 'alert("If you want to create a new account, please use another email address thank you.");';
            echo 'window.history.back();';
            echo '</script>';
            return;
        }
    
        if ($account_type != "user" ){
            $u_data = array(
                'account_type' => $this->input->post('account_type'),
                'email_verification' => '1',
                'user_registration_date' => $this->input->post('user_registration_date'),
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'email' => $email,
                'mobile' => $this->input->post('mobile'),
                'comp_name' => $this->input->post('comp_name'),
                'comp_address' => $this->input->post('comp_address'),
                'comp_tel' => $this->input->post('comp_tel'),
                'department' => $this->input->post('department'),
                'tin_no' => $this->input->post('tin_no'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );

            $insert_id = $this->crud_model->insert_entry($u_data);
    
            if ($insert_id) {
                // Send email notification
                $this->sendEmailNotification($u_data['email'], $u_data);
                // Set alert message
                $this->session->set_userdata('alert', 'Added!');
                echo '<script>';
                echo 'window.location.href = "'.base_url('dashboard/users').'";';
                echo '</script>';
            } else {
                // Set alert message
                $this->session->set_userdata('error', 'Failed request!');
                echo '<script>';
                echo 'window.location.href = "'.base_url('dashboard/users').'";';
                echo '</script>';
            }

        }else{
            $u_data = array (
                'account_type' => $this->input->post('account_type'),
                'email_verification' => '0',
                'user_registration_date' => $this->input->post('user_registration_date'),
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'email' => $email,
                'mobile' => $this->input->post('mobile'),
                'comp_name' => $this->input->post('comp_name'),
                'comp_address' => $this->input->post('comp_address'),
                'comp_tel' => $this->input->post('comp_tel'),
                'department' => $this->input->post('department'),
                'tin_no' => $this->input->post('tin_no'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );

            $insert_id = $this->crud_model->insert_entry($u_data);
    
            if ($insert_id) {
                // Send email receipt
                $this->sendEmailReceiptSignUpForUser($u_data);
                // Set alert message
                $this->session->set_userdata('alert', 'Added!');
                echo '<script>';
                echo 'window.location.href = "'.base_url('dashboard/users').'";';
                echo '</script>';
            } else {
                // Set alert message
                $this->session->set_userdata('error', 'Failed request!');
                echo '<script>';
                echo 'window.location.href = "'.base_url('dashboard/users').'";';
                echo '</script>';
            }
        }
    }

    // FOR SENDING EMAIL NOTIF AFTER ACCOUNT REGISTRATION
    private function sendEmailNotification($recipient, $u_data) {
        // Set up the email configuration
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
    
        // Set the email details
        $this->email->from('sender@example.com', 'Sender Name');
        $this->email->to($recipient);
        $this->email->subject('Account Created');
    
        // Compose the email content
        $message = '
            <html>
            <head>
                <style>
                    /* Email styles */
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                    }
                    .header {
                        background-color: #f1f3f4;
                        padding: 20px;
                    }
                    .header h2 {
                        color: #202124;
                        margin: 0;
                        font-size: 24px;
                    }
                    .content {
                        padding: 20px;
                    }
                    .content p {
                        color: #202124;
                        margin: 0 0 10px;
                        font-size: 16px;
                    }
                    .content .button {
                        display: inline-block;
                        background-color: #1a73e8;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 10px 20px;
                        border-radius: 4px;
                        font-size: 16px;
                    }
                    .footer {
                        background-color: #f1f3f4;
                        padding: 20px;
                        text-align: center;
                    }
                    .footer p {
                        color: #5f6368;
                        margin: 0;
                        font-size: 14px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h2>Welcome to the System</h2>
                    </div>
                    <div class="content">
                        <p>Dear ' . $u_data['fname'] . ' ' . $u_data['lname'] . ',</p>
                        <p>Your account has been successfully created by the Admin.</p>
                        <p>Click the button below to go to the homepage:</p>
                        <a class="button" href="' . base_url('homepage') . '">Go to Homepage</a>
                    </div>
                    <div class="footer">
                        <p>© 2023 Your Company. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
        ';
        $this->email->message($message);
    
        // Send the email
        $this->email->send();
    }

    // FOR SENDING ACCOUNT RECEIPT AND EMAIL VERIFICATION AFTER REGISTRATION
    private function sendEmailReceiptSignUpForUser($data) {
        // Set up the email configuration
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
    
        // Set the email details
        $this->email->from('management@iequity.com.ph', 'iEquity Technologies Corporation');
        $this->email->to($data['email']);
        $this->email->subject('Registration Receipt and Account Activation');
    
        // Generate the activation URL
        $activationUrl = base_url('homepage/activate_account/' . urlencode($data['email']));
    
        // Compose the email content
        $message = '
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        line-height: 1.5;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }
                    .header {
                        background-color: #f1f3f4;
                        padding: 15px;
                        border-radius: 5px 5px 0 0;
                    }
                    .header h2 {
                        font-size: 24px;
                        margin: 0;
                    }
                    .content {
                        padding: 20px 0;
                    }
                    .content p {
                        margin: 10px 0;
                    }
                    .button {
                        display: inline-block;
                        background-color: #007bff;
                        color: #fff;
                        padding: 10px 15px;
                        text-decoration: none;
                        border-radius: 3px;
                    }
                    .footer {
                        margin-top: 30px;
                        text-align: center;
                    }
                    .footer p {
                        margin: 10px 0;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h2>Registration Receipt</h2>
                    </div>
                    <div class="content">
                        <p>Dear ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname'] . ',</p>
                        <p>Thank you for signing up! Here is your receipt:</p>
                        <p><strong>Full Name:</strong> ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname'] . '</p>
                        <p><strong>Email:</strong> ' . $data['email'] . '</p>
                        <p><strong>Mobile:</strong> ' . $data['mobile'] . '</p>
                        <p><strong>Company Name:</strong> ' . $data['comp_name'] . '</p>
                        <p><strong>Company Address:</strong> ' . $data['comp_address'] . '</p>
                        <p><strong>Company Tel:</strong> ' . $data['comp_tel'] . '</p>
                        <p><strong>Department:</strong> ' . $data['department'] . '</p>
                        <p><strong>TIN No:</strong> ' . $data['tin_no'] . '</p>
                        <p>Thank you for signing up! Click the button below to activate your account and return to the homepage:</p>
                        <center><p><a class="button" href="' . $activationUrl . '">Activate Account</a></p></center>
                    </div>
                    <div class="footer">
                        <p>© ' . date('Y') . ' iEquity Technologies Corporation</p>
                    </div>
                </div>
            </body>
            </html>
        ';
    
        $this->email->message($message);
    
        // Send the email
        $this->email->send();
    }

    // TICKET REGISTRATION
	public function ticket_reg(){
        $warranty = $this->input->post('warranty');

		$t_data = [
            'fname' => $this->input->post('t_fname'),
            'mname' => $this->input->post('t_mname'),
            'lname' => $this->input->post('t_lname'),
            'email' => $this->input->post('t_email'),
            'mobile' => $this->input->post('t_mobile'),
            'comp_name' => $this->input->post('t_comp_name'),
            'comp_address' => $this->input->post('t_comp_address'),
            'comp_tel' => $this->input->post('t_comp_tel'),
            'department' => $this->input->post('t_department'),
            'tin_no' => $this->input->post('t_tin_no'),
			'ticket_registration_date' => $this->input->post('ticket_registration_date'),
			't_ticket_status' => 'unassigned',
			't_technical_assigned' => 'none',
			't_model' => $this->input->post('t_model'),
            't_serial_no' => $this->input->post('t_serial_no'),
			't_dr_no' => $this->input->post('t_dr_no'),
			't_problem' => $this->input->post('t_problem'),
            't_qty' => $this->input->post('qty'),
            't_unit' => $this->input->post('unit'),
            'warranty' => $warranty,
        ];

		$insert_id = $this->crud_model->insert_ticket($t_data);

		if ($insert_id) {
            // Set alert message
            $this->session->set_userdata('alert', 'Submitted!');
            echo '<script>';
            echo 'window.location.href = "'.base_url('dashboard/tickets').'";';
            echo '</script>';
        } else {
            // Set alert message
            $this->session->set_userdata('error', 'Failed request!');
            echo '<script>';
            echo 'window.location.href = "'.base_url('dashboard/tickets').'";';
            echo '</script>';
        }
	}

    // TO OPEN EDIT PROFILE PAGE
    public function edit_profile_page(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/profile_page', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // FOR UPDATING PASSWORD
    public function edit_password($account_no){
        $data = array(
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );

        $query = $this->crud_model->update_password_by_id($account_no, $data);

        if($query){
            // Set alert message
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/view_user/'.$account_no));
        }
        else{
            // Set alert message
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/view_user/'.$account_no));
        }
    }

    // FOR UPDATING PASSWORD CREATED BY ADMIN
    public function edit_password_if_admin($account_no){
        $data = array(
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );

        $query = $this->crud_model->update_password_by_id($account_no, $data);

        if($query){
            // Set alert message
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/edit_profile_page'));
        }
        else{
            // Set alert message
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/edit_profile_page'));
        }
    }

    // FOR SAVING SELECTED TECHNICIAN
    public function save_selected_technician($t_ticket_no) {
        $technician_name = $this->input->post('selected_technician');
        $checkExistingData = $this->crud_model->checkExistingData($t_ticket_no, $technician_name);

        if ($checkExistingData) {
            // Technician already exists, update the status in main records

            // for updating the status of ticket in main records
            $data2 = array(
                't_technical_assigned' => $technician_name,
                't_ticket_status' => 'open',
            );

            // for updating the status of ticket in main records
            $query2 = $this->crud_model->saveTechnicianNames($t_ticket_no, $data2);

            if ($query2 !== false) {
                $this->session->set_userdata('alert', 'Technician has been assigned!');
                redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
            } else {
                $this->session->set_userdata('error', 'Failed to update technician status!');
                redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
            }
        } else {
            // Technician does not exist, save the new technician

            // for saving new assigned technician
            $data1 = array(
                'ticket_id' => $t_ticket_no,
                'technician_name' => $technician_name,
                'ticket_status' => 'open',
                'date_assigned' => date('Y-m-d'),
            );

            // for updating the status of ticket in main records
            $data2 = array(
                't_technical_assigned' => $this->input->post('selected_technician'),
                't_ticket_status' => 'open',
            );

            // for saving new assigned technician
            $query1 = $this->crud_model->saveSelectedData($data1);

            // for updating the status of ticket in main records
            $query2 = $this->crud_model->saveTechnicianNames($t_ticket_no, $data2);

            //Send email of ticket owner 
            $email_of_owner = $this->input->post('email_of_ticket_owner');

            if ($query1 !== false && $query2 !== false) {
                $this->SendEMailUpdated($email_of_owner);
                $this->session->set_userdata('alert', 'Technician has been assigned!');
                redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
            } else {
                $this->session->set_userdata('error', 'Failed to save technician!');
                redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
            }
        }
    }  

    private function SendEMailUpdated($email) {
        // Set up the email configuration
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
    
        // Set the email content
        $this->email->from('service@iequity.com.ph', 'iEquity Technologies Corporation');
        $this->email->to($email);
        $this->email->subject('Ticket Update');
    
     // Construct the email message using HTML
        $emailContent = '
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f7f7f7;
                }
                .header {
                    background-color: #1976D2;
                    color: #ffffff;
                    padding: 20px;
                    text-align: center;
                }
                .content {
                    background-color: #ffffff;
                    padding: 20px;
                }
                .footer {
                    margin-top: 30px;
                    text-align: center;
                }
                .footer p {
                    margin: 10px 0;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Ticket Update</h1>
                </div>
                <div class="content">
                    <p>We would like to inform you that your ticket has been processed. We appreciate your patience as we work to address your request.</p>
                    <p>If you have any further questions or concerns, please feel free to contact us. Thank you for choosing our services.</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' iEquity Technologies Corporation</p>
                </div>
            </div>
        </body>
        </html>
    ';
    
        $this->email->message($emailContent);
    
        // Send the email
        if ($this->email->send()) {
            echo 'Email sent successfully.';
        } else {
            echo 'Email sending failed.';
        }
    }
     
    
    // TO OPEN COMPANY PROFILE FORM
    public function company_profile(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'company_info' => $company_info,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/company_profile', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO PRINT SERVICE INVOICE
    public function printPDF($t_ticket_no)
    {
        // Load TCPDF library
        require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

        // Create new PDF object
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Remove header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set document properties
        $pdf->SetTitle('Service invoice');
        $pdf->SetAuthor('iEquity Technologies Corporation');
        $pdf->SetMargins(10.0, 10.0, 10.0, true); // Set margins to 1.0 cm on all sides

        // Set default font size
        $pdf->SetFont('helvetica', '', 10); // 'helvetica' is the font family, '' is the font style (empty for regular), and 10 is the font size

        try {
            // Load the data
            $company_info = $this->crud_model->get_company_profile();
            $ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
            $service_invoice_info = $this->crud_model->get_service_invoice($t_ticket_no);
            $parts_or_material_charges = $this->crud_model->get_parts_or_material_charges($t_ticket_no);
            $labor_or_other_charges = $this->crud_model->get_labor_or_other_charges($t_ticket_no);

            // Set the data in the view
            $data = array(
                'company_info' => $company_info,
                'ticket_info' => $ticket_info,
                'service_invoice_info' => $service_invoice_info,
                'parts_or_material_charges' => $parts_or_material_charges,
                'labor_or_other_charges' => $labor_or_other_charges,
            );

            // Generate the content by loading the view into a variable
            $content = $this->load->view('prints/service_invoice_view', $data, true);

            // Add a page
            $pdf->AddPage();

            // Set the content to start at the top margin
            $pdf->setY($pdf->getHeaderMargin());

            // Print the content onto the PDF
            $pdf->writeHTML($content, true, false, true, false, '');

            // Output the PDF as a download
            $pdf->Output('Service_invoice.pdf', 'I');
        } catch (Exception $e) {
            // Handle any exceptions that occur during PDF generation
            echo 'Error generating PDF: ' . $e->getMessage();
        }
    }

    // FOR CREATING COMPANY PROFILE
    public function set_up_company_profile(){
        $data = [
            'comp_logo' => 'none',
            'comp_name' => $this->input->post('comp_name'),
            'comp_bldg_pic' => 'none',
            'comp_address' => $this->input->post('comp_address'),
            'comp_tel_no' => $this->input->post('comp_telephone_nums'),
            'comp_telefax' => $this->input->post('comp_telefax'),
            'contact_no' => $this->input->post('contact_nums'),
            'comp_email' => $this->input->post('comp_email'),
            'comp_web_address' => $this->input->post('comp_web_address'),

        ];

		$insert_id = $this->crud_model->store_company_profile($data);

		if ($insert_id) {
            // Set alert message
            $this->session->set_userdata('alert', 'Submitted!');
            echo '<script>';
            echo 'window.location.href = "'.base_url('dashboard/company_profile').'";';
            echo '</script>';
        } else {
            // Set alert message
            $this->session->set_userdata('error', 'Failed!');
            echo '<script>';
            echo 'window.location.href = "'.base_url('dashboard/company_profile').'";';
            echo '</script>';
        }
    }

    // TO OPEN SERVICE INVOICE PAGE
    public function service_invoice($t_ticket_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
        $service_invoice_info = $this->crud_model->get_service_invoice($t_ticket_no);
        $parts_or_material_charges = $this->crud_model->get_parts_or_material_charges($t_ticket_no);
        $labor_or_other_charges = $this->crud_model->get_labor_or_other_charges($t_ticket_no);
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
			'ticket_info' => $ticket_info,
            'user_info' => $user_info,
            'service_invoice_info' => $service_invoice_info,
            'parts_or_material_charges' => $parts_or_material_charges,
            'labor_or_other_charges' => $labor_or_other_charges,
            'company_info' => $company_info,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

        $this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/service_invoice_edit_page', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO OPEN MR EDIT AND CREATE PAGE
    public function mr($t_ticket_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
        $mr_info = $this->crud_model->get_mr_row($t_ticket_no);

		$data = array(
			'ticket_info' => $ticket_info,
            'user_info' => $user_info,
            'company_info' => $company_info,
            'account_management' => $account_management,
            'mr_info' => $mr_info,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

        $this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/mr_edit_page', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO SAVE MR
    public function create_mr($t_ticket_no){
        $data = array(
            'serial_no' => $this->input->post('serial_no'),
            'ticket_no' => $t_ticket_no,
            'remarks' => $this->input->post('remarks'),
            'accessories' => $this->input->post('accessories_list'),
            'prepared_by' => $this->input->post('prepared_by'),
            'received_by' => $this->input->post('received_by'),
            'status' => $this->input->post('status'),
            'date' => date("Y-m-d"),
        );

        $query = $this->crud_model->insert_mr($data);
		if($query){
            $this->session->set_userdata('alert', 'New MR saved!');
            redirect(base_url('dashboard/mr/'.$t_ticket_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed request!');
            redirect(base_url('dashboard/mr/'.$t_ticket_no));
        }
        

    }

    public function update_mr($t_ticket_no){
        $data = array(
            'serial_no' => $this->input->post('serial_no'),
            'remarks' => $this->input->post('remarks'),
            'accessories' => $this->input->post('accessory_list'),
            'prepared_by' => $this->input->post('prepared_by'),
            'received_by' => $this->input->post('received_by'),
            'status' => $this->input->post('status'),
        );

        $query = $this->crud_model->update_mr_info($t_ticket_no, $data);
		if($query){
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/mr/'.$t_ticket_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/mr/'.$t_ticket_no));
        }
    }

    // TO CREATE NEW SERVICE INVOICE
    public function create_invoice($t_ticket_no){
        $data = array(
            'serial_no' => $this->input->post('serial_no'),
            'remarks' => '',
            'pmc_charges_php' => '0.00',
            'lo_charges_php' => '0.00',
            'labor_and_parts_cost' => '0.00',
            'approved_by' => 'Manuel Concepcion',
            'checked_by' => $this->input->post('checked_by'),
            'released_by' => $this->input->post('released_by'),
            'date' => '',
            'ticket_no' => $t_ticket_no,
        );

        $query = $this->crud_model->insert_service_invoice($data);

		if($query){
            $this->session->set_userdata('alert', 'New invoice saved!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed request!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }

    // FOR SAVING PARTS AND MATS CHARGES
    public function add_parts_and_mats($t_ticket_no){
        $data = array(
            'ticket_no' => $t_ticket_no,
            'description' => $this->input->post('description'),
            'qty' => $this->input->post('qty'),
            'unit' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'amount' => $this->input->post('amount'),
        );

        $query = $query = $this->crud_model->add_parts_and_mats($data);
        
        if($query){
            $this->session->set_userdata('alert', 'Added!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed request!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }

    // FOR SAVING LABOR AND OTHER CHARGES
    public function add_labor_and_other_charges($t_ticket_no){
        $data = array(
            'ticket_no' => $t_ticket_no,
            'charges' => $this->input->post('charges'),
            'amount' => $this->input->post('amount'),
        );

        $query = $query = $this->crud_model->add_labor_and_other_charges($data);
        
        if($query){
            $this->session->set_userdata('alert', 'Added!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed request!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }

    // FOR SAVING SERIAL INFO UPDATE
    public function update_serial_info($t_ticket_no){
        
        $data = array(
            'serial_no' => $this->input->post('serial_no'),
            'remarks' => $this->input->post('remarks'),
            'pmc_charges_php' => $this->input->post('pmc_charges_php'),
            'lo_charges_php' => $this->input->post('lo_charges_php'),
            'labor_and_parts_cost' => $this->input->post('labor_and_parts_cost'),
            'approved_by' => $this->input->post('approved_by'),
            'checked_by' => $this->input->post('checked_by'),
            'released_by' => $this->input->post('released_by'),
            'date' => $this->input->post('date'),
        );

        $update_release_date_of_ticket = array(
            'date_of_release' => $this->input->post('date_of_release'),
        );

        $query1 = $this->crud_model->update_serial_info($t_ticket_no, $data);
        $query2 = $this->crud_model->updateTicketInfo($update_release_date_of_ticket, $t_ticket_no);

        if($query1){
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
        else{
            $this->session->set_userdata('error', 'Failed to add changes!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }

    // FOR EDITING COMPANY PROFILE
    public function update_company_profile()
    {
        // Load the File Upload Library
        $this->load->library('upload');

        // Set the comp_logo upload path and allowed file types
        $compLogoConfig['upload_path'] = './assets/images/company_profile/';
        $compLogoConfig['allowed_types'] = 'png|jpg|jpeg';
        $compLogoConfig['max_size'] = 2048; // 2MB

        // Set the comp_bldg_pic upload path and allowed file types
        $compBldgPicConfig['upload_path'] = './assets/images/company_profile/';
        $compBldgPicConfig['allowed_types'] = 'png|jpg|jpeg';
        $compBldgPicConfig['max_size'] = 2048; // 2MB

        // Prepare the data for updating
        $data['comp_name'] = $this->input->post('comp_name');
        $data['comp_address'] = $this->input->post('comp_address');
        $data['comp_tel_no'] = $this->input->post('comp_telephone_nums');
        $data['comp_telefax'] = $this->input->post('comp_telefax');
        $data['contact_no'] = $this->input->post('contact_nums');
        $data['comp_email'] = $this->input->post('comp_email');
        $data['comp_web_address'] = $this->input->post('comp_web_address');

        // Check if the comp_logo file is uploaded
        if (!empty($_FILES['comp_logo']['name'])) {
            // Initialize the comp_logo File Upload Library with its configuration
            $this->upload->initialize($compLogoConfig);

            // Check if the comp_logo file upload is successful
            if ($this->upload->do_upload('comp_logo')) {
                // Upload successful, retrieve the uploaded file data
                $fileData = $this->upload->data();
                $compLogoFilename = $fileData['file_name'];

                // Delete the previous comp_logo file if it exists
                $prevCompLogo = $this->crud_model->get_company_profile_comp_logo(); // Assuming you have a method to retrieve the previous comp_logo filename
                if ($prevCompLogo && file_exists('./assets/images/company_profile/' . $prevCompLogo->comp_logo)) {
                    unlink('./assets/images/company_profile/' . $prevCompLogo->comp_logo);
                }

                // Prepare the comp_logo data for updating
                $data['comp_logo'] = $compLogoFilename;
            } else {
                // comp_logo upload failed, handle the error
                $error = $this->upload->display_errors();
                // Set alert message
                $this->session->set_userdata('error', $error);
                redirect('dashboard/company_profile');
            }
        }

        // Check if the comp_bldg_pic file is uploaded
        if (!empty($_FILES['comp_bldg_pic']['name'])) {
            // Set the comp_bldg_pic file upload configuration
            $this->upload->initialize($compBldgPicConfig);

            // Check if the comp_bldg_pic file upload is successful
            if ($this->upload->do_upload('comp_bldg_pic')) {
                // Upload successful, retrieve the uploaded file data
                $fileData = $this->upload->data();
                $compBldgPicFilename = $fileData['file_name'];

                // Delete the previous comp_bldg_pic file
                $previousBldgPic = $this->crud_model->get_company_profile();
                if ($previousBldgPic !== null) {
                    $previousBldgPicPath = './assets/images/company_profile/' . $previousBldgPic->comp_bldg_pic;
                    if (file_exists($previousBldgPicPath)) {
                        unlink($previousBldgPicPath);
                    }
                }

                // Prepare the comp_bldg_pic data for updating
                $data['comp_bldg_pic'] = $compBldgPicFilename;
            } else {
                // comp_bldg_pic upload failed, handle the error
                $error = $this->upload->display_errors();
                // Set alert message
                $this->session->set_userdata('error', $error);
                redirect('dashboard/company_profile');
            }
        }

        // Update the company profile
        $query = $this->crud_model->update_company_profile($data);

        if ($query) {
            // Set success alert message
            $this->session->set_userdata('alert', 'Updated!');
        } else {
            // Set error alert message
            $this->session->set_userdata('error', 'Failed request!');
        }

        redirect('dashboard/company_profile');
    }

    // TO DELETE SAVED SERVICE INVOICE, PARTS and MATERIAL charges, LABOR and OTHER charges
    public function delete_invoice($t_ticket_no) {
        $this->db->trans_start(); // Start a database transaction
        
        // Delete row from 'service_invoice' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('service_invoice');
        
        // Delete rows from 'parts_or_material_charges' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('parts_or_material_charges');
        
        // Delete rows from 'labor_or_other_charges' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('labor_or_other_charges');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Failed to delete invoice!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Deleted!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }

    // TO DELETE SAVED SERVICE INVOICE, PARTS and MATERIAL charges, LABOR and OTHER charges
    public function delete_mr($t_ticket_no) {
        $this->db->trans_start(); // Start a database transaction
        
        // Delete row from 'service_invoice' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('mr');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Failed to delete MR!');
            redirect(base_url('dashboard/mr/'.$t_ticket_no));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Deleted!');
            redirect(base_url('dashboard/mr/'.$t_ticket_no));
        }
    }

    // TO PRINT MR
    public function printMR($t_ticket_no)
    {
        // Load TCPDF library
        require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

        // Create new PDF object
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Remove header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set document properties
        $pdf->SetTitle('MR Report');
        $pdf->SetAuthor('iEquity Technologies Corporation');
        $pdf->SetMargins(10.0, 10.0, 10.0, true); // Set margins to 1.0 cm on all sides

        // Set default font size
        $pdf->SetFont('helvetica', '', 10); // 'helvetica' is the font family, '' is the font style (empty for regular), and 10 is the font size

        try {
            // Load the data
            $company_info = $this->crud_model->get_company_profile();
            $ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
            $mr_info = $this->crud_model->get_mr_row($t_ticket_no);
            

            // Set the data in the view
            $data = array(
                'company_info' => $company_info,
                'ticket_info' => $ticket_info,
                'mr_info' => $mr_info,
                
            );

            // Generate the content by loading the view into a variable
            $content = $this->load->view('prints/mr_view', $data, true);

            // Add a page
            $pdf->AddPage();

            // Set the content to start at the top margin
            $pdf->setY($pdf->getHeaderMargin());

            // Print the content onto the PDF
            $pdf->writeHTML($content, true, false, true, false, '');

            // Output the PDF as a download
            $pdf->Output('mr_report.pdf', 'I');
        } catch (Exception $e) {
            // Handle any exceptions that occur during PDF generation
            echo 'Error generating PDF: ' . $e->getMessage();
        }
    }
    
    // FOR VIEWING OF ASSIGNED TICKETS TO TECHNICIAN (By default, assessible only by technical and technical support accounts)
    public function assigned_tickets(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $user_info_object = $this->crud_model->getdatabyemailnew($email);
        $assigned_tickets = $this->crud_model->getAssignedTickets($user_info_object);
        $company_info = $this->crud_model->get_company_profile();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

        $data = array(
            'user_info' => $user_info,
            'assigned_tickets' => $assigned_tickets,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/assigned_tickets_view', $data);
		$this->load->view('dashboard/partials/footer');

    }

    // FOR SAVING DIAGNOSE / MEMO
public function save_diagnose($t_ticket_no)
{
    // Load the necessary libraries
    $this->load->library('upload');

    // Configuration for file upload
    $config['upload_path'] = './assets/attachments/'; // Set the desired upload directory
    $config['allowed_types'] = 'pdf|jpeg|jpg|png|ppt|pptx|doc|docx|zip|7z'; // Add the allowed file types
    $config['max_size'] = 0; // No maximum file size limit

    $this->upload->initialize($config);

    // Continue with other form data
    $data['date'] = $this->input->post('date');
    $data['ticket_no'] = $t_ticket_no;
    $data['problem'] = $this->input->post('problem');
    $data['repair_solution'] = $this->input->post('repair_solution');
    $data['accessories'] = $this->input->post('accessories');
    $data['status'] = $this->input->post('status');

    $attachments = array();

    // Check if files are selected for upload
    if (!empty($_FILES['attachments']['name'][0])) {
        // Iterate through each selected file
        foreach ($_FILES['attachments']['name'] as $index => $filename) {
            $_FILES['attachment']['name'] = $_FILES['attachments']['name'][$index];
            $_FILES['attachment']['type'] = $_FILES['attachments']['type'][$index];
            $_FILES['attachment']['tmp_name'] = $_FILES['attachments']['tmp_name'][$index];
            $_FILES['attachment']['error'] = $_FILES['attachments']['error'][$index];
            $_FILES['attachment']['size'] = $_FILES['attachments']['size'][$index];

            // Perform file upload
            if ($this->upload->do_upload('attachment')) {
                // File upload success
                $file_data = $this->upload->data();
                $attachment_filename = $file_data['file_name']; // Get the uploaded file name

                // Save the file name to the attachments array
                $attachments[] = $attachment_filename;
            } else {
                // File upload failed
                $upload_error = $this->upload->display_errors();

                // Handle the upload error as per your requirements
                // For example, set an error message and redirect back to the form
                $this->session->set_userdata('error', 'Failed to upload file: '.$upload_error);
                redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
                return; // Stop further execution of the function
            }
        }
    }

    // Attachments data for database insertion
    $data['attachments'] = implode(',', $attachments);

    $query = $this->crud_model->save_diagnose($data);

    if ($query) {
        // Set success alert message
        $this->session->set_userdata('alert', 'Submitted!');
        redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
    } else {
        // Set error alert message
        $this->session->set_userdata('error', 'Failed to submit!');
        redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
    }
}

    // TO VIEW MEMO INFO
public function view_memo($memo_id, $ticket_no)
{
    $email = $this->session->userdata('email');
    $user_info = $this->crud_model->get_data_by_email($email);
    $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
    $role_from_user_info = $user_info_alt['account_type'];
    $company_info = $this->crud_model->get_company_profile();
    $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
    $memo = $this->crud_model->getMemoById($memo_id);
    $t_no = $ticket_no;
    $technician_permissions = $this->crud_model->technician_permissions($role_from_user_info);
    $ticket_info = $this->crud_model->get_ticket_info($ticket_no);

    // Retrieve attachments for the memo
    if (is_array($memo)) {
        $attachments = explode(',', $memo['attachments']);
    } else {
        $memoArray = (array) $memo; // Convert object to array
        $attachments = explode(',', $memoArray['attachments']);
    }

    $data = array(
        'user_info' => $user_info,
        'account_management' => $account_management,
        'memo' => $memo,
        't_no' => $t_no,
        'technician_permissions' => $technician_permissions,
        'ticket_info' => $ticket_info,
        'memo_id' => $memo_id, // Pass the $memo_id variable to the view
        'ticket_no' => $ticket_no, // Pass the $ticket_no variable to the view
        'attachments' => $attachments, // Pass the $attachments array to the view
    );

    $data2 = array(
        'company_info' => $company_info,
        'user_info' => $user_info,
    );

    $this->load->view('dashboard/partials/header');
    $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
    $this->load->view('dashboard/components/pages/memo_info', $data);
    $this->load->view('dashboard/partials/footer');
}

    public function update_memo($memo_id, $t_ticket_no)
{
    // Load the necessary libraries
    $this->load->library('upload');

    // Configuration for file upload
    $config['upload_path'] = './assets/attachments/'; // Set the desired upload directory
    $config['allowed_types'] = 'pdf|jpeg|jpg|png|ppt|pptx|doc|docx|zip|7z'; // Add the allowed file types
    $config['max_size'] = 0; // No maximum file size limit


    $this->upload->initialize($config);

    // Retrieve existing attachments
    $existing_attachments = $this->crud_model->get_attachments_by_memo_id($memo_id); // Replace 'get_attachments_by_memo_id' with your actual method to retrieve attachments

    // Continue with other form data
    $data = array(
        'problem' => $this->input->post('problem'),
        'repair_solution' => $this->input->post('repair_solution'),
        'accessories' => $this->input->post('accessories'),
        'status' => $this->input->post('status')
    );

    $attachments = array();

    // Check if files are selected for upload
    if (!empty($_FILES['attachments']['name'][0])) {
        // Iterate through each selected file
        foreach ($_FILES['attachments']['name'] as $index => $filename) {
            $_FILES['attachment']['name'] = $_FILES['attachments']['name'][$index];
            $_FILES['attachment']['type'] = $_FILES['attachments']['type'][$index];
            $_FILES['attachment']['tmp_name'] = $_FILES['attachments']['tmp_name'][$index];
            $_FILES['attachment']['error'] = $_FILES['attachments']['error'][$index];
            $_FILES['attachment']['size'] = $_FILES['attachments']['size'][$index];

            // Perform file upload
            if ($this->upload->do_upload('attachment')) {
                // File upload success
                $file_data = $this->upload->data();
                $attachment_filename = $file_data['file_name']; // Get the uploaded file name

                // Save the file name to the attachments array
                $attachments[] = $attachment_filename;
            } else {
                // File upload failed
                $upload_error = $this->upload->display_errors();

                // Handle the upload error as per your requirements
                // For example, set an error message and redirect back to the form
                $this->session->set_userdata('error', 'Failed to upload file: ' . $upload_error);
                redirect(base_url('dashboard/view_memo/' . $memo_id . '/' . $t_ticket_no));
                return; // Stop further execution of the function
            }
        }
    }

    // Merge the existing attachments with the updated attachments
    $updated_attachments = array_merge($existing_attachments, $attachments);

    // Attachments data for database insertion
    $data['attachments'] = implode(',', $updated_attachments);

    // Update the memo in the database
    $query = $this->crud_model->update_memo($memo_id, $data);

    // Handle the update result and redirect accordingly
    if ($query) {
        $this->session->set_userdata('alert', 'Updated!');
        redirect(base_url('dashboard/view_memo/' . $memo_id . '/' . $t_ticket_no));
    } else {
        $this->session->set_userdata('error', 'Failed!');
        redirect(base_url('dashboard/view_memo/' . $memo_id . '/' . $t_ticket_no));
    }
}
    //VIEW THE PDF FILE OR IMAGE
    public function view_attachment($filename)
    {
        $file = './assets/attachments/' . $filename;
    
        if (file_exists($file)) {
            $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    
            if ($file_extension === 'pdf') {
                header('Content-Type: application/pdf');
            } else if (in_array($file_extension, ['jpeg', 'jpg', 'png'])) {
                header('Content-Type: image/' . $file_extension);
            } else {
                show_404();
                return;
            }
    
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($file));
    
            ob_clean();
            flush();
            readfile($file);
        } else {
            show_404();
        }
    }
    // TO DELETE THE MEMO
    public function delete_memo($memo_id){

        $ticket_id_no = $this->input->post('ticket_no');
        $this->db->trans_start(); // Start a database transaction
        
        //Delete row from 'iequity_tickets' table
        $this->db->where('memo_id', $memo_id);
        $this->db->delete('memo');

        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Failed to remove item!');
            redirect(base_url('dashboard/technical_activity/'.$ticket_id_no));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Deleted!');
            redirect(base_url('dashboard/technical_activity/'.$ticket_id_no));
        }
    }

    // FOR CLOSING THE TICKET and update the status
    public function close_ticket($t_ticket_no){
        $data = array(
            'date_of_release' => $this->input->post('date_of_released'),
            't_ticket_status' => 'closed',
        );

        $query = $this->crud_model->close_ticket($data, $t_ticket_no);
        if ($query) {
            $this->session->set_userdata('alert', 'Ticket is closed!');
            redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
        } else {
            $this->session->set_userdata('error', 'Failed to close!');
            redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
        }
    }

    // FOR RE-OPENING THE TICKET and update the status
    public function re_open_ticket($t_ticket_no){
        $data = array(
            't_ticket_status' => 'open',
        );

        $query = $this->crud_model->re_open_ticket($data, $t_ticket_no);
        if ($query) {
            $this->session->set_userdata('alert', 'Ticket has been resumed!');
            redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
        } else {
            $this->session->set_userdata('error', 'Failed request!');
            redirect(base_url('dashboard/technical_activity/'.$t_ticket_no));
        }
    }

    // TO VIEW OPEN STATUS TICKETS
    public function open_tickets(){
        $email = $this->session->userdata('email');
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        
        if($user_info_alt['account_type'] == 'user'){
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $open_tickets = $this->crud_model->get_open_tickets_by_email($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'open_tickets' => $open_tickets,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/open_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        } else {
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $open_tickets = $this->crud_model->get_open_tickets();
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'open_tickets' => $open_tickets,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/open_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        }
    }

    // TO VIEW CLOSED TICKETS
    public function closed_tickets(){
        $email = $this->session->userdata('email');
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        
        if($user_info_alt['account_type'] == 'user'){
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $closed_tickets = $this->crud_model->get_closed_tickets_by_email($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'closed_tickets' => $closed_tickets,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/closed_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        } else {
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $closed_tickets = $this->crud_model->get_closed_tickets();
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'closed_tickets' => $closed_tickets,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/closed_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        }
    }

    // TO VIEW PENDING TICKETS
    public function pending_tickets(){
        $email = $this->session->userdata('email');
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        
        if($user_info_alt['account_type'] == 'user'){
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $unassigned_tickets = $this->crud_model->get_pending_or_unassigned_tickets_by_email($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'unassigned_tickets' => $unassigned_tickets,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/unassigned_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        } else {
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $unassigned_tickets = $this->crud_model->get_pending_or_unassigned_tickets();
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);
            $get_print_permissions =  $this->crud_model->get_print_permissions($role_from_user_info);
            $get_ticket_ops_permissions = $this->crud_model->get_ticket_ops_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'user_info_alt' => $user_info_alt,
                'unassigned_tickets' => $unassigned_tickets,
                'account_management' => $account_management,
                'get_print_permissions' => $get_print_permissions,
                'get_ticket_ops_permissions' => $get_ticket_ops_permissions,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/unassigned_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        }
    }

    // DELETE ENTIRELY THE TICKET AND ITS RELATED INFOS
    public function force_delete_ticket($t_ticket_no){
        $this->db->trans_start(); // Start a database transaction
        
        //Delete row from 'iequity_tickets' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('iequity_tickets');

        // Delete row from 'service_invoice' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('service_invoice');

        // Delete row from 'service_invoice' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('mr');
        
        // Delete rows from 'parts_or_material_charges' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('parts_or_material_charges');
        
        // Delete rows from 'labor_or_other_charges' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('labor_or_other_charges');

        // Delete rows of memo 'memo' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('memo');

        // Delete rows from 'ticket_status' table
        $this->db->where('ticket_id', $t_ticket_no);
        $this->db->delete('ticket_status');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Failed!');
            redirect(base_url('dashboard/tickets'));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Delete completed!');
            redirect(base_url('dashboard/tickets'));
        }
    }

    // CANCEL TICKET ALSO TRANSFER A COPY OF DATA FOR RETRIEVAL PURPOSE
    public function cancel_ticket($t_ticket_no){
        $this->db->trans_start(); // Start a database transaction
    
        // Transfer a copy of ticket for retrieval purpose
        $ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
        $this->db->insert('cancelled_tickets', $ticket_info);

        // Delete the ticket from 'iequity_tickets' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('iequity_tickets');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Request failed!');
            redirect(base_url('dashboard/tickets'));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Ticket cancelled!');
            redirect(base_url('dashboard/tickets'));
        }

    }

    // RETRIEVE CANCELLED TICKET
    public function retrieve_ticket($t_ticket_no){
        $this->db->trans_start(); // Start a database transaction
    
        // Transfer the copied ticket from cancelled_tickets table to main
        $ticket_info = $this->crud_model->get_ticket_info_for_retrieving($t_ticket_no);
        $this->db->insert('iequity_tickets', $ticket_info);

        // Delete the ticket from 'cancelled_tickets' table
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->delete('cancelled_tickets');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Request failed!');
            redirect(base_url('dashboard/tickets'));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Ticket retrieved!');
            redirect(base_url('dashboard/tickets'));
        }
    }

    // TO VIEW CANCELLED TICKETS
    public function cancelled_tickets(){
        $email = $this->session->userdata('email');
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        
        if($user_info_alt['account_type'] == 'user'){
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $cancelled_tickets = $this->crud_model->get_cancelled_tickets_by_user($email);
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'cancelled_tickets' => $cancelled_tickets,
                'user_info_alt' => $user_info_alt,
                'account_management' => $account_management,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/cancelled_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        } else{
            $user_info = $this->crud_model->get_data_by_email($email);
            $company_info = $this->crud_model->get_company_profile();
            $cancelled_tickets = $this->crud_model->get_cancelled_tickets();
            $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

            $data = array(
                'user_info' => $user_info,
                'cancelled_tickets' => $cancelled_tickets,
                'user_info_alt' => $user_info_alt,
            );

            $data2 = array(
                'company_info' => $company_info,
                'user_info' => $user_info,
            );

            $this->load->view('dashboard/partials/header');
            $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
            $this->load->view('dashboard/components/pages/cancelled_tickets_view', $data);
            $this->load->view('dashboard/partials/footer');
        }
    }

    // TO VIEW THE CANCELLED TICKET INFO
    public function cancelled_ticket_info($t_ticket_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
		$ticket_info = $this->crud_model->get_cancelled_ticket_info($t_ticket_no);
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
			'ticket_info' => $ticket_info,
            'user_info' => $user_info,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/cancelled_ticket_info', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO VIEW RBAC HOME
    public function rbac(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $print_doc_permissions = $this->crud_model->get_print_doc_permissions();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'print_doc_permissions' => $print_doc_permissions,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/rbac_form', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO SAVE PRINT PERMISSIONS
    public function save_print_permissions(){
        // Get the form data
        $permissions = $this->input->post();
    
        // Save the permissions to the database
        if ($this->crud_model->save_print_permissions($permissions)) {
            // Query successful
            $this->session->set_userdata('alert', 'Saved!');
            redirect(base_url('dashboard/rbac'));
        } else {
            // Query failed
            $this->session->set_userdata('error', 'Failed!');
            redirect(base_url('dashboard/rbac'));
        }
    }

    // TO UPDATE PRINT PERMISSIONS
    public function update_print_permissions()
    {
        // Get the form data
        $permissions = $this->input->post('permissions');
        $roleIds = $this->input->post('role_ids');

        // Get the current permissions for the first row from the database
        $currentPermissions = $this->db->get_where('print_doc_permissions', array('role_id' => $roleIds[0]))->row();

        // Loop through the permissions and update the database
        foreach ($roleIds as $index => $role_id) {
            $data = array(
                'print_list_of_tickets' => isset($permissions[$role_id]['print_list_of_tickets']) ? 'Yes' : 'No',
                'service_invoice' => isset($permissions[$role_id]['service_invoice']) ? 'Yes' : 'No',
                'mr' => isset($permissions[$role_id]['mr']) ? 'Yes' : 'No'
            );

            // Preserve the first row permissions if it is the current row being updated
            if ($index === 0) {
                $data['print_list_of_tickets'] = $currentPermissions->print_list_of_tickets;
                $data['service_invoice'] = $currentPermissions->service_invoice;
                $data['mr'] = $currentPermissions->mr;
            }

            $this->db->where('role_id', $role_id);
            $this->db->update('print_doc_permissions', $data);
        }

        // Redirect to the RBAC page or display a success message
        $this->session->set_flashdata('alert', 'Updated!');
        redirect('dashboard/print_permissions');
    }

    // TO UPDATE TICKET OPERATIONS PERMISSIONS
    public function update_ticket_operation_permissions()
    {
        // Get the form data
        $permissions = $this->input->post('permissions');
        $roleIds = $this->input->post('role_ids');

        // Get the current permissions for the first row from the database
        $currentPermissions = $this->db->get_where('ticket_operations_permissions', array('role_id' => $roleIds[0]))->row();

        // Loop through the permissions and update the database
        foreach ($roleIds as $index => $role_id) {
            $data = array(
                'edit_ticket' => isset($permissions[$role_id]['edit_ticket']) ? 'Yes' : 'No',
                'resume_ticket' => isset($permissions[$role_id]['resume_ticket']) ? 'Yes' : 'No',
                'cancel_ticket' => isset($permissions[$role_id]['cancel_ticket']) ? 'Yes' : 'No',
                'delete_entirely' => isset($permissions[$role_id]['delete_entirely']) ? 'Yes' : 'No'
            );

            // Preserve the first row permissions if it is the current row being updated
            if ($index === 0) {
                $data['edit_ticket'] = $currentPermissions->edit_ticket;
                $data['resume_ticket'] = $currentPermissions->resume_ticket;
                $data['cancel_ticket'] = $currentPermissions->cancel_ticket;
                $data['delete_entirely'] = $currentPermissions->delete_entirely;
            }

            $this->db->where('role_id', $role_id);
            $this->db->update('ticket_operations_permissions', $data);
        }

        // Redirect to the RBAC page or display a success message
        $this->session->set_flashdata('alert', 'Updated!');
        redirect('dashboard/ticket_operations');
    }

    // TO UPDATE TECHNICAL ACTIVITY PERMISSIONS
    public function update_technical_activity_permissions()
    {
        // Get the form data
        $permissions = $this->input->post('permissions');
        $roleIds = $this->input->post('role_ids');

        // Get the current permissions for the first row from the database
        $currentPermissions = $this->db->get_where('technical_activity_permissions', array('role_id' => $roleIds[0]))->row();

        // Loop through the permissions and update the database
        foreach ($roleIds as $index => $role_id) {
            $data = array(
                'assign_technician' => isset($permissions[$role_id]['assign_technician']) ? 'Yes' : 'No',
                'close_ticket' => isset($permissions[$role_id]['close_ticket']) ? 'Yes' : 'No',
                'create_diagnose' => isset($permissions[$role_id]['create_diagnose']) ? 'Yes' : 'No',
                'edit_memo' => isset($permissions[$role_id]['edit_memo']) ? 'Yes' : 'No',
                'delete_memo' => isset($permissions[$role_id]['delete_memo']) ? 'Yes' : 'No',
            );

            // Preserve the first row permissions if it is the current row being updated
            if ($index === 0) {
                $data['assign_technician'] = $currentPermissions->assign_technician;
                $data['close_ticket'] = $currentPermissions->close_ticket;
                $data['create_diagnose'] = $currentPermissions->create_diagnose;
                $data['edit_memo'] = $currentPermissions->edit_memo;
                $data['delete_memo'] = $currentPermissions->delete_memo;
            }

            $this->db->where('role_id', $role_id);
            $this->db->update('technical_activity_permissions', $data);
        }

        // Redirect to the RBAC page or display a success message
        $this->session->set_flashdata('alert', 'Updated!');
        redirect('dashboard/technical_activity_permissions');
    }

    // TO UPDATE ACCOUNT MANAGEMENT PERMISSION
    public function update_account_management_permissions()
    {
        // Get the form data
        $permissions = $this->input->post('permissions');
        $roleIds = $this->input->post('role_ids');

        // Get the current permissions for the first row from the database
        $currentPermissions = $this->db->get_where('account_management_permission', array('role_id' => $roleIds[0]))->row();

        // Loop through the permissions and update the database
        foreach ($roleIds as $index => $role_id) {
            $data = array(
                'delete_account' => isset($permissions[$role_id]['delete_account']) ? 'Yes' : 'No'
            );

            // Preserve the first row permissions if it is the current row being updated
            if ($index === 0) {
                $data['delete_account'] = $currentPermissions->delete_account;
            }

            $this->db->where('role_id', $role_id);
            $this->db->update('account_management_permission', $data);
        }

        // Redirect to the RBAC page or display a success message
        $this->session->set_flashdata('alert', 'Updated!');
        redirect('dashboard/account_management_permissions');
    }

    // TO VIEW PRINT PERMISSIONS RBAC
    public function print_permissions(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $print_doc_permissions = $this->crud_model->get_print_doc_permissions();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'print_doc_permissions' => $print_doc_permissions,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/print_permissions_view', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO UPDATE TICKET OPERATIONS RBAC
    public function ticket_operations(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $print_doc_permissions = $this->crud_model->get_print_doc_permissions();
        $ticket_operations_permissions = $this->crud_model->get_ticket_operation_permissions();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'print_doc_permissions' => $print_doc_permissions,
            'ticket_operations_permissions' => $ticket_operations_permissions,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/ticket_operations_permissions', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO VIEW TECHNICAL ACTIVITY RBAC
    public function technical_activity_permissions(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $print_doc_permissions = $this->crud_model->get_print_doc_permissions();
        $ticket_operations_permissions = $this->crud_model->get_ticket_operation_permissions();
        $technical_activity_permissions = $this->crud_model->get_technical_activity_permissions();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'print_doc_permissions' => $print_doc_permissions,
            'ticket_operations_permissions' => $ticket_operations_permissions,
            'technical_activity_permissions' => $technical_activity_permissions,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/technical_activity_permissions', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO VIEW ACCOUNT MANAGEMENT RBAC
    public function account_management_permissions(){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $role_from_user_info = $user_info_alt['account_type'];
        $company_info = $this->crud_model->get_company_profile();
        $print_doc_permissions = $this->crud_model->get_print_doc_permissions();
        $ticket_operations_permissions = $this->crud_model->get_ticket_operation_permissions();
        $technical_activity_permissions = $this->crud_model->get_technical_activity_permissions();
        $account_management_permissions = $this->crud_model->get_account_management_permissions();
        $account_management = $this->crud_model->account_management_permissions($role_from_user_info);

		$data = array(
            'user_info' => $user_info,
            'print_doc_permissions' => $print_doc_permissions,
            'ticket_operations_permissions' => $ticket_operations_permissions,
            'technical_activity_permissions' => $technical_activity_permissions,
            'account_management_permissions' => $account_management_permissions,
            'account_management' => $account_management,
		);

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

		$this->load->view('dashboard/partials/header');
		$this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
		$this->load->view('dashboard/components/pages/account_management_permissions', $data);
		$this->load->view('dashboard/partials/footer');
    }

    // TO DELETE ACCOUNT BY ADMIN
    public function delete_account_by_admins($account_no)
    {

        $this->db->trans_start(); // Start a database transaction
    
        $this->db->where('account_no', $account_no);
        $this->db->delete('iequity_users');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Request failed!');
            redirect(base_url('dashboard/users'));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Account deleted!');
            redirect(base_url('dashboard/users'));
        }
    }

    // TO DELETE ACCOUNT BY ANY USER IF THEY'RE ALLOWED
    public function delete_account_by_any_user($account_no)
    {

        $this->db->trans_start(); // Start a database transaction
    
        $this->db->where('account_no', $account_no);
        $this->db->delete('iequity_users');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Request failed!');
            redirect(base_url('dashboard'));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Your account has been deleted!');
            redirect(base_url());
        }
    }

    // BACKUP AND RESTORE SETTING
    public function backup_and_restore()
    {
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $company_info = $this->crud_model->get_company_profile();

        $database_backup_folder = FCPATH . 'backups/database'; // Path to the database backup folder
        $assets_backup_folder = FCPATH . 'backups/assets'; // Path to the assets backup folder

        // Get the list of database backup files
        $database_files = scandir($database_backup_folder);
        $database_files = array_diff($database_files, array('.', '..'));

        // Get the list of assets backup files
        $assets_files = scandir($assets_backup_folder);
        $assets_files = array_diff($assets_files, array('.', '..'));

        // Prepare arrays to store the file information
        $database_file_list = array();
        $assets_file_list = array();

        // Loop through the database backup files and gather their details
        foreach ($database_files as $file) {
            $file_path = $database_backup_folder . '/' . $file;

            if (is_dir($file_path)) {
                continue;
            }

            $file_info = array(
                'filename' => $file,
                'date_created' => date('Y-m-d H:i:s', filectime($file_path)),
                'file_size' => filesize($file_path)
            );

            $database_file_list[] = $file_info;
        }

        // Loop through the assets backup files and gather their details
        foreach ($assets_files as $file) {
            $file_path = $assets_backup_folder . '/' . $file;

            if (is_dir($file_path)) {
                continue;
            }

            $file_info = array(
                'filename' => $file,
                'date_created' => date('Y-m-d H:i:s', filectime($file_path)),
                'file_size' => filesize($file_path)
            );

            $assets_file_list[] = $file_info;
        }

        $data = array(
            'user_info' => $user_info,
            'database_file_list' => $database_file_list,
            'assets_file_list' => $assets_file_list,
        );

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

        $this->load->view('dashboard/partials/header');
        $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
        $this->load->view('dashboard/components/pages/backup_and_restore', $data);
        $this->load->view('dashboard/partials/footer');
    }


    public function download_backup_database($filename)
    {
        $file_path = FCPATH . 'backups/database/' . $filename;

        if (file_exists($file_path)) {
            // Set appropriate headers for the file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($file_path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');

            // Read the file and output it to the browser
            readfile($file_path);
            exit;
        } else {
            // File not found
            $this->session->set_userdata('error', 'File not found!');
            redirect(base_url('dashboard/backup_and_restore'));
        }
    }

    public function download_backup_assets($filename)
    {
        $file_path = FCPATH . 'backups/assets/' . $filename;

        if (file_exists($file_path)) {
            // Set appropriate headers for the file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($file_path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');

            // Read the file and output it to the browser
            readfile($file_path);
            exit;
        } else {
            // File not found
            $this->session->set_userdata('error', 'File not found!');
            redirect(base_url('dashboard/backup_and_restore'));
        }
    }

    public function create_database_copy()
    {
        // Load the necessary helpers and libraries
        $this->load->dbutil();
        $this->load->helper('file');

        // Define the backup configuration
        $config = array(
            'format'      => 'sql', // Backup file format changed to SQL
            'filename'    => 'database_backup_' . date('Y-m-d'), // Backup file name
            'add_drop'    => TRUE, // Include DROP TABLE statements in backup file
            'add_insert'  => TRUE, // Include INSERT data statements in backup file
            'newline'     => "\n" // Newline character used in backup file
        );

        // Generate the backup
        $backup = $this->dbutil->backup($config);

        // Set the backup file path for the backups folder
        $backups_folder_path = FCPATH . 'backups/database/' . $config['filename'] . '.sql';

        // Write the backup file to the backups folder
        write_file($backups_folder_path, $backup);

        if (file_exists($backups_folder_path)) {
            // Backup created successfully
            $this->session->set_userdata('alert', 'Database backup created successfully!');
        } else {
            // Backup creation failed
            $this->session->set_userdata('error', 'Failed to create database backup!');
        }

        // Redirect back to the desired page
        redirect(base_url('dashboard/backup_and_restore'));
    }

    public function callback_validate_backup_file($file)
    {
        if (empty($_FILES['backup_file']['name'])) {
            $this->form_validation->set_message('callback_validate_backup_file', 'Please select a backup file.');
            return FALSE;
        }

        $file_extension = pathinfo($_FILES['backup_file']['name'], PATHINFO_EXTENSION);
        if ($file_extension !== 'sql') {
            $this->form_validation->set_message('callback_validate_backup_file', 'The selected file is not a valid SQL file.');
            return FALSE;
        }

        return TRUE;
    }

    public function restore_database()
    {
        $this->load->database();

        // Handle file upload
        $uploadPath = './uploads/';
        $uploadedFile = $_FILES['dump_file']['tmp_name'];
        $uploadedFileName = $_FILES['dump_file']['name'];
        $targetPath = $uploadPath . $uploadedFileName;

        if (!move_uploaded_file($uploadedFile, $targetPath)) {
            $this->session->set_userdata('error', 'Your input file is empty you must upload a file.');
            redirect('dashboard/backup_and_restore');
        }

        // Drop tables in the database
        $tables = $this->db->list_tables();
        foreach ($tables as $table) {
            $this->db->query("DROP TABLE IF EXISTS $table");
        }

        // Import SQL dump file
        $sql = file_get_contents($targetPath);
        $queries = explode(';', $sql);

        foreach ($queries as $query) {
            if (trim($query) !== '') {
                $this->db->query($query);
            }
        }

        // Delete the temporary uploaded file
        unlink($targetPath);

        $this->session->set_userdata('alert', 'Database has been restored!');
        redirect(base_url('dashboard/backup_and_restore'));
    }

    public function backup_assets_folder()
    {
        $this->load->library('zip');

        // Set the path to the root folder
        $rootFolder = FCPATH . 'assets';

        // Set the path to the backup directory
        $backupDir = FCPATH . 'backups/assets';

        // Set the path to the downloads directory
        $downloadsDir = FCPATH . 'downloads';

        // Create a filename for the backup using only the date
        $backupFileName = 'assets_backup_' . date('Y-m-d') . '.zip';

        // Create a backup of the "assets" folder
        $this->zip->read_dir($rootFolder, false);

        // Save the backup .zip file to the backup directory
        if ($this->zip->archive($backupDir . '/' . $backupFileName)) {
            // Backup successful
            $this->session->set_userdata('alert', 'Assets has been backed up!');
        } else {
            // Backup failed
            $this->session->set_userdata('error', 'Failed to create backup!');
        }

        // Redirect to the backup and restore dashboard
        redirect(base_url('dashboard/backup_and_restore'));
    }

    public function restore_assets()
    {
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if a file was uploaded
            if (isset($_FILES['assets_zip']) && $_FILES['assets_zip']['error'] === UPLOAD_ERR_OK) {
                // Define the target directory where the assets will be restored
                $targetDirectory = './assets'; // Use the correct path to your "assets" folder
        
                // Extract the uploaded zip file
                $zipFile = $_FILES['assets_zip']['tmp_name'];
                $zip = new ZipArchive();
                if ($zip->open($zipFile) === true) {
                    // Delete the old assets before extracting the new ones
                    $this->deleteDirectory($targetDirectory);
        
                    // Extract the new assets
                    $zip->extractTo('./');
                    $zip->close();
        
                    // Redirect back to the form
                    $this->session->set_userdata('alert', 'Assets folder has been restored!');
                    redirect('dashboard/backup_and_restore');
                } else {
                    // Failed to open the zip file
                    $this->session->set_userdata('error', 'Failed to open the uploaded zip file.');
                    redirect('dashboard/backup_and_restore');
                }
            } else {
                $this->session->set_userdata('error', 'Please upload a valid zip file.');
                redirect('dashboard/backup_and_restore');
            }
        }
    }
    
    
    // Helper function to delete a directory and its contents
    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return;
        }
    
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->deleteDirectory("$dir/$file") : unlink("$dir/$file");
        }
    
        return rmdir($dir);
    }

    // Helper function to move the contents of a directory to another directory
    private function moveDirectoryContents($source, $destination)
    {
        $files = glob($source . '/*');
        foreach ($files as $file) {
            if (is_dir($file)) {
                $dirName = basename($file);
                $this->moveDirectoryContents($file, $destination . '/' . $dirName);
            } else {
                $fileName = basename($file);
                rename($file, $destination . '/' . $fileName);
            }
        }
    }

    public function compose_email($t_ticket_no) {
        // Load the email and database libraries
        $this->load->library('email');
    
        // Get the form input values
        $receiver = $this->input->post('receiver');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
    
        // Check if files were uploaded
        $files = $_FILES['attachment'];
        $file_names = array();
    
        if (!empty($files['name'][0])) {
            // Loop through each uploaded file
            for ($i = 0; $i < count($files['name']); $i++) {
                $file_name = $files['name'][$i];
                $file_path = './assets/email_attachments/' . $file_name;
                $file_uploaded = move_uploaded_file($files['tmp_name'][$i], $file_path);
    
                if ($file_uploaded) {
                    $file_exists = file_exists($file_path);
                    if ($file_exists) {
                        $file_names[] = $file_name;
                    }
                } else {
                    $file_exists = false;
                }
            }
        }
    
        // Prepare the file names for database storage
        $file_names_str = implode(", ", $file_names);
    
        $data = array(
            'receiver' => $receiver,
            'subject' => $subject,
            'message' => $message,
            'file_name' => $file_names_str,
        );
    
        $query = $this->crud_model->save_uploaded_file($data);
    
        // Configure email settings
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
    
        // Set email parameters
        $this->email->from('management@iequity.com.ph', 'no-reply');
        $this->email->to($receiver);
        $this->email->subject($subject);
    
        // Construct the email message
        $email_body = '
            <div style="font-family: Arial, sans-serif; background-color: #f1f1f1; padding: 20px;">
                <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px;">
                    <h1 style="font-size: 24px; color: #333;">'.$subject.'</h1>
                    <p style="font-size: 16px; color: #555;">'.$message.'</p>
                    <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">';
    
        // Add the file links to the email body
        if ($file_exists) {
            $email_body .= '<h2 style="font-size: 18px; color: #333;">Attachments:</h2>';
    
            foreach ($file_names as $file_name) {
                $file_link = base_url('assets/email_attachments/'.$file_name);
                $email_body .= '<p style="font-size: 14px; color: #888;"><a href="'.$file_link.'">'.$file_name.'</a></p>';
            }
        }
    
        $email_body .= '</div></div>';
    
        $this->email->message($email_body);
    
        // Send the email
        if ($this->email->send() && $query && $file_exists) {
            // Email sent successfully and data saved
            $this->session->set_userdata('alert', 'Email Sent and Composed email saved!');
        } else {
            // Error occurred while sending email or saving data
            $this->session->set_userdata('error', 'Failed to send the email or save composed email or file upload error!');
        }
    
        // Page redirection
        redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
    }        
    
    public function edit_pmc($pmc_id, $t_ticket_no){
        $email = $this->session->userdata('email');
        $user_info = $this->crud_model->get_data_by_email($email);
        $user_info_alt = $this->crud_model->get_data_by_email_alt($email);
        $company_info = $this->crud_model->get_company_profile();
        $ticket_info = $this->crud_model->get_ticket_info($t_ticket_no);
        $pmc_info = $this->crud_model->get_pmc_info($pmc_id);

        $data = array(
            'user_info' => $user_info,
            'ticket_info' => $ticket_info,
            'pmc_info' => $pmc_info,
        );

        $data2 = array(
            'company_info' => $company_info,
            'user_info' => $user_info,
        );

        $this->load->view('dashboard/partials/header');
        $this->load->view('dashboard/components/partials/offcanvas-sidebar', $data2);
        $this->load->view('dashboard/components/pages/pmc_edit_page', $data);
        $this->load->view('dashboard/partials/footer');
    }

    public function update_pmc($t_ticket_no){
        $pmc_id = $this->input->post('pmc_id');

        $data = array(
            'description' => $this->input->post('description'),
            'qty' => $this->input->post('qty'),
            'unit' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'amount' => $this->input->post('amount'),
        );

        $this->db->trans_start(); // Start a database transaction
        
        $this->db->where('pmc_id', $pmc_id);
        $result = $this->db->update('parts_or_material_charges', $data);
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Failed request!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Updated!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }

    public function delete_pmc($t_ticket_no){
        $pmc_id = $this->input->post('pmc_id');

        $this->db->trans_start(); // Start a database transaction
        
        // Delete from 'parts_or_material_charges' table
        $this->db->where('pmc_id', $pmc_id);
        $this->db->delete('parts_or_material_charges');
        
        $this->db->trans_complete(); // Complete the database transaction
        
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            $this->session->set_userdata('error', 'Failed to remove item!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        } else {
            // Transaction succeeded
            $this->session->set_userdata('alert', 'Item was removed!');
            redirect(base_url('dashboard/service_invoice/'.$t_ticket_no));
        }
    }
}
?>