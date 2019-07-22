<?php defined('BASEPATH') OR exit('No direct script access allowed');


function hitung_jumlah_referal($kode_referral)
{
  $ci=get_instance();
  $query = $ci->db->get_where("tb_member",["referral_from"=>$kode_referral])->num_rows();
  if ($query!=0) {
      return $query." orang";
  }else {
    return "0 orang";
  }
}
