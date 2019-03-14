<?php
class Site_security extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _make_sure_is_admin()
{
    if (isset($this->session->userdata['admin'])) 
    {
        $userid = ($this->session->userdata['admin']['userid']);
        $username = ($this->session->userdata['admin']['username']);
    } 
    else 
    {
        redirect('admin/login');
    }

}

function _make_sure_is_school_admin()
{
    if (isset($this->session->userdata['schooladmin'])) 
    {
        $userid = ($this->session->userdata['schooladmin']['school_id']);
        $username = ($this->session->userdata['schooladmin']['username']);
    } 
    else
    {
        redirect('school_admin/login');
    }
}

function not_allowed()
{
    echo "You are not allowed to be here.";
}

}