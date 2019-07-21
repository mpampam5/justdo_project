<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."/modules/backend/core/MY_Controller.php";

class Pohon_jaringan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Pohon_model','model');
    $this->load->helper(['cek_pohon']);
  }

  function index(){
    $this->template->set_title("Pohon Jaringan");
    $data["root"] = $this->model->get_where("tb_member",["id_member"=>$this->session->userdata("id_member")]);
    $this->template->view("content/pohon_jaringan/index",$data);
  }


  function show($id)
  {
    $this->template->set_title("Pohon Jaringan");
    $data["root"] = $this->model->get_where("tb_member",["id_member"=>$id]);
    $this->template->view("content/pohon_jaringan/index",$data);
  }


  function tambah($id_parent,$posisi)
  {
    $this->template->set_title("Pohon Jaringan");
    $data = array('id_parent' => $id_parent, 'posisi' => $posisi);
    $this->template->view("content/pohon_jaringan/form",$data,false);
  }

  function tambah_action(){
    if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->form_validation->set_rules("nama","Nama","trim|xss_clean|required");
      $this->form_validation->set_rules("username","Username","trim|xss_clean|required|alpha_numeric|callback__cek_username",[
        "alpha_numeric" => "Hanya Bisa berisi angka dan huruf"
      ]);
      $this->form_validation->set_rules("password","Password","trim|xss_clean|required|min_length[5]");
      $this->form_validation->set_rules("id_parent","id_parent","trim|xss_clean|numeric|required");
      $this->form_validation->set_rules("posisi","Posisi","trim|xss_clean|required");
      $this->form_validation->set_error_delimiters('<label class="error mt-2 text-danger">','</label>');
      if ($this->form_validation->run()) {
        $query = $this->model->get_where("tb_member",['id_member'=>$this->session->userdata("id_member")]);
        $referral = $query->kode_referral;
        $data = [
                  "nama"    => $this->input->post("nama",true),
                  "username" => $this->input->post("username",true),
                  "password"  => $this->input->post("password",true),
                  "posisi"   => $this->input->post("posisi",true),
                  "referral_from" => $referral,
                  "kode_referral" => date('dmYhis'),
                  "created" => date("Y-m-d h:i:s")
                ];
        $this->model->get_insert("tb_member",$data);
        $last_id = $this->db->insert_id();
        $last_insert = array('id_parent' =>$this->input->post('id_parent') ,'id_member'=>$last_id);
        $this->model->get_insert("trans",$last_insert);
        $json['alert'] = "Member Berhasil Di Tambahkan";
        $json['success'] =  true;
        send_log("baru-baru ini \"".$data['nama']."\" Telah di tambahkan sebagai member");
      }else {
        foreach ($_POST as $key => $value)
          {
            $json['alert'][$key] = form_error($key);
          }
      }
      echo json_encode($json);
    }
  }

  function _cek_username($str)
  {
    if ($this->model->get_where("tb_member",["username"=>$str]))
    {
      $this->form_validation->set_message('_cek_username', 'Username sudah ada');
      return FALSE;
    }else{
      return TRUE;
    }
  }





} //end class
