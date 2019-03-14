<?php
class School_facilities extends MX_Controller 
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

    $data = $this->fetch_data_from_db($update_id);

    $data['facility_query'] = $this->get('school_id');
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('facility');
    $data['view_module'] = "School_facilities";
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data); 
}

function _get_facility_id_from_facility_url($facility_url)
{
    $facility_query = $this->get_where_custom('facility_url', $facility_url);
    foreach ($facility_query->result() as $row) {
        $facility_id = $row->facility_id;
    }

    if (!isset($facility_id))
    {
        $facility_id = 0;
    }
    return $facility_id;
}

function _process_delete($update_id)
{
    //attempt to delete the facility options
    //$this->load->module('module name');
    //$this->module name->_delete_for_item($update_id);

    //attempt to delete the facility big pic
    //attempt to delete the facility small pic
    $data = $this->fetch_data_from_db($update_id);
    $big_pic = $data['big_pic'];
    $small_pic = $data['small_pic'];

    $big_pic_path = './facility_pic/big_pic/'.$big_pic;
    $small_pic_path = './facility_pic/small_pic/'.$small_pic;  
    
    if (file_exists($big_pic_path))
    {
        unlink($big_pic_path);
    }
    if (file_exists($small_pic_path))
    {
        unlink($small_pic_path);
    }
    $this->_delete($update_id);

    //delete the faciitiy record from store_items


}
function delete($update_id)
{
    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel")
    {
        redirect('school_facilities/create/'.$update_id);
    }
    elseif ($submit=="Yes - Delete Facility")
    {   
        
        $this->_process_delete($update_id);
        $flash_msg = "The strand was successfully deleted";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('strand', $value);
        redirect('school_facilities/manage');
    }


   
}

function deleteconf($update_id)
{

    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();


    $data['headline'] = "Delete Strand";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('facility');
    $data['view_file'] = "deleteconf";
    $this->load->module('templates');
    $this->templates->schooladmin($data); 
}

function delete_image($update_id) 
{
    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $data = $this->fetch_data_from_db($update_id);
    $big_pic = $data['big_pic'];
    $small_pic = $data['small_pic'];

    $big_pic_path = './facility_pic/big_pic/'.$big_pic;
    $small_pic_path = './facility_pic/small_pic/'.$small_pic;   


    //attempt to remove the images
    if (file_exists($big_pic_path))
    {
        unlink($big_pic_path);
    }
    if (file_exists($small_pic_path))
    {
        unlink($small_pic_path);
    }

    //update the database
    unset($data);
    $data['big_pic'] = "";
    $data['small_pic'] = "";
    $this->_update($update_id, $data);

    $flash_msg = "The facility image was successfully deleted";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('facility', $value);
    redirect('school_facilities/create/'.$update_id);

}

function _generate_thumbnail($file_name) 
{
    $config['image_library']    = 'gd2';
    $config['source_image']     = './facility_pic/big_pic/'.$file_name;
    $config['new_image']        = './facility_pic/small_pic/'.$file_name;
    $config['maintain_ratio']   =  TRUE;
    $config['width']            =  200;
    $config['height']           =  200;

    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
}


function do_upload($update_id)
{
    if (!is_numeric($update_id)) 
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();


    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel")
    {
        redirect('school_facilities/create/'.$update_id);
    }

    $config['upload_path']      ='./facility_pic/big_pic';
    $config['allowed_types']    ='jpg|png';
    $config['max_size']         = 1000;
    $config['max_width']        = 1366;
    $config['max_height']       = 768;

    $this->load->library('upload', $config);


    if (!$this->upload->do_upload('userfile'))
    {
        $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red; text-align: center;'>", "</p>"));
        
        $data['headline'] = "Upload Error";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('facility');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->schooladmin($data); 
    }
    else 
    {   
        //upload was successful
        $data = array('upload_data' => $this->upload->data());
        $upload_data = $data['upload_data'];
        $file_name = $upload_data['file_name'];
        $this->_generate_thumbnail($file_name);

        //update the database
        $update_data['big_pic'] = $file_name;
        $update_data['small_pic'] = $file_name;
        $this->_update($update_id, $update_data);
        $data['headline'] = "Upload Success";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('facility');
        $data['view_file'] = "upload_success";
        $this->load->module('templates');
        $this->templates->schooladmin($data); ;

    }
}

