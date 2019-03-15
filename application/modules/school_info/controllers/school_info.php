<?php
class School_info extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function profile()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $data['query'] = $this->get('school_id');

    $this->load->module('requirements');
    $data['query_requirements'] = $this->requirements->get('school_id');

    $data['view_module'] = "School_info";
    $data['view_file'] = "profile";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}



function dashboard()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $data['schoolname'] = $this->session->userdata['schooladmin']['schoolname'];
    $data['view_module'] = "School_info";
    $data['view_file'] = "dashboard";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
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
        redirect('school_info/manage');
    }

    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('schoolname', "School Name" , 'required|trim');
        $this->form_validation->set_rules('user', "User" , 'required|trim');
        $this->form_validation->set_rules('password', "Password" , 'required|trim');
        $this->form_validation->set_rules('user', "User" , 'required|trim');
        $this->form_validation->set_rules('status', "Status" , 'required|trim');
        $this->form_validation->set_rules('address', "Address" , 'required|trim');
        $this->form_validation->set_rules('telno', "Telephone Number" , 'required|trim');
        $this->form_validation->set_rules('emailaddress', "Email Address" , 'required|trim');
        $this->form_validation->set_rules('typeofschool', "Type of School" , 'required|trim');
        $this->form_validation->set_rules('contactperson', "Contact Person" , 'required|trim');
        $this->form_validation->set_rules('principal', "Principal" , 'required|trim');
       // $this->form_validation->set_rules('latitude', "User" , 'required|trim');
       // $this->form_validation->set_rules('laongitude', "User" , 'required|trim');
        $this->form_validation->set_rules('calendar', "Calendar" , 'required|trim');
        $this->form_validation->set_rules('avetuition', "Average Tuition" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            
            

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The school info details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('school_info', $value);
                redirect('school_info/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new school info were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('school_info', $value);
                redirect('school_info/create/'.$update_id);
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
        $data['headline'] = "Add School Info";
    }
    else
    {
        $data['headline'] = "Update School Info Details";   
    } 
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('school_info');
    $data['view_module'] = "School_info";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}
function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['info_query'] = $this->get('schoolname');
    $data['view_module'] = "School_info";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);    
}

function fetch_data_from_post()
{
    $admin_id = ($this->session->userdata['admin']['userid']);
    $data['admin_id'] = $admin_id;
    $data['info_ans'] = $this->input->post('info_ans', TRUE);
    $data['info_title'] = $this->input->post('info_title', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $info_query = $this->get_where($update_id);
    foreach ($info_query->result() as $row) 
    {
        $data['admin_id'] = $row->admin_id;
        $data['info_id'] = $row->info_id;
        $data['info_ans'] = $row->info_ans;
        $data['info_title'] = $row->info_title;
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}
function autogen() 
{
    $mysql_info_query = "show columns from school_info";
    $query = $this->_custom_info_query($mysql_info_query);
    foreach ($query->result() as $row) 
    {
        $column_name = $row->Field;
        if ($column_name!="id")
        {
        echo '$data[\''.$column_name.'\'] = $this->input->post(\''.$column_name.'\', TRUE);<br>';
      
        }
    }

    echo "<hr/>" ;
    foreach ($query->result() as $row) 
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
    $this->load->model('Mdl_school_info');
    $info_query = $this->Mdl_school_info->get($order_by);
    return $info_query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $info_query = $this->Mdl_school_info->get_with_limit($limit, $offset, $order_by);
    return $info_query;
}

function get_where($schoolname)
{
    if (!is_numeric($schoolname)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $info_query = $this->Mdl_school_info->get_where($schoolname);
    return $info_query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_school_info');
    $info_query = $this->Mdl_school_info->get_where_custom($col, $value);
    return $info_query;
}

function _insert($data)
{
    $this->load->model('Mdl_school_info');
    $this->Mdl_school_info->_insert($data);
}

function _update($school_id, $data)
{
    if (!is_numeric($school_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $this->Mdl_school_info->_update($school_id, $data);
}

function _delete($school_id)
{
    if (!is_numeric($school_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_school_info');
    $this->Mdl_school_info->_delete($school_id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_school_info');
    $count = $this->Mdl_school_info->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_school_info');
    $max_id = $this->Mdl_school_info->get_max();
    return $max_id;
}

function _custom_info_query($mysql_info_query) 
{
    $this->load->model('Mdl_school_info');
    $info_query = $this->Mdl_school_info->_custom_info_query($mysql_info_query);
    return $info_query;
}

}