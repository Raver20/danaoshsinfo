<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_school_strands extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "school_strands";
    return $table;
}

function get_by_school_id($school_id){
    $table = $this->get_table();
    $q = $this->db->select('*')->from($table)->where('school_id', $school_id)->get();
    return $q;
}

function get_by_id($school_strand_id){
    $table = $this->get_table();
    $q = $this->db->select('*')->from($table)->where('school_strand_id', $school_strand_id)->get();
    return $q;
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

function get_where($school_strand_id){
    $table = $this->get_table();
    $this->db->where('school_strand_id', $school_strand_id);
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

function _update($school_strand_id, $data){
    $table = $this->get_table();
    $this->db->where('school_strand_id', $school_strand_id);
    $this->db->update($table, $data);
}

function _delete($school_strand_id){
    $table = $this->get_table();
    $this->db->where('school_strand_id', $school_strand_id);
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
    $this->db->select_max('school_strand_id');
    $query = $this->db->get($table);
    $row=$query->row();
    $school_strand_id=$row->school_strand_id;
    return $school_strand_id;
}

function _custom_query($mysql_query) {
    $query = $this->db->query($mysql_query);
    return $query;
}

}