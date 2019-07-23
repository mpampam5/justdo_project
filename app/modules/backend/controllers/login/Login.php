<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH."/modules/backend/core/MY_Controller.php";

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array("backend/telegram"));
  }

  function index(){
    // $this->load->set_title("Login");
    $this->load->view("login/index");
  }


  function action(){
    if ($this->input->is_ajax_request()) {
        $json = array('success' => false,
                      "valid"=>false,
                      'url'=>"",
                      'alert'=>array()
                    );
        $this->load->library("form_validation");

        $this->form_validation->set_rules("username","Username","trim|xss_clean|required");
        $this->form_validation->set_rules("password","Password","trim|required");
        $this->form_validation->set_error_delimiters('<label class="error mt-2 text-danger">','</label>');


        if ($this->form_validation->run()) {
          $json["success"] = true;
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $qry = $this->db->get_where("tb_auth",array("username"=>$username,"level"=>"member"));
            if ($qry->num_rows() > 0) {

                $this->load->helper("pass_hash");
                if (pass_decrypt($qry->row()->token,$password,$qry->row()->password)==true) {
                  $session = array(
                                    'id_member' => $qry->row()->id_personal,
                                    'login' => true
                                  );
                  $this->session->set_userdata($session);
                  $json['valid'] = true;
                  $json['url'] = site_url("backend/index");
                }
            }else {
                $json["alert"] = "Username Atau Password Salah.";
            }

        }else {
          foreach ($_POST as $key => $value) {
                    $json['alert'][$key] = form_error($key);
                  }
        }
        echo json_encode($json);
    }
  }


  function logout()
  {
    $this->session->sess_destroy();
    redirect(site_url("member-panel"));
  }



} //end class
