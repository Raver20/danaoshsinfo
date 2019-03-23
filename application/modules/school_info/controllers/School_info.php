<?php
class School_info extends MX_Controller 
{

function __construct() {
parent::__construct();
}
function sendemail()
{
    $config = Array( 
    'protocol' => 'smtp', 
    'smtp_host' => 'smtp.hostinger.ph', 
    'smtp_port' => 	587, 
    'smtp_user' => 'inquire@danaoshs.ml', 
    'smtp_pass' => 'inquirepassword',
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordmap' => TRUE ); 
  
    $this->load->library('email', $config); 
    $schoolemail = $this->input->post('schoolemail', TRUE);
    $email = $this->input->post('sendemail', TRUE);
    $name = $this->input->post('sendname', TRUE);
    $msg = $this->input->post('comments', TRUE);

    $this->email->set_newline("\r\n");
    $this->email->from('inquire@danaoshs.ml');
    $this->email->to($schoolemail);
    $this->email->reply_to($email); //User email submited in form
    $this->email->subject('Inquiry - from '.$name); 
    $this->email->message($msg);
    if (!$this->email->send()) 
    {
        echo 'Email sending failed!';
    }
    else 
    {
      echo "<p style='color: green;'>Your e-mail has been sent!</p>";
    }
}

function update_pword()
{   

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();
  
    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);
    
    if (!is_numeric($update_id))
    {
        redirect('school_info/update');
    }
    elseif ($submit=="Cancel")
    {
        redirect('school_info/update');
    }

    if ($submit=="Submit")
    {
        //process the form
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', "Password" , 'required|min_length[5|max_length[35]');
        $this->form_validation->set_rules('repeat_password', "Repeat Password" , 'required|matched[password]');


        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data['password'] = $this->input->post('password', TRUE);
            

                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The school account password were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('update_pword', $value);
                redirect('school_info/update_pword/'.$update_id);
   
        }
    }

     $data['headline'] = "Update School Account Password";
   
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('update_pword');
    $data['view_module'] = "school_info";
    $data['view_file'] = "update_pword";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
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

    $big_pic_path = './school_logo/big_pic/'.$big_pic;
    $small_pic_path = './school_logo/small_pic/'.$small_pic;  
    
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
        redirect('school_info/manage/');
    }
    elseif ($submit=="Yes - Delete School")
    {   
        
        $this->_process_delete($update_id);
        $flash_msg = "The school was successfully deleted";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('school_logo', $value);
        redirect('school_info/manage');
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


    $data['headline'] = "Delete School";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('school_logo');
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

    $big_pic_path = './school_logo/big_pic/'.$big_pic;
    $small_pic_path = './school_logo/small_pic/'.$small_pic;   


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
                $this->session->set_flashdata('school_logo', $value);
    redirect('school_info/update/'.$update_id);

}

function _generate_thumbnail($file_name) 
{
    $config['image_library']    = 'gd2';
    $config['source_image']     = './school_logo/big_pic/'.$file_name;
    $config['new_image']        = './school_logo/small_pic/'.$file_name;
    $config['maintain_ratio']   =  TRUE;
    $config['width']            =  100;
    $config['height']           =  100;

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
        redirect('school_info/update/'.$update_id);
    }

    $config['upload_path']      ='./school_logo/big_pic';
    $config['allowed_types']    ='jpg|png';
    $config['max_size']         = 1000;
    $config['max_width']        = 600;
    $config['max_height']       = 600;

    $this->load->library('upload', $config);


