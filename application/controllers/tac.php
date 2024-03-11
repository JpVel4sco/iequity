<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tac extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('crud_model');
    }
    
    public function index() {

        $company_info = $this->crud_model->get_company_profile();

        $data = array(
            'company_info' => $company_info,
        );

        $this->load->view('front/pages/tac', $data);
    }
    
}
?>