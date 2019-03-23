<?php
class Rating extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function fetch_data_from_post()
{
    $admin_id = ($this->session->userdata['admin']['userid']);
    $data['admin_id'] = $admin_id;
    $data['rating'] = $this->input->post('rating', TRUE);
    $data['writereview'] = $this->input->post('writereview', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) 
    {
        $data['school_id'] = $row->school_id;
        $data['rate_id'] = $row->description;
        $data['rate'] = $row->rate;
        $data['review'] = $row->review;
        $data['email'] = $row->email;
    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}


function get($order_by)
{
    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_rating');
    $this->mdl_rating->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $this->mdl_rating->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $this->mdl_rating->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_rating');
    $count = $this->mdl_rating->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_rating');
    $max_id = $this->mdl_rating->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->_custom_query($mysql_query);
    return $query;
}

}