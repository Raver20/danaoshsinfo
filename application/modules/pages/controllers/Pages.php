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


}
