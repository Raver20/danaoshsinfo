<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_rating extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "rating";
    return $table;
}

function get_by_school_id($school_id){
    $table = $this->get_table();
    $this->db->where('school_id', $school_id);
    $query=$this->db->get($table);
    return $query;
}

function get($order_by){
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
}

function get_where($rate_id){
    $table = $this->get_table();
    $this->db->where('rate_id', $rate_id);
    $query=$this->db->get($table);
    return $query;
}

function get_where_custom($col, $value) {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $query=$this->db->get($table);
    return $query;
}

function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}

function _update($rate_id, $data){
    $table = $this->get_table();
    $this->db->where('rate_id', $rate_id);
    $this->db->update($table, $data);
}

function _delete($rate_id){
    $table = $this->get_table();
    $this->db->where('rate_id', $rate_id);
    $this->db->delete($table);
}

function count_where($column, $value) {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
}

function count_all() {
    $table = $this->get_table();
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
}

function get_max() {
    $table = $this->get_table();
    $this->db->select_max('rate_id');
    $query = $this->db->get($table);
    $row=$query->row();
    $rate_id=$row->rate_id;
    return $rate_id;
}

function _custom_query($mysql_query) {
    $query = $this->db->query($mysql_query);
    return $query;
}

}