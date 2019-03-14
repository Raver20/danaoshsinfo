<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_faqs extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "faq";
    return $table;
}

function get($order_by){
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $faq_query=$this->db->get($table);
    return $faq_query;
}

function get_with_limit($limit, $offset, $order_by) {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $faq_query=$this->db->get($table);
    return $faq_query;
}

function get_where($faq_id){
    $table = $this->get_table();
    $this->db->where('faq_id', $faq_id);
    $faq_query=$this->db->get($table);
    return $faq_query;
}

function get_where_custom($col, $value) {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $faq_query=$this->db->get($table);
    return $faq_query;
}

function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}

function _update($faq_id, $data){
    $table = $this->get_table();
    $this->db->where('faq_id', $faq_id);
    $this->db->update($table, $data);
}

function _delete($faq_id){
    $table = $this->get_table();
    $this->db->where('faq_id', $faq_id);
    $this->db->delete($table);
}

function count_where($column, $value) {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $faq_query=$this->db->get($table);
    $num_rows = $faq_query->num_rows();
    return $num_rows;
}

function count_all() {
    $table = $this->get_table();
    $faq_query=$this->db->get($table);
    $num_rows = $faq_query->num_rows();
    return $num_rows;
}

function get_max() {
    $table = $this->get_table();
    $this->db->select_max('faq_id');
    $faq_query = $this->db->get($table);
    $row=$faq_query->row();
    $faq_id=$row->faq_id;
    return $faq_id;
}

function _custom_faq_query($mysql_faq_query) {
    $faq_query = $this->db->faq_query($mysql_faq_query);
    return $faq_query;
}

}