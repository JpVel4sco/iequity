<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function process_login() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url());
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->login_model->get_user_by_email($email, $password);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    if ($user->email_verification == 1) {
                        // Email verification successful, set user session data
                        $this->set_user_session_data($user);

                        // Set alert message
                        $this->session->set_userdata('alert', 'Welcome to the dashboard!');

                        // Redirect to the appropriate dashboard based on user type
                        redirect($this->get_dashboard_url_by_type($user->account_type));
                    } else {
                        // Email not verified
                        $this->session->set_flashdata('error', 'Please check your email to verify your account.');
                        redirect(base_url());
                    }
                } else {
                    // Invalid password
                    $this->session->set_flashdata('error', 'Invalid email or password!');
                    redirect(base_url());
                }
            } else {
                // User not found
                $this->session->set_flashdata('error', 'Invalid email or password!');
                redirect(base_url());
            }
        }
    }

    private function set_user_session_data($user) {
        $this->session->set_userdata('account_no', $user->account_no);
        $this->session->set_userdata('account_type', $user->account_type);
        $this->session->set_userdata('fname', $user->fname);
        $this->session->set_userdata('mname', $user->mname);
        $this->session->set_userdata('lname', $user->lname);
        $this->session->set_userdata('email', $user->email);
        $this->session->set_userdata('mobile', $user->mobile);
        $this->session->set_userdata('comp_name', $user->comp_name);
        $this->session->set_userdata('comp_address', $user->comp_address);
        $this->session->set_userdata('comp_tel', $user->comp_tel);
        $this->session->set_userdata('department', $user->department);
        $this->session->set_userdata('tin_no', $user->tin_no);
    }

    private function get_dashboard_url_by_type($user_type) {
        // Return the appropriate dashboard URL based on user type
        switch ($user_type) {
            case 'admin':
                return base_url('dashboard');
            case 'service':
                return base_url('dashboard');
            case 'service_support':
                return base_url('dashboard');
            case 'technical':
                return base_url('dashboard');
            case 'technical_support':
                return base_url('dashboard');
            case 'user':
                return base_url('dashboard');
            default:
                return base_url('dashboard');
        }
    }

    public function logout() {
        // Clear user session data and destroy session
        $this->session->unset_userdata('account_no');
        $this->session->unset_userdata('account_type');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('mname');
        $this->session->unset_userdata('lname');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('mobile');
        $this->session->unset_userdata('comp_name');
        $this->session->unset_userdata('comp_address');
        $this->session->unset_userdata('comp_tel');
        $this->session->unset_userdata('department');
        $this->session->unset_userdata('tin_no');
        $this->session->sess_destroy();

        redirect(base_url());
    }
}
?>
