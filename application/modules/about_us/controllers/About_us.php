<?php
class About_us extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index()
{
    $this->load->library('email');
    $this->email->from('email@example.com', 'Identification');
    $this->email->to('emailto@example.com');
    $this->email->subject('Send Email Codeigniter');
    $this->email->message('The email send using codeigniter library');

    $this->email->send();

    $data['view_module'] = "about_us";
    $data['view_file'] = "about_us";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

function get($order_by)
{
    $this->load->model('mdl_about_us');
    $query = $this->mdl_about_us->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_about_us');
    $query = $this->mdl_about_us->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_about_us');
    $query = $this->mdl_about_us->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_about_us');
    $query = $this->mdl_about_us->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_about_us');
    $this->mdl_about_us->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_about_us');
    $this->mdl_about_us->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_about_us');
    $this->mdl_about_us->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_about_us');
    $count = $this->mdl_about_us->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_about_us');
    $max_id = $this->mdl_about_us->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_about_us');
    $query = $this->mdl_about_us->_custom_query($mysql_query);
    return $query;
}

}