<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_admin extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "admin";
    return $table;
}


function can_login($user,$password)
{
    $this->db->where('user', $user);
    $this->db->where('password', $password);
    $query = $this->db->get('admin');

    if ($query->num_rows() >0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
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

function get_where($admin_id){
    $table = $this->get_table();
    $this->db->where('admin_id', $admin_id);
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

function _update($admin_id, $data){
    $table = $this->get_table();
    $this->db->where('admin_id', $admin_id);
    $this->db->update($table, $data);
}

function _delete($admin_id){
    $table = $this->get_table();
    $this->db->where('admin_id', $admin_id);
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
    $this->db->select_max('admin_id');
    $query = $this->db->get($table);
    $row=$query->row();
    $admin_id=$row->admin_id;
    return $admin_id;
}

function _custom_query($mysql_query) {
    $query = $this->db->query($mysql_query);
    return $query;
}



}