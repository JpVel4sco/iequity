<?php

class Crud_model extends CI_Model
{
    public function store_company_profile($c_data){
        return $this->db->insert('company_profile', $c_data);
    }

    public function update_company_profile($data){
        $this->db->where('company_id', 1);
        $result = $this->db->update('company_profile', $data);
    
        return $result;
    }

    public function getCompanyProfile($compId)
    {
        $query = $this->db->get_where('company_profile', array('comp_id' => $compId));
        return $query->row(); 
    }

    public function insert_entry($u_data)
    {
        return $this->db->insert('iequity_users', $u_data);
    }

    public function insert_ticket($data){
        return $this->db->insert('iequity_tickets', $data);
    }

    public function get_tickets() {
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('iequity_tickets');
        return $query->result_array();
    }

    public function get_tickets_by_user($email) {
        $this->db->where('email', $email);
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('iequity_tickets');
        return $query->result_array();
    }    

    public function get_unassigned_tickets() {
        $this->db->where('t_ticket_status', 'unassigned');
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('iequity_tickets');
        return $query->result_array();
    }

    public function get_unassigned_tickets_by_user($email) {
        $this->db->where('t_ticket_status', 'unassigned');
        $this->db->where('email', $email);
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('iequity_tickets');
        return $query->result_array();
    }    
    
    public function get_users() {
        $query = $this->db->get('iequity_users');
        return $query->result_array();
    }

    public function get_users_by_admin() {
        $this->db->where_not_in('account_type', array('service', 'service support', 'super admin', 'admin'));
        $query = $this->db->get('iequity_users');
        return $query->result_array();
    }

    public function get_users_by_super_admin() {
        $this->db->where_not_in('account_type', array('super admin'));
        $query = $this->db->get('iequity_users');
        return $query->result_array();
    }
    

    public function get_ticket_info($id){
        return $this->db->get_where('iequity_tickets', array('ticket_no'=>$id))->row();
    }

    public function get_pmc_info($id){
        return $this->db->get_where('parts_or_material_charges', array('pmc_id'=>$id))->row();
    }
    
    public function get_cancelled_ticket_info($id){
        return $this->db->get_where('cancelled_tickets', array('ticket_no'=>$id))->row();
    }

    public function get_ticket_info_for_retrieving($id){
        return $this->db->get_where('cancelled_tickets', array('ticket_no'=>$id))->row();
    }

    public function get_user_info($id){
        return $this->db->get_where('iequity_users', array('account_no'=>$id))->row();
    }

    Public function get_user_info_by_email($email){
        return $this->db->get_where('iequity_users', array('email'=>$email))->row();
    }

