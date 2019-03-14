<?php
class Faqs extends MX_Controller 
{

function __construct() {
parent::__construct();

}


function view($update_id)
{
    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    //fetch the facility details
    $this->load->module('Strands');
    $data = $this->fetch_data_from_db($update_id);

    $data['faq_query'] = $this->get('faq_title');
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('faqs');
    $data['view_module'] = "Faqs";
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data); 
}

function _get_faq_id($faq_title)
{
    $faq_query = $this->get_where_custom('faq_title', $faq_title);
    foreach ($faq_query->result() as $row) {
        $faq_id = $row->faq_id;
    }

    if (!isset($faq_id))
    {
        $faq_id = 0;
    }
    return $faq_id;
}

function create()
{   

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel")
    {
        redirect('faqs/manage');
    }

    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('faq_title', "FAQ Title" , 'required|trim');
        $this->form_validation->set_rules('faq_ans', "Answer" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            
            

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The faq details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('faqs', $value);
                redirect('faqs/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new faq were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('faqs', $value);
                redirect('faqs/create/'.$update_id);
            }
        }
        else
        {

        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit"))
    {
        $data = $this->fetch_data_from_db($update_id);
    }
    else
    {
        $data = $this->fetch_data_from_post();
    
    }

    if (!is_numeric($update_id))
    {
        $data['headline'] = "Add FAQ";
    }
    else
    {
        $data['headline'] = "Update FAQ Details";   
    } 
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('faqs');
    $data['view_module'] = "Faqs";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}


function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['faq_query'] = $this->get('faq_title');
    $data['view_module'] = "Faqs";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);


    
}

function fetch_data_from_post()
{
    $admin_id = ($this->session->userdata['admin']['userid']);
    $data['admin_id'] = $admin_id;
    $data['faq_ans'] = $this->input->post('faq_ans', TRUE);
    $data['faq_title'] = $this->input->post('faq_title', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $faq_query = $this->get_where($update_id);
    foreach ($faq_query->result() as $row) 
    {
        $data['admin_id'] = $row->admin_id;
        $data['faq_id'] = $row->faq_id;
        $data['faq_ans'] = $row->faq_ans;
        $data['faq_title'] = $row->faq_title;
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}

function autogen() 
{
    $mysql_faq_query = "show columns from faqs";
    $faq_query = $this->_custom_faq_query($mysql_faq_query);
    foreach ($faq_query->result() as $row) 
    {
        $column_name = $row->Field;
        if ($column_name!="id")
        {
        echo '$data[\''.$column_name.'\'] = $this->input->post(\''.$column_name.'\', TRUE);<br>';
      
        }
    }

    echo "<hr/>" ;
    foreach ($faq_query->result() as $row) 
    {
        $column_name = $row->Field;
        if ($column_name!="id")
        {
        echo '$data[\''.$column_name.'\'] = $row->'.$column_name.';<br>';
        
        }
    }
   
    
    
}
function get($order_by)
{
    $this->load->model('mdl_faqs');
    $faq_query = $this->mdl_faqs->get($order_by);
    return $faq_query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_faqs');
    $faq_query = $this->mdl_faqs->get_with_limit($limit, $offset, $order_by);
    return $faq_query;
}

function get_where($faq_id)
{
    if (!is_numeric($faq_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_faqs');
    $faq_query = $this->mdl_faqs->get_where($faq_id);
    return $faq_query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_faqs');
    $faq_query = $this->mdl_faqs->get_where_custom($col, $value);
    return $faq_query;
}

function _insert($data)
{
    $this->load->model('mdl_faqs');
    $this->mdl_faqs->_insert($data);
}

function _update($faq_id, $data)
{
    if (!is_numeric($faq_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_faqs');
    $this->mdl_faqs->_update($faq_id, $data);
}

function _delete($faq_id)
{
    if (!is_numeric($faq_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_faqs');
    $this->mdl_faqs->_delete($faq_id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_faqs');
    $count = $this->mdl_faqs->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_faqs');
    $max_id = $this->mdl_faqs->get_max();
    return $max_id;
}

function _custom_faq_query($mysql_faq_query) 
{
    $this->load->model('mdl_faqs');
    $faq_query = $this->mdl_faqs->_custom_faq_query($mysql_faq_query);
    return $faq_query;
}

}