    if (!$this->upload->do_upload('userfile'))
    {
        $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red; text-align: center;'>", "</p>"));
        
        $data['headline'] = "Upload Error";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('school_logo');
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
        $data['flash'] = $this->session->flashdata('school_logo');
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
    $data['headline'] = "Upload School Logo";
    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('school_logo');
    $data['view_file'] = "upload_image";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}




function profile()
{
    $this->load->module('school_facilities');
    $this->load->module('requirements');
    $this->load->module('school_privileges');
    $this->load->module('school_strands');
    $this->load->module('strands');
    
    $school_name_url = $this->uri->segment(3);
    $school_id = $this->_get_school_id_from_school_name_url($school_name_url);
    //query
    
    $data = $this->fetch_data_from_db($school_id);
    $data['facility_query'] = $this->school_facilities->get_by_id($school_id);
    $data['requirement_query'] = $this->requirements->get_by_id($school_id);
    $data['privilege_query'] = $this->school_privileges->get_by_id($school_id);
    $school_strands = $this->school_strands->get_by_school_id($school_id);
    $strands_list = array();
    foreach ($school_strands->result() as $row)
    {
       $strands = $this->strands->get_by_id($row->strand_id)->result()[0];
       array_push($strands_list, $strands);
    }
    $data['strands_by_query'] = $strands_list;
    $data['view_module'] = "school_info";
    $data['view_file'] = "profile";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

function _get_school_id_from_school_name_url($school_name_url)
{
    $query = $this->get_where_custom('school_name_url', $school_name_url);
    foreach ($query->result() as $row) {
        $school_id = $row->school_id;
    }

    if (!isset($school_id))
    {
        $school_id = 0;
    }
    return $school_id;
}

function _get_emailaddress_from_school_name_url($emailaddress)
{
    $email_query = $this->get_where_custom('emailaddress', $emailaddress);
    foreach ($email_query->result() as $row) {
        $school_id = $row->school_id;
    }

    if (!isset($school_id))
    {
        $school_id = 0;
    }
    return $school_id;
}

function dashboard()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $data['schoolname'] = $this->session->userdata['schooladmin']['schoolname'];
    $data['view_module'] = "school_info";
    $data['view_file'] = "dashboard";
    $this->load->module('templates');
    $this->templates->schooladmin($data);
}
function update()
{   

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_school_admin();

    $update_id = ($this->session->userdata['schooladmin']['school_id']);
    $submit = $this->input->post('submit', TRUE);
    
   

    if ($submit=="Submit")
    {
        //process the form
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('schoolname', "School Name" , 'required|trim');
        $this->form_validation->set_rules('user', "User" , 'required|trim');
        $this->form_validation->set_rules('password', "Password" , 'required|trim');
        $this->form_validation->set_rules('address', "Address" , 'required|trim');
        $this->form_validation->set_rules('telno', "Telephone Number" , 'required|trim');
        $this->form_validation->set_rules('emailaddress', "Email Address" , 'required|trim');
        $this->form_validation->set_rules('typeofschool', "Type of School" , 'required|trim');
        $this->form_validation->set_rules('contactperson', "Contact Person" , 'required|trim');
        $this->form_validation->set_rules('principal', "Principal" , 'required|trim');
        $this->form_validation->set_rules('locationurl', "Location URL" , 'required|trim');
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
                $this->session->set_flashdata('school', $value);
                redirect('school_info/update/'.$update_id);
                

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


        $data['headline'] = "Update School Info Details";   
    
    

    $data['update_id'] = $update_id;
    $data['flash'] =  $this->session->flashdata('school');
    $data['view_module'] = "school_info";
    $data['view_file'] = "update";
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
        $this->form_validation->set_rules('address', "Address" , 'required|trim');
        $this->form_validation->set_rules('telno', "Telephone Number" , 'required|trim');
        $this->form_validation->set_rules('emailaddress', "Email Address" , 'required|trim');
        $this->form_validation->set_rules('typeofschool', "Type of School" , 'required|trim');
        $this->form_validation->set_rules('contactperson', "Contact Person" , 'required|trim');
        $this->form_validation->set_rules('principal', "Principal" , 'required|trim');
        $this->form_validation->set_rules('locationurl', "Location URL" , 'required|trim');
        $this->form_validation->set_rules('calendar', "Calendar" , 'required|trim');
        $this->form_validation->set_rules('avetuition', "Average Tuition" , 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            //get the variables

            $data = $this->fetch_data_from_post();
            
            $data['school_name_url'] = url_title($data['schoolname']);

            if (is_numeric($update_id)) 
            {
                //update the strand details
                $this->_update($update_id, $data);
                $flash_msg = "The school info details were successfully updated";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('school', $value);
                redirect('school_info/create/'.$update_id);
                

            }
            else
            {
                $this->_insert($data);
                $update_id = $this->get_max(); //get the idof the new strand
                $flash_msg = "A new school info were successfully added";
                $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
                $this->session->set_flashdata('school', $value);
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
    $data['flash'] =  $this->session->flashdata('school');
    $data['view_module'] = "school_info";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}
function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['info_query'] = $this->get('school_id');
    $data['view_module'] = "school_info";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);    
}

function fetch_data_from_post()
{
    $admin_id = ($this->session->userdata['admin']['userid']);
    $data['admin_id'] = $admin_id;
    $data['schoolname'] = $this->input->post('schoolname', TRUE);
    $data['user'] = $this->input->post('user', TRUE);
    $data['password'] = $this->input->post('password', TRUE);
    $data['address'] = $this->input->post('address', TRUE);
    $data['telno'] = $this->input->post('telno', TRUE);
    $data['emailaddress'] = $this->input->post('emailaddress', TRUE);
    $data['typeofschool'] = $this->input->post('typeofschool', TRUE);
    $data['contactperson'] = $this->input->post('contactperson', TRUE);
    $data['principal'] = $this->input->post('principal', TRUE);
    $data['locationurl'] = $this->input->post('locationurl', TRUE);
    $data['calendar'] = $this->input->post('calendar', TRUE);
    $data['avetuition'] = $this->input->post('avetuition', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $info_query = $this->get_where($update_id);
    foreach ($info_query->result() as $row) 
    {
        $data['admin_id'] = $row->admin_id;
        $data['school_id'] = $row->school_id;
        $data['schoolname'] = $row->schoolname;
        $data['school_name_url'] = $row->school_name_url;
        $data['user'] = $row->user;
        $data['password'] = $row->password;
        $data['address'] = $row->address;
        $data['telno'] = $row->telno;
        $data['emailaddress'] = $row->emailaddress;
        $data['typeofschool'] = $row->typeofschool;
        $data['contactperson'] = $row->contactperson;
        $data['principal'] = $row->principal;
        $data['locationurl'] = $row->locationurl;
        $data['calendar'] = $row->calendar;
        $data['avetuition'] = $row->avetuition;
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
    $mysql_info_query = "show columns from school_info";
    $info_query = $this->_custom_info_query($mysql_info_query);
    foreach ($info_query->result() as $row) 
    {
        $column_name = $row->Field;
        if ($column_name!="id")
        {
        echo '$data[\''.$column_name.'\'] = $this->input->post(\''.$column_name.'\', TRUE);<br>';
      
        }
    }

    echo "<hr/>" ;
    foreach ($info_query->result() as $row) 
    {
        $column_name = $row->Field;
        if ($column_name!="id")
        {
        echo '$data[\''.$column_name.'\'] = $row->'.$column_name.';<br>';
        
        }
    }
   
    
    
}

function get_by_id($school_id)
{
    $this->load->model('Mdl_school_info');
    $school_info_query = $this->Mdl_school_info->get_by_id($school_id);
    return $school_info_query;
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