<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('crud_model');
        $this->load->library('session');
        $this->load->library('email'); // Load the email library
    }
    
    public function index() {

        $company_info = $this->crud_model->get_company_profile();

        $data = array(
            'company_info' => $company_info,
        );

        $this->load->view('front/partials/header');
        $this->load->view('front/pages/homepage', $data);
        $this->load->view('front/partials/footer');
    }

    public function super_admin_reg(){
        $result = $this->crud_model->check_super_admin_existence();
        if ($result === true) {
            redirect(base_url());
        } else {
            $this->load->view('front/partials/header');
            $this->load->view('front/pages/super_admin_reg');
            $this->load->view('front/partials/footer');
        }
    }

    public function save_super_admin(){
        $u_data = [
            'account_type' => 'super admin',
            'email_verification' => 1,
            'user_registration_date' => $this->input->post('user_registration_date'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'comp_name' => $this->input->post('comp_name'),
            'comp_address' => $this->input->post('comp_address'),
            'comp_tel' => $this->input->post('comp_tel'),
            'department' => $this->input->post('department'),
            'tin_no' => $this->input->post('tin_no'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
    
        $insert_id = $this->crud_model->insert_entry($u_data);
    
        if ($insert_id) {
            // Set alert message
            $this->session->set_userdata('alert', 'Account has been created for Super Admin!');
    
            // Redirect to homepage
            redirect(base_url());
        } else {
            // Set alert message
            $this->session->set_userdata('error', 'Failed request.');
    
            // Redirect to signup page
            redirect(base_url());
        }
    }
    
    public function sign_up() {
        $email = $this->input->post('email');
        $user_exists = $this->crud_model->check_user_exists($email);
        if ($user_exists) {
            $account_info = $this->crud_model->get_user_info_by_email($email);
            if($account_info->email_verification == 1){
                // Set alert message
                $this->session->set_userdata('error', 'Email already exists! Please login instead.');
                echo '<script>';
                echo 'window.history.back();';
                echo '</script>';
                return;
            }elseif($account_info->email_verification == 0){
                // Set alert message
                $this->session->set_userdata('error', 'Email already exists! Please check your email for verification.');
                echo '<script>';
                echo 'window.history.back();';
                echo '</script>';
                return;
            }
        }
    
        $u_data = [
            'account_type' => 'User',
            'email_verification' => 0,
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
        ];
    
        $insert_id = $this->crud_model->insert_entry($u_data);
    
        if ($insert_id) {
            // Send email receipt
            $this->sendEmailReceiptSignUp($u_data);
    
            // Set alert message
            $this->session->set_userdata('alert', 'Registered! Please go to your email to verify your account.');
    
            // Redirect to homepage
            redirect(base_url());
        } else {
            // Set alert message
            $this->session->set_userdata('error', 'Failed.');
    
            // Redirect to signup page
            redirect(base_url('signup'));
        }
    }
    
private function sendEmailReceiptSignUp($data) {
    // Set up the email configuration
    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    // Set the email details
    $this->email->from('management@iequity.com.ph', 'no-reply');
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

    
    public function activate_account($encodedEmail) {
        // Decode the email
        $email = urldecode($encodedEmail);
    
        $user = $this->crud_model->get_user_by_email($email);
    
        if ($user) {
            if ($user->email_verification == 0) {
                // Activate the user's account
                $data = array(
                    'email_verification' => 1,
                );
                $this->crud_model->activate_user_account($email, $data);
    
                // Set alert message
                $this->session->set_userdata('alert', 'Account has been verified!');
    
                // Redirect to the homepage
                redirect(base_url());
            } else {
                // Set alert message
                $this->session->set_userdata('error', 'Account is already activated.');
    
                // Redirect to the homepage
                redirect(base_url());
            }
        } else {
            // Set alert message
            $this->session->set_userdata('error', 'Invalid activation link.');
    
            // Redirect to the homepage
            redirect(base_url());
        }
    }
    
    
    public function activate_user_account($email) {
        $this->db->where('email', $email);
        $this->db->update('iequity_users', ['email_verification' => 1]);
    }
        
    
    public function ticket_reg() {
        $email = $this->input->post('t_email');
        $user_exists = $this->crud_model->check_user_exists($email);

        if ($user_exists) {
            $account_info = $this->crud_model->get_user_info_by_email($email);
            if($account_info->email_verification == 1){
                // Set alert message
                $this->session->set_userdata('error', 'Email already exists! Please login instead.');
                echo '<script>';
                echo 'window.history.back();';
                echo '</script>';
                return;
            }elseif($account_info->email_verification == 0){
                // Set alert message
                $this->session->set_userdata('error', 'Email already exists! Please check your email for verification.');
                echo '<script>';
                echo 'window.history.back();';
                echo '</script>';
                return;
            }
        }

        $u_data = [
            'account_type' => 'User',
            'email_verification' => '0',
            'user_registration_date' => $this->input->post('t_user_registration_date'),
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
            'password' => password_hash($this->input->post('t_password'), PASSWORD_DEFAULT),
        ];

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
            'warranty' => $this->input->post('warranty'),
        ];

        $insert_id = $this->crud_model->insert_entry($u_data);
        $insert_id = $this->crud_model->insert_ticket($t_data);

        if ($insert_id) {
            // Set alert message
            $this->session->set_userdata('alert', 'Submitted! Please check your email for verification!');
            
            // Send email receipt
            $this->sendEmailReceipt($t_data); // Call the function to send the email receipt
            
            echo '<script>';
            echo 'window.location.href = "' . base_url() . '";';
            echo '</script>';
        } else {
            $this->session->set_userdata('error', 'Failed!');
            echo '<script>';
            echo 'window.location.href = "' . base_url('homepage') . '";';
            echo '</script>';
        }
    }
    
    private function sendEmailReceipt($data) {
        // Set up the email configuration
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
    
        // Set the email details
        $this->email->from('management@iequity.com.ph', 'no-reply');
        $this->email->to($data['email']);
        $this->email->subject('Ticket Registration Receipt');
        
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
                        <h2>Ticket Registration Receipt</h2>
                    </div>
                    <div class="content">
                        <p>Dear ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname'] . ',</p>
                        <p>Thank you for registering your ticket. Here is your ticket information:</p>
                        <p><strong>Product information:</strong></p>
                        <ul>
                            <li><strong>Model:</strong> ' . $data['t_model'] . '</li>
                            <li><strong>Serial no:</strong> ' . $data['t_serial_no'] . '</li>
                            <li><strong>Delivery receipt no:</strong> ' . $data['t_dr_no'] . '</li>
                            <li><strong>Qty:</strong> ' . $data['t_qty'] . '</li>
                            <li><strong>Unit:</strong> ' . $data['t_unit'] . '</li>
                            <li><strong>Problem:</strong> ' . $data['t_problem'] . '</li>
                            <li><strong>Warranty:</strong> ' . $data['warranty'] . '</li>
                        </ul>
                        <p><strong>Account Information:</strong></p>
                        <p><strong>Email:</strong> ' . $data['email'] . '</p>
                        <p>Thank you for registering your ticket and you make an account! Click the button below to activate your account and return to the homepage:</p>
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
    
    // Forget Password Proceess
public function get_email_message()
{
    $email = $this->input->post('email');
    $user_exists = $this->crud_model->check_user_exists($email);

    if ($user_exists) {
        // Generate a random password
        $new_password = $this->generate_random_password();

        // Update the user's password in the database
        $password_updated = $this->crud_model->update_user_password($email, $new_password);

        if ($password_updated) {
            // Send password reset email
            $this->sendPasswordResetEmail($email, $new_password);

            // Set success message
            $this->session->set_userdata('alert', 'Password reset instructions have been sent to your email.');

            // Redirect to homepage or appropriate page
            redirect(base_url());
        } else {
            // Set error message
            $this->session->set_userdata('error', 'Failed to update password.');

            // Redirect to forget password page
            redirect(base_url('homepage'));
        }
    } else {
        // Set error message
        $this->session->set_userdata('error', 'Email address not found.');

        // Redirect to forget password page
        redirect(base_url('homepage'));
    }
}

private function sendPasswordResetEmail($email, $new_password)
{
    // Set up the email configuration
    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    // Set the email details
    $this->email->from('management@iequity.com.ph', 'no-reply');
    $this->email->to($email);
    $this->email->subject('Password Reset');

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
                    <h2>Password Reset</h2>
                </div>
                <div class="content">
                    <p>Dear User,</p>
                    <p>Your new password is:</p>
                    <p>Please note that this password has been generated for you. If you have any concern, please contact our support team. Thank you!</p>
                    <p><strong>' . $new_password . '</strong></p>

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


private function generate_random_password($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }
    return $password;
}

public function submit_contact_form()
{
    $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'subject' => $this->input->post('subject'),
        'message' => $this->input->post('message')
    );

    // Load the model
    $this->load->model('crud_model');

    // Call the model method to save the data
    $result = $this->crud_model->save_contact_data($data);

    // Send the email
    $this->sendContactFormEmail($data['first_name'], $data['last_name'], $data['email'], $data['subject'], $data['message']);

    if ($result) {
        // Set success message
        $this->session->set_flashdata('alert', 'Your message has been sent to the company.');
    } else {
        // Set error message
        $this->session->set_flashdata('error', 'Failed to submit form data.');
    }

    // Redirect to homepage or appropriate page
    redirect(base_url());
}



private function sendContactFormEmail($first_name, $last_name, $email, $subject, $message)
{
    // Set up the email configuration
    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    // Set the email details
    $this->email->from($email, $first_name . ' ' . $last_name);
    $this->email->to('management@iequity.com.ph'); // Replace with your email address
    $this->email->subject($subject);

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
                    <h2>Contact Form Submission</h2>
                </div>
                <div class="content">
                    <p><strong>Name:</strong> ' . $first_name . ' ' . $last_name . '</p>
                    <p><strong>Email:</strong> ' . $email . '</p>
                    <p><strong>Message:</strong></p>
                    <p>' . $message . '</p>
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

}