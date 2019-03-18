<?php
class Schools extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function search()
{
    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Submit")
    {
        $typeofschool = $this->input->post('typeofschool', TRUE);
        $search = $this->input->post('search', TRUE);
        redirect('schools?type='.$typeofschool."&search=".$search);
    }
}

function index()
{
    $this->load->module('school_info');
    
    $typeofschool = $this->input->get('type', TRUE);
    $schoolname = $this->input->get('search', TRUE);
    
    $data['page_query'] = $this->get_school_search('schoolname', $schoolname, $typeofschool);
    $data['view_module'] = "schools";
    $data['view_file'] = "schools";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

function get_like_custom($col, $value)
{
    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->get_like_custom($col, $value);
    return $query;
}

function get_school_search($order_by_key,$schoolname, $typeofschool)
{
    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->get_school_search($order_by_key,$schoolname, $typeofschool);
    return $query;
}

function get($order_by)
{
    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_school_page');
    $this->mdl_school_page->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_page');
    $this->mdl_school_page->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_page');
    $this->mdl_school_page->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_school_page');
    $count = $this->mdl_school_page->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_school_page');
    $max_id = $this->mdl_school_page->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_school_page');
    $query = $this->mdl_school_page->_custom_query($mysql_query);
    return $query;
}

}