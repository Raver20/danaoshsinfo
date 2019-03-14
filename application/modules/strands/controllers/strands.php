<?php
class Strands extends MX_Controller 
{

function __construct() {
parent::__construct();


}

function _draw_top_naw()
{
    $mysql_query = "select * from strands where strand_id=0 order by strand_id";
    $query = $this->_custom_query($mysql_query);

    foreach ($query->result() as $row) {
       $strands[$row->strand_id] = $row->strand_name;
   }
   $data['strand_name'] = $strand_name;
   $this->load->view('top_nav', $data);
}

function _get_facility_id_from_strand_url($strand_url)
{
    $query = $this->get_where_custom('strand_url', $strand_url);
    foreach ($query->result() as $row) {
        $strand_id = $row->strand_id;
    }
    if (!isset($strand_id))
    {
        $strand_id = 0;
    }

    return $strand_id;
}

function view($update_id)
{
    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    //fetch the facility details

    $data = $this->fetch_data_from_db($update_id);

    $data['query'] = $this->get('strand_name');
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('strand');
    $data['view_module'] = "Strands";
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data); 
}

function _get_strand_id_from_strand_url($strand_url)
{
    $query = $this->get_where_custom('strand_url', $strand_url);
    foreach ($query->result() as $row) {
        $strand_id = $row->strand_id;
    }

    if (!isset($strand_id))
    {
        $strand_id = 0;
    }
    return $strand_id;
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

    $big_pic_path = './strand_p/big_pic/'.$big_pic;
    $small_pic_path = './strand_p/small_pic/'.$small_pic;  
    
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
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel")
    {
        redirect('Strands/create/'.$update_id);
    }
    elseif ($submit=="Yes - Delete Strand")
    {   
        
        $this->_process_delete($update_id);
        $flash_msg = "The strand was successfully deleted";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('strand', $value);
        redirect('Strands/manage');
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
    $this->site_security->_make_sure_is_admin();


    $data['headline'] = "Delete Strand";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('strand');
    $data['view_file'] = "deleteconf";
    $this->load->module('templates');
    $this->templates->admin($data); 
}

function delete_image($update_id) 
{
    if (!is_numeric($update_id))
    {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);
    $big_pic = $data['big_pic'];
    $small_pic = $data['small_pic'];

    $big_pic_path = './strand_p/big_pic/'.$big_pic;
    $small_pic_path = './strand_p/small_pic/'.$small_pic;   


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
    redirect('Strands/create/'.$update_id);

}

function _generate_thumbnail($file_name) 
{
    $config['image_library']    = 'gd2';
    $config['source_image']     = './strand_p/big_pic/'.$file_name;
    $config['new_image']        = './strand_p/small_pic/'.$file_name;
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
    $this->site_security->_make_sure_is_admin();


    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel")
    {
        redirect('Strands/create/'.$update_id);
    }

    $config['upload_path']      ='./strand_p/big_pic';
    $config['allowed_types']    ='jpg|png';
    $config['max_size']         = 100;
    $config['max_width']        = 512;
    $config['max_height']       = 512;

    $this->load->library('upload', $config);


    if (!$this->upload->do_upload('userfile'))
    {
        $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red; text-align: center;'>", "</p>"));
        
        $data['headline'] = "Upload Error";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('strand');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data); 
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
        $data['flash'] = $this->session->flashdata('strand');
        $data['view_file'] = "upload_success";
        $this->load->module('templates');
        $this->templates->admin($data); ;

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
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $data['headline'] = "Upload Image";
    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('strand');
    $data['view_file'] = "upload_image";
    $this->load->module('templates');
    $this->templates->admin($data);
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
        redirect('Strands/manage');
    }

    if ($submit=="Submit")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('strand_name', "Strand Name" , 'required|trim');
        $this->form_validation->set_rules('description', "Description" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            $data['strand_url'] = url_title($data['strand_name']);
            

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The strand details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('strand', $value);
                redirect('Strands/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new strand were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('strand', $value);
                redirect('Strands/create/'.$update_id);
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
        $data['headline'] = "Add New Strand";
    }
    else
    {
        $data['headline'] = "Update Strand Details";   
    } 
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('strand');
    $data['view_module'] = "Strands";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}


function manage()
{   

    

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['query'] = $this->get('strand_name');
    $data['view_module'] = "Strands";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

  
}

function fetch_data_from_post()
{
    $admin_id = ($this->session->userdata['admin']['userid']);
    $data['admin_id'] = $admin_id;
    $data['description'] = $this->input->post('description', TRUE);
    $data['strand_name'] = $this->input->post('strand_name', TRUE);
    $data['rcic'] = $this->input->post('rcic', TRUE);
    $data['strand_url'] = $this->input->post('strand_url', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) 
    {
        $data['admin_id'] = $row->admin_id;
        $data['strand_id'] = $row->strand_id;
        $data['description'] = $row->description;
        $data['strand_name'] = $row->strand_name;
        $data['rcic'] = $row->rcic;
        $data['strand_url'] = $row->strand_url;
        $data['big_pic'] = $row->big_pic;
        $data['small_pic'] = $row->small_pic;
        

    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}

function autogen() 
{
    $mysql_query = "show columns from school_facilites";
    $query = $this->_custom_query($mysql_query);
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
    $this->load->model('mdl_Strands');
    $query = $this->mdl_Strands->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_Strands');
    $query = $this->mdl_Strands->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($strand_id)
{
    if (!is_numeric($strand_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_Strands');
    $query = $this->mdl_Strands->get_where($strand_id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_Strands');
    $query = $this->mdl_Strands->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_Strands');
    $this->mdl_Strands->_insert($data);
}

function _update($strand_id, $data)
{
    if (!is_numeric($strand_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_Strands');
    $this->mdl_Strands->_update($strand_id, $data);
}

function _delete($strand_id)
{
    if (!is_numeric($strand_id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_Strands');
    $this->mdl_Strands->_delete($strand_id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_Strands');
    $count = $this->mdl_Strands->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_Strands');
    $max_id = $this->mdl_Strands->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_Strands');
    $query = $this->mdl_Strands->_custom_query($mysql_query);
    return $query;
}

}