    public function get_company_profile() {
        $this->db->where('company_id', 1);
        $query = $this->db->get('company_profile');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_data_by_email($email) {
        $query = $this->db->get_where('iequity_users', array('email' => $email));
        return $query->result_array();
    }

    public function get_data_by_email_alt($email) {
        $query = $this->db->get_where('iequity_users', array('email' => $email));
        return $query->row_array(); 
    }
    

    public function getTechnicianData() {
        $this->db->where('account_type', 'technical');
        $this->db->or_where('account_type', 'technical support');
        $query = $this->db->get('iequity_users');
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }    

    public function updateUserInfo($email, $newInfo) {
        $this->db->where('email', $email);
        $result = $this->db->update('iequity_users', $newInfo);
    
        return $result;
    }

    public function updateUserInfoById($id, $newInfo) {
        $this->db->where('account_no', $id);
        $result = $this->db->update('iequity_users', $newInfo);
    
        return $result;
    }

    public function update_password_by_id($id, $newInfo){
        $this->db->where('account_no', $id);
        $result = $this->db->update('iequity_users', $newInfo);

        return $result;
    }

    public function updateTicketInfo($data, $id) {
        $this->db->where('ticket_no', $id);
        $result = $this->db->update('iequity_tickets', $data);
        return $result;
    }
    
    public function users_count(){
        $query = $this->db->get('iequity_users');
        return $query->num_rows();
    }

    public function ticket_count(){
        $query = $this->db->get('iequity_tickets');
        return $query->num_rows();
    }

    public function ticket_count_by_user($email){
        $this->db->where('email', $email);
        $query = $this->db->get('iequity_tickets');
        return $query->num_rows();
    }    
    
    public function ticket_count_open(){
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->like('t_ticket_status', 'open');
        return $this->db->count_all_results();
    }

    public function ticket_count_open_by_user($email){
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->like('t_ticket_status', 'open');
        $this->db->where('email', $email);
        return $this->db->count_all_results();
    }    

    public function ticket_count_closed(){
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->like('t_ticket_status', 'closed');
        return $this->db->count_all_results();
    }

    public function ticket_count_closed_by_user($email){
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->like('t_ticket_status', 'closed');
        $this->db->where('email', $email);
        return $this->db->count_all_results();
    }

    public function ticket_count_unassigned(){
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->like('t_ticket_status', 'unassigned');
        return $this->db->count_all_results();
    }

    public function ticket_count_unassigned_by_user($email){
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->like('t_ticket_status', 'unassigned');
        $this->db->where('email', $email);
        return $this->db->count_all_results();
    }

    public function check_user_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('iequity_users');
        return $query->num_rows() > 0;
    }
    
    public function saveSelectedData($data) { 
        return $this->db->insert('ticket_status', $data);
    }

    public function saveTechnicianNames($t_ticket_no, $data) {
        $this->db->where('ticket_no', $t_ticket_no);
        $this->db->update('iequity_tickets', $data);
    }

    public function get_ticket_statuses($ticket_id) {
        $this->db->where('ticket_id', $ticket_id);
        $this->db->order_by('ticket_status_id', 'desc');
        $query = $this->db->get('ticket_status');
        return $query->result_array();
    }

    public function checkExistingData($t_ticket_no, $fullName) {
        $this->db->where('ticket_id', $t_ticket_no);
        $this->db->where('technician_name', $fullName);
        $query = $this->db->get('ticket_status');
        
        return $query->num_rows();
    }

