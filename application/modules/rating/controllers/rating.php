<?php
class Rating extends MX_Controller 
{

function __construct() {
parent::__construct();
}
function school_rate()
{
    
    $submitRate = $this->input->post('submit_rate', TRUE);

    if ($submitRate=="SubmitRate")
    {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('rating', "Rate", 'required|trim');
        $this->form_validation->set_rules('review', "Review", 'required|trim');
        $school_name_url = $this->input->post("school_name_url", TRUE);
        if ($this->form_validation->run() == TRUE)
        {
            //get the variables
            $data = $this->fetch_data_from_post();
            //update the strand details
            $this->_insert($data);
            $flash_msg = "Your review were successfully submitted.";
            $value = '<div class="alert alert-success">'.$flash_msg.'</div>';
            
            redirect('school_info/profile/'.$school_name_url."?ratingStatus=success#rateForm");

        }
    }
    
    redirect('school_info/profile/'.$school_name_url."#rateForm");
}


function fetch_data_from_post()
{   

    $data['school_id'] = $this->input->post('school_id', TRUE);
    $data['rate'] = $this->input->post('rating', TRUE);
    $data['review'] = $this->input->post('review', TRUE);
    
    return $data;
}

function fetch_data_from_db($update_id)
{

    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) 
    {
        $data['school_id'] = $row->school_id;
        $data['rate_id'] = $row->description;
        $data['rate'] = $row->rate;
        $data['review'] = $row->review;
        $data['email'] = $row->email;
    }
    if (!isset($data))
    {
        $data = "";
    }
    return $data;
}


function get($order_by)
{
    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_rating');
    $this->mdl_rating->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $this->mdl_rating->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_rating');
    $this->mdl_rating->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_rating');
    $count = $this->mdl_rating->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_rating');
    $max_id = $this->mdl_rating->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_rating');
    $query = $this->mdl_rating->_custom_query($mysql_query);
    return $query;
}

}