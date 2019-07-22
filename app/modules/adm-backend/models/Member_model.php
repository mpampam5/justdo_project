<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."/modules/adm-backend/core/MY_Model.php";

class Member_model extends MY_Model{

  function json($is_active)
  {
    $this->datatables->select("id_member,nama,telepon,kode_referral,is_active");
    $this->datatables->from('tb_member');
    $this->datatables->where("is_active","$is_active");
    $this->datatables->add_column('action',
                                   '<a href="'.site_url("adm-backend/member/detail/$1").'"class="text-primary"><i class="fa fa-file"></i> Detail</a>&nbsp;&nbsp;
                                    <a href="'.site_url("adm-backend/member/update/$1").'"class="text-warning"><i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;
                                   ',
                                  'id_member');
    return $this->datatables->generate();
  }


  function get_where_detail($id)
  {
    return $this->db->select("trans_member.id_trans,
                              trans_member.id_parent,
                              trans_member.id_member AS trans_id_member,
                              tb_member.id_member AS id_member,
                              tb_member.nama,
                              tb_member.email,
                              tb_member.telepon,
                              tb_member.jk,
                              tb_member.foto,
                              tb_member.alamat,
                              tb_member.kode_referral,
                              tb_member.referral_from,
                              tb_member.posisi,
                              tb_member.is_active,
                              tb_member.created")
                      ->from("trans_member")
                      ->join("tb_member","tb_member.id_member = trans_member.id_member")
                      ->where('trans_member.id_member',$id)
                      ->get()
                      ->row();
  }

}
