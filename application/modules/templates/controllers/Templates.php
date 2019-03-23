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
    $this->load->module('strands');
    $this->load->module('faqs');
    $this->load->module('school_info');

    $data['info_query'] = $this->school_info->get('schoolname');
    $data['strands_query'] = $this->strands->get('strand_name');
    $data['faqs_query'] = $this->faqs->get('faq_title');
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

}