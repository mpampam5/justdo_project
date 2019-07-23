<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."/modules/backend/core/MY_Model.php";

class Member_model extends MY_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function json_menunggu_verif()
  {
    $this->datatables->select("id_member,nama,referral_from,is_active,is_verifikasi,DATE_FORMAT(created,'%d/%m/%Y jam %h:%i') AS created");
    $this->datatables->from('tb_member');
    $this->datatables->where("referral_from",$this->session->userdata('kode_referral'));
    $this->datatables->where("is_verifikasi","0");
    $this->datatables->add_column('action',
                                   '<a href="'.site_url("adm-backend/member/verifikasi/$1").'" class="text-success"><i class="fa fa-check-square"></i> Verifikasi</a>&nbsp;&nbsp;
                                   <a href="'.site_url("adm-backend/member/detail/$1").'" class="text-primary"><i class="fa fa-file"></i> Detail</a>&nbsp;&nbsp;
                                   <a href="'.site_url("adm-backend/member/delete/$1").'" id="delete" class="text-danger"><i class="fa fa-trash"></i> Hapus</a>
                                   ',
                                  'id_member');
    return $this->datatables->generate();
  }

}
