<?php

class MY_Controller extends CI_Controller {
  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect(base_url());
    }
  }
}

?>