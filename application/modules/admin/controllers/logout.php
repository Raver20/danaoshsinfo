<?php
class Logout extends MX_Controller 
{

function __construct() {
parent::__construct();
}

// Logout from admin page
public function index() {

    // Removing session data
    $sess_array = array(
    'userid' => '',
    'username' => ''
    );
    $this->session->unset_userdata('admin', $sess_array);
    // $data['message_display'] = 'Successfully Logout';
    // $this->load->view('login_form', $data);
    redirect('login');
}

}
?>