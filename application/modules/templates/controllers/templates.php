<?php
class Templates extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function public_bootstrap($data) {
    if (!isset($data['view_module'])) {
        $data['view_module'] = $this->uri->segment(1);
    }
    $data['strands_query'] = $this->get('strand_name');
    $data['faqs_query'] = $this->getfaq('faq_title');
    $this->load->view('public_bootstrap', $data);
}
function public_jqm($data) {
    if (!isset($data['view_module'])) {
        $data['view_module'] = $this->uri->segment(1);
    }
    $this->load->view('public_jqm', $data);
}
function admin($data) {
    if (!isset($data['view_module'])) {
        $data['view_module'] = $this->uri->segment(1);
    }
    $this->load->view('admin', $data);
}
function schooladmin($data) {
    if (!isset($data['view_module'])) {
        $data['view_module'] = $this->uri->segment(1);
    }
    $this->load->view('schooladmin', $data);
}
function login($data) {
    if (!isset($data['view_module'])) {
        $data['view_module'] = $this->uri->segment(1);
    }
    $this->load->view('login', $data);
}
function register($data) {
    if (!isset($data['view_module'])) {
        $data['view_module'] = $this->uri->segment(1);
    }
    $this->load->view('register', $data);
}
function get($order_by)
{
    $this->load->model('strands');
    $query = $this->strands->get($order_by);
    return $query;
}
function getfaq($order_by)
{
    $this->load->model('faqs');
    $query = $this->faqs->get($order_by);
    return $query;
}
}