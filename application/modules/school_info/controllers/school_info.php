<?php
class School_info extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function profile()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $data['query'] = $this->get('school_id');
    $data['view_module'] = "School_info";
    $data['view_file'] = "profile";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

function get($order_by)
{
    $this->load->model('Mdl_school_info');
    $query = $this->Mdl_school_info->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $query = $this->Mdl_school_info->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($school_id)
{
    if (!is_numeric($school_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $query = $this->Mdl_school_info->get_where($school_id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_school_info');
    $query = $this->Mdl_school_info->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_school_info');
    $this->Mdl_school_info->_insert($data);
}

function _update($school_id, $data)
{
    if (!is_numeric($school_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $this->Mdl_school_info->_update($school_id, $data);
}

function _delete($school_id)
{
    if (!is_numeric($school_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $this->Mdl_school_info->_delete($school_id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_school_info');
    $count = $this->Mdl_school_info->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_school_info');
    $max_id = $this->Mdl_school_info->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_school_info');
    $query = $this->Mdl_school_info->_custom_query($mysql_query);
    return $query;
}

}