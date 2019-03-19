<?php
class School_strands extends MX_Controller 
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
        redirect('requirements/manage');
    }

    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('requirement_name', "Requirement Name" , 'required|trim');
        $this->form_validation->set_rules('requirement_desc', "Requirement Description" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            
            

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The requirements details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('requirements', $value);
                redirect('requirements/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new requirements were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('requirements', $value);
                redirect('requirements/manage/'.$update_id);
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
        $data['headline'] = "Add Requirement";
    }
    else
    {
        $data['headline'] = "Update Requirement Details";   
    } 
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('requirements');
    $data['view_module'] = "requirements";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}

function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    $data['school_strands_query'] = $this->get_by_id($school_id);
    $data['view_module'] = "school_strands";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}

function fetch_data_from_post()
{
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    $data['school_id'] = $school_id;
    $data['requirement_id'] = $this->input->post('requirement_id', TRUE);
    $data['requirement_name'] = $this->input->post('requirement_name', TRUE);
    $data['requirement_desc'] = $this->input->post('requirement_desc', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) 
    {
        $data['school_id'] = $row->school_id;
        $data['requirement_id'] = $row->requirement_id;
        $data['requirement_name'] = $row->requirement_name;
        $data['requirement_desc'] = $row->requirement_desc;
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}

function get_by_id($school_id)
{
    $this->load->model('mdl_school_strands');
    $school_strands_query = $this->mdl_school_strands->get_by_id($school_id);
    return $school_strands_query;
}

function get($order_by)
{
    $this->load->model('mdl_school_strands');
    $query = $this->mdl_school_strands->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $query = $this->mdl_school_strands->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $query = $this->mdl_school_strands->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_school_strands');
    $query = $this->mdl_school_strands->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_school_strands');
    $this->mdl_school_strands->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $this->mdl_school_strands->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $this->mdl_school_strands->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_school_strands');
    $count = $this->mdl_school_strands->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_school_strands');
    $max_id = $this->mdl_school_strands->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_school_strands');
    $query = $this->mdl_school_strands->_custom_query($mysql_query);
    return $query;
}

}