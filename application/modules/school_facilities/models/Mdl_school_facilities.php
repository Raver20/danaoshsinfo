<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_school_facilities extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "school_facilites";
    return $table;
}

function get_by_id($school_id){
    $table = $this->get_table();
    $q = $this->db->select('*')->from($table)->where('school_id', $school_id)->get();
    return $q;
}





function get($order_by){
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $facility_query=$this->db->get($table);
    return $facility_query;
}

function get_with_limit($limit, $offset, $order_by) {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $facility_query=$this->db->get($table);
    return $facility_query;
}

function get_where($facility_id){
    $table = $this->get_table();
    $this->db->where('facility_id', $facility_id);
    $facility_query=$this->db->get($table);
    return $facility_query;
}

function get_where_custom($col, $value) {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $facility_query=$this->db->get($table);
    return $facility_query;
}

function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}

function _update($facility_id, $data){
    $table = $this->get_table();
    $this->db->where('facility_id', $facility_id);
    $this->db->update($table, $data);
}

function _delete($facility_id){
    $table = $this->get_table();
    $this->db->where('facility_id', $facility_id);
    $this->db->delete($table);
}

function count_where($column, $value) {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $facility_query=$this->db->get($table);
    $num_rows = $facility_query->num_rows();
    return $num_rows;
}

function count_all() {
    $table = $this->get_table();
    $facility_query=$this->db->get($table);
    $num_rows = $facility_query->num_rows();
    return $num_rows;
}

function get_max() {
    $table = $this->get_table();
    $this->db->select_max('facility_id');
    $facility_query = $this->db->get($table);
    $row=$facility_query->row();
    $facility_id=$row->facility_id;
    return $facility_id;
}

function _custom_facility_query($mysql_facility_query) {
    $facility_query = $this->db->facility_query($mysql_facility_query);
    return $facility_query;
}

}