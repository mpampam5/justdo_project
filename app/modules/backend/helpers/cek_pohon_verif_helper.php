<?php defined('BASEPATH') OR exit('No direct script access allowed');

function cek_parent($id,$posisi,$id_member_verif){
  $ci = get_instance();
  $query = $ci->db->query("SELECT
                              trans_member.id_trans,
                              trans_member.id_parent,
                              trans_member.id_member,
                              tb_member.nama,
                              tb_member.posisi
                            FROM
                              trans_member
                            INNER JOIN
                              tb_member ON trans_member.id_member = tb_member.id_member
                            WHERE
                              trans_member.id_parent = $id
                            AND
                              tb_member.posisi = '$posisi'

                            ");
    if ($query->num_rows() > 0) {
        $str = '<h4>'.$query->row()->nama.'</h4>';
    }else {
        $str = '<a href="'.site_url("backend/pohon_jaringan/verifikasi_member_action/$id/$posisi/$id_member_verif").'" id="tambah" class="btn btn-info btn-sm"><i class="fa fa-plus text-white"></i></a>';
    }

  return $str;
}

function cek_parent_id($id,$posisi){
  $ci = get_instance();
  $query = $ci->db->query("SELECT
                              trans_member.id_trans,
                              trans_member.id_parent,
                              trans_member.id_member,
                              tb_member.nama,
                              tb_member.posisi
                            FROM
                              trans_member
                            INNER JOIN
                              tb_member ON trans_member.id_member = tb_member.id_member
                            WHERE
                              trans_member.id_parent = $id
                            AND
                              tb_member.posisi = '$posisi'

                            ");
    if ($query->num_rows() > 0) {
        $str = $query->row()->id_member;
    }else {
      $str = false;
    }

  return $str;
}

function cek_id_cucu($id,$posisi,$id_member_verif){
  $ci = get_instance();
  $query = $ci->db->query("SELECT
                              trans_member.id_trans,
                              trans_member.id_parent,
                              trans_member.id_member,
                              tb_member.nama,
                              tb_member.posisi
                            FROM
                              trans_member
                            INNER JOIN
                              tb_member ON trans_member.id_member = tb_member.id_member
                            WHERE
                              trans_member.id_parent = $id
                            AND
                              tb_member.posisi = '$posisi'

                            ");
    if ($query->num_rows() > 0) {
        $str = array( 'status'=>true,
                      'id' => $query->row()->id_member,
                      'nama' => '<h4>'.$query->row()->nama.'</h4>'
                    );
    }else {
        $str = array("status" => false,
                      "button" => '<a href="'.site_url("backend/pohon_jaringan/verifikasi_member_action/$id/$posisi/$id_member_verif").'" id="tambah" class="btn btn-info btn-sm"> <i class="fa fa-plus text-white"></i></a>'
                    );
    }

  return $str;
}


function cek_anak_cucu($id)
{
  $ci = get_instance();
  $query = $ci->db->get_where("trans_member",["id_parent"=>$id]);
  if ($query->num_rows() > 0) {
    return true;
  }else {
    return false;
  }
}


function ambil_data_parent($id)
{
  $ci = get_instance();
  $query = $ci->db->get_where("trans_member",["id_member"=>$id]);
  if ($query->num_rows() > 0) {
    return '<a href="'.site_url("backend/pohon_jaringan/verifikasi_member_action/".$query->row()->id_parent).'" id="show-parent" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i> Show Parent</a>';
  }
}
