<?php
class Site_setting extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _get_cookie_name()
{
	$cookie_name = 'qwertyu';
	return $cookie_name;
}

function _get_strand_segment()
{
    $segment = "strand/";
    return $segment;
}

}