    public function get_service_invoice($ticket_id) {
        $this->db->where('ticket_no', $ticket_id);
        $query = $this->db->get('service_invoice');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_mr_row($ticket_id) {
        $this->db->where('ticket_no', $ticket_id);
        $query = $this->db->get('mr');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_service_invoice($data){
        return $this->db->insert('service_invoice', $data);
    }

    public function insert_mr($data){
        return $this->db->insert('mr', $data);
    }

    public function add_parts_and_mats($data){
        return $this->db->insert('parts_or_material_charges', $data);
    }

    public function add_labor_and_other_charges($data){
        return $this->db->insert('labor_or_other_charges', $data);
    }
    
    public function get_parts_or_material_charges($ticket_no) {
        $this->db->where('ticket_no', $ticket_no);
        $this->db->order_by('pmc_id', 'DESC');
        $query = $this->db->get('parts_or_material_charges');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

    public function get_labor_or_other_charges($ticket_no){
        $this->db->where('ticket_no', $ticket_no);
        $this->db->order_by('loc_id', 'DESC');
        $query = $this->db->get('labor_or_other_charges');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function update_serial_info($ticket_no, $data){
        $this->db->where('ticket_no', $ticket_no);
        $result = $this->db->update('service_invoice', $data);
    
        return $result;
    }
    
    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('iequity_users');
        return $query->row();
    }
    
    public function activate_user_account($email, $data) {
        $this->db->where('email', $email);
        $query = $this->db->update('iequity_users', $data);
        return;
    }
 
    public function is_image_exist($filename) {
        $this->db->where('comp_logo', $filename);
        $query = $this->db->get('company_profile');
        return $query->num_rows() > 0;
    }

    public function get_company_logo()
    {
        $query = $this->db->select('comp_logo')
                          ->from('company_profile') 
                          ->limit(1)
                          ->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->comp_logo;
        } else {
            return false;
        }
    }

    public function get_company_bldg_pic()
    {
        $this->db->select('comp_bldg_pic');
        $query = $this->db->get('company_profile');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->comp_bldg_pic;
        } else {
            return null;
        }
    }

    public function get_company_profile_comp_logo() {
       
        $this->db->select('comp_logo');
        $this->db->from('company_profile');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function getAssignedTickets($user_info) {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'open');
        $query = $this->db->get();
        $tickets = $query->result();
    
        $assigned_tickets = array();
    
        foreach ($tickets as $ticket) {
            $assigned_users = explode(', ', $ticket->t_technical_assigned);
    
            
            foreach ($assigned_users as $assigned_user) {
                if ($user_info->fname . ' ' . $user_info->lname === $assigned_user) {
                    $assigned_tickets[] = $ticket;
                    break;
                }
            }
        }
    
        return $assigned_tickets;
    }    

    public function getdatabyemailnew($email) {
        $query = $this->db->get_where('iequity_users', array('email' => $email));
        return $query->row();
    }

    public function save_diagnose($data){
        return $this->db->insert('memo', $data);
    }

    public function getDiagnoseData($ticket_no) {
        $this->db->where('ticket_no', $ticket_no);
        $this->db->order_by('memo_id', 'desc');
        $query = $this->db->get('memo');
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function close_ticket($data, $id){
        $this->db->where('ticket_no', $id);
        $result = $this->db->update('iequity_tickets', $data);
        return $result;
    }

    public function update_user_password($email, $password)
    {
        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->where('email', $email);
        $this->db->update('iequity_users', $data);
        return $this->db->affected_rows() > 0;
    }

    public function validate_reset_code($resetCode) {
        $this->db->where('reset_code', $resetCode);
        $query = $this->db->get('iequity_users');

        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row->email;
        } else {
            return false;
        }
    }

    public function update_password($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->where('email', $email);
        $this->db->update('iequity_users', ['password' => $hashedPassword]);
    }

    public function save_contact_message($first_name, $last_name, $email, $subject, $message)
    {
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        );

        $this->db->insert('contact_form', $data);
    }

