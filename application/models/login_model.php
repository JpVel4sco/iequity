<?php

class Login_model extends CI_Model {
    public function get_user_by_email($email, $password) {
        $query = $this->db->get_where('iequity_users', array('email' => $email));
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return null;
        }
    }
}