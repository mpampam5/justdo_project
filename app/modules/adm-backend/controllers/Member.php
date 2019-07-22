<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."/modules/adm-backend/core/MY_Controller.php";

class Member extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Member_model','model');
  }


  function index($is_active="1")
  {
    if ($is_active=="1") {
        $str = "ON";
    }else {
      $str = "OFF";
    }
    $this->template->set_title("Member ".$str);
    $this->template->view("content/member/index",['is_active'=>$is_active]);
  }

  function json($is_active)
  {
    if ($this->input->is_ajax_request()) {
        $this->load->library('Datatables');
        header('Content-Type : application/json');
        echo $this->model->json($is_active);
    }
  }

  function detail($id){
    if ($row = $this->model->get_where_detail($id)) {
      $this->template->set_title("Member");
      $data = [
                "button"      => "detail",
                "id_member"        => set_value("id_member",$row->id_member),
                "nama"        => set_value("nama",$row->nama),
                "email"       => set_value("email",$row->email),
                "telepon"     => set_value("telepon",$row->telepon),
                "jk"     => set_value("jk",$row->jk),
                "alamat"     => set_value("alamat",$row->alamat),
                "is_active"     => set_value("is_active",$row->is_active),
                "kode_referral"     => set_value("kode_referral",$row->kode_referral),
                "created"     => set_value("created",$row->created),
              ];
      $this->template->view("content/member/detail",$data);
    }else {
      $this->_error404();
    }
  }

}