    public function save_contact_data($data)
    {
        $this->db->insert('contact_form', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_open_tickets() {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'open');
        $this->db->order_by('ticket_no', 'desc');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_open_tickets_by_email($email) {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'open');
        $this->db->where('email', $email);
        $this->db->order_by('ticket_no', 'desc');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_closed_tickets() {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'closed');
        $this->db->order_by('ticket_no', 'desc');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_closed_tickets_by_email($email) {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'closed');
        $this->db->where('email', $email);
        $this->db->order_by('ticket_no', 'desc');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_pending_or_unassigned_tickets() {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'unassigned');
        $this->db->order_by('ticket_no', 'desc');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_pending_or_unassigned_tickets_by_email($email) {
        $this->db->select('*');
        $this->db->from('iequity_tickets');
        $this->db->where('t_ticket_status', 'unassigned');
        $this->db->where('email', $email);
        $this->db->order_by('ticket_no', 'desc');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_cancelled_tickets(){
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('cancelled_tickets');
        return $query->result_array();
    }

    public function get_cancelled_tickets_by_user($email){
        $this->db->where('email', $email);
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('cancelled_tickets');
        return $query->result_array();
    }
    
    public function get_related_tickets_based_on_same_serial_no($serial_no, $t_ticket_no){
        $this->db->where('t_serial_no', $serial_no);
        $this->db->where_not_in('ticket_no', $t_ticket_no);
        $this->db->order_by('ticket_no', 'desc');
        $query = $this->db->get('iequity_tickets');
        return $query->result_array();
    }    
 
    public function save_print_permissions($permissions){
       
        foreach ($permissions as $role => $permission) {
            $data = array(
                'print_list_of_tickets' => isset($permission['print_list_of_tickets']) ? 'Yes' : 'No',
                'service_invoice' => isset($permission['service_invoice']) ? 'Yes' : 'No',
                'mr' => isset($permission['mr']) ? 'Yes' : 'No'
            );
            $this->db->where('role', $role);
            if (!$this->db->update('print_doc_permissions', $data)) {
                return false;
            }
        }

        
        return true;
    }
    
    public function get_print_doc_permissions() {
        $query = $this->db->get('print_doc_permissions');
        return $query->result();
    }

    public function get_ticket_operation_permissions() {
        $query = $this->db->get('ticket_operations_permissions');
        return $query->result();
    }

    public function get_technical_activity_permissions() {
        $query = $this->db->get('technical_activity_permissions');
        return $query->result();
    }

    public function get_account_management_permissions() {
        $query = $this->db->get('account_management_permission');
        return $query->result();
    }

    public function update_print_permission($role_id, $data) {
        $this->db->where('role_id', $role_id);
        return $this->db->update('print_doc_permissions', $data);
    }

    public function update_ticket_operation_permission($role_id, $data){
        $this->db->where('role_id', $role_id);
        return $this->db->update('ticket_operations_permissions', $data);
    }

    public function update_technical_activity_permissions($role_id, $data){
        $this->db->where('role_id', $role_id);
        return $this->db->update('technical_activity_permissions', $data);
    }

    public function update_account_management_permissions($role_id, $data){
        $this->db->where('role_id', $role_id);
        return $this->db->update('account_management_permission', $data);
    }
    
    public function get_print_permissions($role_from_user_info) {
        $this->db->where('role', $role_from_user_info);
        $query = $this->db->get('print_doc_permissions');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_ticket_ops_permissions($role_from_user_info) {
        $this->db->where('role', $role_from_user_info);
        $query = $this->db->get('ticket_operations_permissions');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function technician_permissions($role_from_user_info) {
        $this->db->where('role', $role_from_user_info);
        $query = $this->db->get('technical_activity_permissions');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function account_management_permissions($role_from_user_info){
        $this->db->where('role', $role_from_user_info);
        $query = $this->db->get('account_management_permission');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function check_super_admin_existence() {
        $this->db->where('account_type', 'super admin');
        $query = $this->db->get('iequity_users');
        $result = $query->row();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getMemoById($memo_id) {
        $query = $this->db->get_where('memo', array('memo_id' => $memo_id));
        return $query->row();
    }

    public function update_memo($memo_id, $data){
        $this->db->where('memo_id', $memo_id);
        return $this->db->update('memo', $data);
    }

    public function update_mr_info($t_ticket_no, $data){
        $this->db->where('ticket_no', $t_ticket_no);
        return $this->db->update('mr', $data);
    }

    public function re_open_ticket($data, $ticket_id){
        $this->db->where('ticket_no', $ticket_id);
        $result = $this->db->update('iequity_tickets', $data);
        return $result;
    }

    public function get_memo_attachment($memo_id) {
        $this->db->select('attachments');
        $this->db->from('memo');
        $this->db->where('memo_id', $memo_id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->attachment;
        } else {
            return false;
        }
    }

    public function get_attachments_by_memo_id($memo_id)
    {
        // Assuming you have a table named 'memos' with a column 'attachments' that stores comma-separated filenames
        
        // Retrieve the memo record from the database
        $this->db->select('attachments');
        $this->db->where('memo_id', $memo_id);
        $query = $this->db->get('memo');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $attachments = explode(',', $row->attachments);
            return $attachments;
        } else {
            return array(); // Return an empty array if no attachments found
        }
    }

    public function save_uploaded_file($data) {
        // Perform the database insertion
        $result = $this->db->insert('uploaded_files', $data);
    
        if ($result) {
            return true; // Indicate successful insertion
        } else {
            return false; // Indicate failed insertion
        }
    }
}