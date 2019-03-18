<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_school_info extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "school_info";
    return $table;
}

function get($order_by){
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $info_query=$this->db->get($table);
    return $info_query;
}

function get_with_limit($limit, $offset, $order_by) {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $info_query=$this->db->get($table);
    return $info_query;
}

function get_where($school_id){
    $table = $this->get_table();
    $this->db->where('school_id', $school_id);
    $info_query=$this->db->get($table);
    return $info_query;
}

function get_where_custom($col, $value) {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $info_query=$this->db->get($table);
    return $info_query;
}

function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}

function _update($school_id, $data){
    $table = $this->get_table();
    $this->db->where('school_id', $school_id);
    $this->db->update($table, $data);
}

function _delete($school_id){
    $table = $this->get_table();
    $this->db->where('school_id', $school_id);
    $this->db->delete($table);
}

function count_where($column, $value) {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $info_query=$this->db->get($table);
    $num_rows = $info_query->num_rows();
    return $num_rows;
}

function count_all() {
    $table = $this->get_table();
    $info_query=$this->db->get($table);
    $num_rows = $info_query->num_rows();
    return $num_rows;
}

function get_max() {
    $table = $this->get_table();
    $this->db->select_max('school_id');
    $info_query = $this->db->get($table);
    $row=$info_query->row();
    $school_id=$row->school_id;
    return $school_id;
}

function _custom_info_query($mysql_info_query) {
    $info_query = $this->db->query($mysql_info_query);
    return $info_query;
}

}