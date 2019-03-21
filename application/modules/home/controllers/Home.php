<?php
class Home extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index()
{   
    $this->load->module('strands');
    $data['strand_query'] = $this->strands->get('strand_name');

    $data['view_module'] = "home";
    $data['view_file'] = "homepage";    
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

function get($order_by)
{
    $this->load->model('mdl_home');
    $query = $this->mdl_home->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_home');
    $query = $this->mdl_home->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_home');
    $query = $this->mdl_home->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_home');
    $query = $this->mdl_home->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_home');
    $this->mdl_home->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_home');
    $this->mdl_home->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_home');
    $this->mdl_home->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_home');
    $count = $this->mdl_home->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_home');
    $max_id = $this->mdl_home->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_home');
    $query = $this->mdl_home->_custom_query($mysql_query);
    return $query;
}

}