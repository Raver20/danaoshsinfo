<?php
class School_privileges extends MX_Controller 
{

function __construct() {
parent::__construct();
}
function create()
{   

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel")
    {
        redirect('school_privileges/manage');
    }

    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('privilege_name', "Privilege Name" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            $data['privilege_url'] = url_title($data['privilege_name']);
            

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The privilege details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('privileges', $value);
                redirect('school_privileges/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new privilege were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('privileges', $value);
                redirect('school_privileges/create/'.$update_id);
            }
        }
        else
        {

        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit"))
    {
        $data = $this->fetch_data_from_db($update_id);
    }
    else
    {
        $data = $this->fetch_data_from_post();
    
    }

    if (!is_numeric($update_id))
    {
        $data['headline'] = "Add Privilege";
    }
    else
    {
        $data['headline'] = "Update Privilege Details";   
    } 
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('privileges');
    $data['view_module'] = "school_privileges";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}


function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    $data['privileges_query'] = $this->get_by_id($school_id);
    $data['view_module'] = "school_privileges";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}

function fetch_data_from_post()
{
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    $data['school_id'] = $school_id;
    $data['privilege_name'] = $this->input->post('privilege_name', TRUE);
    $data['privilege_url'] = $this->input->post('privilege_url', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) 
    {
        $data['school_id'] = $row->school_id;
        $data['privilege_id'] = $row->privilege_id;
        $data['privilege_name'] = $row->privilege_name;
        $data['privilege_url'] = $row->privilege_url;
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}

function get_by_id($school_id)
{
    $this->load->model('mdl_school_privileges');
    $privileges_query = $this->mdl_school_privileges->get_by_privilege_by_id($school_id);
    return $privileges_query;
}


function get($order_by)
{
    $this->load->model('mdl_school_privileges');
    $query = $this->mdl_school_privileges->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_privileges');
    $query = $this->mdl_school_privileges->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($privilege_id)
{
    if (!is_numeric($privilege_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_privileges');
    $query = $this->mdl_school_privileges->get_where($privilege_id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_school_privileges');
    $query = $this->mdl_school_privileges->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_school_privileges');
    $this->mdl_school_privileges->_insert($data);
}

function _update($privilege_id, $data)
{
    if (!is_numeric($privilege_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_privileges');
    $this->mdl_school_privileges->_update($privilege_id, $data);
}

function _delete($privilege_id)
{
    if (!is_numeric($privilege_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_privileges');
    $this->mdl_school_privileges->_delete($privilege_id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_school_privileges');
    $count = $this->mdl_school_privileges->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_school_privileges');
    $max_id = $this->mdl_school_privileges->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_school_privileges');
    $query = $this->mdl_school_privileges->_custom_query($mysql_query);
    return $query;
}

}