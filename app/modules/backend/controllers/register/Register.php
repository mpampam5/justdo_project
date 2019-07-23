<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Register_model","model");
  }

  function index()
  {
    $data["action"]  = site_url("member-register/action");
    $data["provinsi"] = $this->model->get_provinsi()->result();
    $data["bank"]   = $this->model->get_bank()->result();
    $this->load->view("register/index",$data);
  }

  function _rules()
  {
    $this->form_validation->set_rules("kode_referal","Kode Referal","trim|xss_clean|required",[
      "required" => "Silahkan masukkan kode referal mitra anda."
    ]);

    $this->form_validation->set_rules("nama","Nama","trim|xss_clean|required");
    $this->form_validation->set_rules("email","Email","trim|xss_clean|required|valid_email");
    $this->form_validation->set_rules("telepon","Telepon","trim|xss_clean|required|numeric");

    $this->form_validation->set_rules("tempat_lahir","Tempat Lahir","trim|xss_clean|required");
    $this->form_validation->set_rules("jk","Jenis Kelamin","trim|xss_clean|required");
    $this->form_validation->set_rules("provinsi","Provinsi","trim|xss_clean|required");
    $this->form_validation->set_rules("kabupaten","Kabupaten/Kota","trim|xss_clean|required");
    $this->form_validation->set_rules("kecamatan","Kecamatan","trim|xss_clean|required");
    $this->form_validation->set_rules("kelurahan","Kelurahan/Desa","trim|xss_clean|required");
    $this->form_validation->set_rules("alamat","Alamat Lengkap","trim|xss_clean|required");
    $this->form_validation->set_rules("paket","Jenis Paket","trim|xss_clean|required");
    $this->form_validation->set_rules("bank","Jenis Bank","trim|xss_clean|required");
    $this->form_validation->set_rules("no_rek","NO.rekening","trim|xss_clean|required|numeric");
    $this->form_validation->set_rules("nama_rekening","Nama Rekening","trim|xss_clean|required");
    $this->form_validation->set_rules("kota_pembukaan_rek","Kota/Kabupaten Pembukaan Rekening","trim|xss_clean|required");
    $this->form_validation->set_rules("username","Username","trim|xss_clean|required|alpha_dash|is_unique[tb_auth.username]",[
      "is_unique" => "Coba Username yang lain"
    ]);
    $this->form_validation->set_rules("password","Password","trim|xss_clean|required|min_length[5]");
    $this->form_validation->set_rules("v_password","Konfirmasi Password","trim|xss_clean|required|matches[password]");
    $this->form_validation->set_error_delimiters('<label class="error mt-2 text-danger">','</label>');
  }

  function action()
  {
    if ($this->input->is_ajax_request()) {
        $json = array('success'=>false, 'alert'=>array());
        $this->load->library(array("form_validation"));
        $tgl_lahir = $this->input->post("tgl_lahir",true);
        $this->form_validation->set_rules("tgl_lahir","Tanggal Lahir","trim|xss_clean|required");
        $this->form_validation->set_rules("nik","Nik/No.KTP","trim|xss_clean|required|min_length[16]|max_length[16]|numeric|callback__cek_nik[".$tgl_lahir."]|is_unique[tb_member.nik]",[
          "is_unique" => "Nik/No.KTP sudah terdaftar"
        ]);

        $this->_rules();
        if ($this->form_validation->run()) {







            $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value)
            {
              $json['alert'][$key] = form_error($key);
            }
        }

      echo json_encode($json);
    }
  }


  function _cek_nik($str,$tgl_lahir)
  {
    if ($tgl_lahir!="") {
      $tgl_array = explode("/",$tgl_lahir);
      $tgl = $tgl_array[0];
      $bulan = $tgl_array[1];
      $tahun = substr($tgl_array[2],-2);

      $gabung = $tgl."".$bulan."".$tahun;
      $nik = substr($str,-10,-4);
      if ($gabung==$nik) {
          return true;
      }else {
          $this->form_validation->set_message('_cek_nik', 'Nik/No.KTP tidak valid.');
          return false;
      }
    }else {
      return true;
    }

  }


















  function kabupaten(){
        $propinsiID = $_GET['id'];
        $kabupaten   = $this->db->get_where('wil_kabupaten',array('province_id'=>$propinsiID));
        echo '<option value="">-- Pilih Kabupaten/Kota --</option>';
        foreach ($kabupaten->result() as $k)
        {
            echo "<option value='$k->id'>$k->name</option>";
        }
    }


    function kecamatan(){
       $kabupatenID = $_GET['id'];
       $kecamatan   = $this->db->get_where('wil_kecamatan',array('regency_id'=>$kabupatenID));
       echo '<option value="">-- Pilih Kecamatan --</option>';
       foreach ($kecamatan->result() as $k)
       {
           echo "<option value='$k->id'>$k->name</option>";
       }
   }

   function kelurahan(){
        $kecamatanID  = $_GET['id'];
        $desa         = $this->db->get_where('wil_kelurahan',array('district_id'=>$kecamatanID));
        echo '<option value="">-- Pilih Kelurahan/Desa --</option>';
        foreach ($desa->result() as $d)
        {
            echo "<option value='$d->id'>$d->name</option>";
        }
    }



}
