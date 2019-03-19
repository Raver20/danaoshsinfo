<?php
class School_admin extends MX_Controller 
{

function __construct() {
parent::__construct();
}

// Logout from admin page
public function logout() {

    // Removing session data
    $sess_array = array(
    'userid' => '',
    'username' => ''
    );
    $this->session->unset_userdata('schooladmin', $sess_array);
    // $data['message_display'] = 'Successfully Logout';
    // $this->load->view('login_form', $data);
    redirect('school_admin/login');
}

function login()
{

    if (isset($this->session->userdata['schooladmin'])) 
    {
        redirect('school_facilities/manage');
    } 
    elseif (isset($this->session->userdata['admin'])){
        redirect('strands/manage');
    }
    else 
    {
        $data['flash'] = $this->session->flashdata('login');
        $data['view_file'] = "school_login";
        $this->load->module('templates');
        $this->templates->login($data);
    }
  
}
public function auth()
{
  
    
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules("user", "User", "required");
    $this->form_validation->set_rules("password", "Password", "required");
    
    if ($this->form_validation->run()==TRUE)
        {
           
            $user = $this->input->post("user");
            $password = $this->input->post("password");
            
            $this->load->model("mdl_login");
            $this->mdl_login->user = $user;
            $this->mdl_login->password = $password;
            if($this->mdl_login->check_user())
                {

                $session_data = $this->mdl_login->check_user();
                
                $this->session->set_userdata("schooladmin",$session_data);
                redirect('school_info/dashboard');

                }
            else
            {
                $flash_msg = "You entered incorrect username and/or password";
                $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('login', $value);
                redirect('school_admin/login');
            }

        }
        else
        {
            $flash_msg = "You entered incorrect username and/or password";
            $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('login', $value);
            redirect('school_admin/login');

        }
    
   
    }


// function test()
// {
//     $this->load->model("mdl_login");
//     $this->mdl_login->user="admin";
//     $this->mdl_login->password="danaoinfo";
//     echo $this->mdl_login->check_user();
// }
function get($order_by)
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $count = $this->mdl_perfectcontroller->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_perfectcontroller');
    $max_id = $this->mdl_perfectcontroller->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
    return $query;
}

}