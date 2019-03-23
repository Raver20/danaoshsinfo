<?php
class School_strands extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function delete($update_id)
{
    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();
        
    $flash_msg = "The school strand was successfully deleted";
    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('school_strands', $value);
    $this->_process_delete($update_id);
    redirect('school_strands/manage');
   
}
function manage()
{
    $this->load->module('site_security');
    $this->load->module('strands');
    $this->site_security->_make_sure_is_school_admin();
    $school_id = ($this->session->userdata['schooladmin']['school_id']);


    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('strand_id', "Strand ID" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables
            $data = $this->fetch_data_from_post();
        
            $this->_insert($data);
            $update_id = $this->get_max(); //get the idof the new strand
            $flash_msg = "A new strand were successfully added";
            $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
            $this->session->set_flashdata('school_strand', $value);
            redirect('school_strands/manage');
           
        }
        else
        {

        }
    }
    
    $data['school_strands_query'] = $this->strands->get('strand_name');//dropdown
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    
    $school_strands = $this->get_by_school_id($school_id);
    $strands_list = array();
    foreach ($school_strands->result() as $row)
    {
       $strands = $this->strands->get_by_id($row->strand_id)->result()[0];
       array_push($strands_list, $strands);
    }
    $data['strands_by_query'] = $strands_list;

    $this->session->set_flashdata('school_strand');
    $data['view_module'] = "school_strands";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}

function fetch_data_from_post()
{
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    $data['school_id'] = $school_id;
    $data['strand_id'] = $this->input->post('strand_id', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) 
    {
        $data['school_id'] = $row->school_id;
        $data['school_strand_id'] = $row->school_strand_id;
        $data['strand_id'] = $row->strand_id;
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}
function get_by_school_id($school_id)
{
    $this->load->model('mdl_school_strands');
    $school_strands_query = $this->mdl_school_strands->get_by_school_id($school_id);
    return $school_strands_query;
}

function get_by_id($school_strand_id)
{
    $this->load->model('mdl_school_strands');
    $school_strands_query = $this->mdl_school_strands->get_by_id($school_strand_id);
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

function get_where($school_strand_id)
{
    if (!is_numeric($school_strand_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $query = $this->mdl_school_strands->get_where($school_strand_id);
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

function _update($school_strand_id, $data)
{
    if (!is_numeric($school_strand_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $this->mdl_school_strands->_update($school_strand_id, $data);
}

function _delete($school_strand_id)
{
    if (!is_numeric($school_strand_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_strands');
    $this->mdl_school_strands->_delete($school_strand_id);
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