function upload_image($update_id)
{   

    if (!is_numeric($update_id)) 
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $update_id = $this->uri->segment(3);
    $data['headline'] = "Upload Image";
    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('facility');
    $data['view_file'] = "upload_image";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}

function create()
{   

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel")
    {
        redirect('school_facilities/manage');
    }

    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('facility_name', "Facility Name" , 'required|trim');
        $this->form_validation->set_rules('description', "Description" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            $data['facility_url'] = url_title($data['facility_name']);
            

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The facility details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('facility', $value);
                redirect('school_facilities/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new facility were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('facility', $value);
                redirect('school_facilities/create/'.$update_id);
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
        $data['big_pic'] = "";
    }

    if (!is_numeric($update_id))
    {
        $data['headline'] = "Add New Facility";
    }
    else
    {
        $data['headline'] = "Update Facility Details";   
    } 
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('facility');
    $data['view_module'] = "School_facilities";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}


function manage() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();
    

    $school_id = ($this->session->userdata['schooladmin']['school_id']);
   
    $data['flash'] = $this->session->flashdata('facility');
    $data['facility_query'] = $this->get($school_id);
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->schooladmin($data); 
}


function fetch_data_from_post()
{
    $school_id = ($this->session->userdata['schooladmin']['school_id']);
    $data['school_id'] = $school_id;
    $data['facility_name'] = $this->input->post('facility_name', TRUE);
    $data['facility_url'] = $this->input->post('facility_url', TRUE);
    $data['description'] = $this->input->post('description', TRUE);
    
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $facility_query = $this->get_where($update_id);
    foreach ($facility_query->result() as $row) 
    {
        $data['school_id'] = $row->school_id;
        $data['facility_id'] = $row->facility_id;
        $data['facility_name'] = $row->facility_name;
        $data['facility_url'] = $row->facility_url;
        $data['description'] = $row->description;
        $data['big_pic'] = $row->big_pic;
        $data['small_pic'] = $row->small_pic;
        
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}


function get($order_by)
{
    $this->load->model('mdl_school_facilities');
    $facility_query = $this->mdl_school_facilities->get($order_by);
    return $facility_query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_facilities');
    $facility_query = $this->mdl_school_facilities->get_with_limit($limit, $offset, $order_by);
    return $facility_query;
}

function get_where($facility_id)
{
    if (!is_numeric($facility_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_facilities');
    $facility_query = $this->mdl_school_facilities->get_where($facility_id);
    return $facility_query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_school_facilities');
    $facility_query = $this->mdl_school_facilities->get_where_custom($col, $value);
    return $facility_query;
}

function _insert($data)
{
    $this->load->model('mdl_school_facilities');
    $this->mdl_school_facilities->_insert($data);
}

function _update($facility_id, $data)
{
    if (!is_numeric($facility_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_facilities');
    $this->mdl_school_facilities->_update($facility_id, $data);
}

function _delete($facility_id)
{
    if (!is_numeric($facility_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_school_facilities');
    $this->mdl_school_facilities->_delete($facility_id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_school_facilities');
    $count = $this->mdl_school_facilities->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_school_facilities');
    $max_id = $this->mdl_school_facilities->get_max();
    return $max_id;
}

function _custom_facility_query($mysql_facility_query) 
{
    $this->load->model('mdl_school_facilities');
    $facility_query = $this->mdl_school_facilities->_custom_facility_query($mysql_facility_query);
    return $facility_query;
}

}