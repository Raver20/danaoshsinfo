<?php
class Home extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index()
{   
    $this->load->module('strands');
    $this->load->module('rating');
    $data['strand_query'] = $this->strands->get('strand_name');

    $mysql_rating_query = "select school_id, SUM(rate) AS review FROM rating GROUP BY school_id ORDER By review DESC LIMIT 3";
    $school_requirements = $this->rating->_custom_query($mysql_rating_query);
    $requirement_results = array();
    foreach ($school_requirements->result() as $row) {
    //    echo "aaa";
    //    echo $row->school_id; 
        $mysql_schoolinfo_query = "select * from school_info where school_id=".$row->school_id;
        $school_infos = $this->rating->_custom_query($mysql_schoolinfo_query);
        foreach ($school_infos->result() as $srow) {
            // echo 'uiii';
            // echo $srow->schoolname;
            // echo $row->school_name_url;
            array_push($requirement_results,$srow);
        }
    }
    // print_r($requirement_results);
    // die;
    $data['most_rated'] = $requirement_results;
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