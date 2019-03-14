<?php
class Pages extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function strand()
{
    //figure out what the strand id is
    $strand_url = $this->uri->segment(3);
    $this->load->module('strands');
    $strand_id = $this->strands->_get_strand_id_from_strand_url($strand_url);
    $this->strands->view($strand_id);

}
function faq()
{
    //figure out what the faq id is
    $faq_title = $this->uri->segment(3);
    $this->load->module('faqs');
    $faq_id = $this->faqs->_get_faq_id($faq_title);
    $this->faqs->view($faq_id);
}

function facility()
{
    //figure out what the faq id is
    $facility_url = $this->uri->segment(3);
    $this->load->module('school_facilities');
    $facility_id = $this->school_facilities->_get_facility_id_from_facility_url($facility_url);
    $this->school_facilities->view($facility_id);

}
function requirement()
{
    //figure out what the faq id is
    $requirement_name = $this->uri->segment(3);
    $this->load->module('requirements');
    $requirement_id = $this->requirements->_get_requirement_id_from_requirement_name($requirement_name);
    $this->requirements->view($requirement_id);

}

}
