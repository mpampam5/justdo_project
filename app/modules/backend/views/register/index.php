<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/justdo/template/demo/vertical-default-light/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 23:08:25 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Member</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/back/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url()?>_template/back/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/back/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>_template/back/vendors/jquery-toast-plugin/jquery.toast.min.css">
   <!-- <link rel="stylesheet" href="<?=base_url()?>_template/back/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css"> -->
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url()?>_template/back/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="text-center mb-5">
                <h3>Register</h3>
              </div>
              <!-- <div class="brand-logo">
                <img src="http://www.urbanui.com/justdo/template/images/logo.svg" alt="logo">
              </div> -->

              <form class="pt-3" autocomplete="off" action="<?=$action?>" id="form">
                <div class="row">

                  <div class="col-sm-12">
                    <h4>Data Pribadi</h4>
                    <h6 class="font-weight-light"></h6>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Kode Referal</label>
                      <input type="text" class="form-control" id="kode_referal" name="kode_referal" placeholder="Kode Referal">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Telepon</label>
                      <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Tempat lahir</label>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Tanggal Lahir</label>
                      <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" placeholder="Tanggal Lahir">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nik/No.KTP</label>
                      <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik/No.KTP">
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Jenis Kelamin</label>
                      <select class="form-control" name="jk" id="jk">
                        <option value="">-- Pilih --</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Provinsi</label>
                      <select class="form-control" name="provinsi" id="provinsi" onchange="loadKabupaten()">
                        <option value="">-- Pilih Provinsi --</option>
                        <?php foreach ($provinsi as $prov): ?>
                          <option value="<?=$prov->id?>"><?=$prov->name?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Kabupaten/Kota</label>
                      <select class="form-control" name="kabupaten" id="kabupaten" onChange='loadKecamatan()'>
                        <option value="">-- Pilih Kabupaten/Kota --</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Kecamatan</label>
                      <select class="form-control" name="kecamatan" id="kecamatan" onChange='loadKelurahan()'>
                        <option value="">-- Pilih Kecamatan--</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Kelurahan/Desa</label>
                      <select class="form-control" name="kelurahan" id="kelurahan">
                        <option value="">-- Pilih Kelurahan/Desa--</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Alamat Lengkap</label>
                      <!-- <input type="text" class="form-control" id="" placeholder=""> -->
                      <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Pilihan Paket</label>
                      <select class="form-control" name="paket" id="paket">
                        <option value="">-- Pilih --</option>
                        <option value="silver">Silver</option>
                        <option value="gold">Gold</option>
                        <option value="platinum">Platinum</option>
                      </select>
                    </div>
                  </div>




                  <div class="col-sm-12">
                    <h4>Data Rekening</h4>
                    <h6 class="font-weight-light"></h6>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">BANK</label>
                      <select  class="form-control" id="bank" name="bank">
                        <option value="">-- pilih BANK --</option>
                        <?php foreach ($bank as $bk): ?>
                          <option value="<?=$bk->id?>"><?=$bk->bank?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">No. Rekening</label>
                      <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="No. Rekening">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nama Rekening</label>
                      <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" placeholder="Nama Rekening">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Kota/Kabupaten Pembukaan Rekening</label>
                      <input type="text" class="form-control" id="kota_pembukaan_rek" name="kota_pembukaan_rek" placeholder="Kota/Kabupaten pembukaan Rekening">
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <h4>Data Akun</h4>
                    <h6 class="font-weight-light"></h6>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Konfirmasi Password</label>
                      <input type="password" class="form-control" id="v_password" name="v_password" placeholder="Konfirmasi Password">
                    </div>
                  </div>



                </div>



                <div class="mt-5">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" id="submit">Registrasi</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah memiliki akun? <a href="<?=site_url("member-panel")?>" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url()?>_template/back/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
   <!-- <script src="<?=base_url()?>_template/back/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> -->
   <script src="<?=base_url()?>_template/back/vendors/inputmask/jquery.inputmask.bundle.js"></script>
  <script src="<?=base_url()?>_template/back/js/off-canvas.js"></script>
  <script src="<?=base_url()?>_template/back/js/hoverable-collapse.js"></script>
  <script src="<?=base_url()?>_template/back/js/template.js"></script>
  <script src="<?=base_url()?>_template/back/js/settings.js"></script>
  <script src="<?=base_url()?>_template/back/js/todolist.js"></script>
  <!-- endinject -->
  <script src="<?=base_url()?>_template/back/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>


  <script type="text/javascript">

  $(document).ready(function(){
      $("#tgl_lahir").inputmask();
  });


  $("#form").submit(function(e){
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled',true).html('<div class="spinner-border spinner-border-sm text-white"></div> Memproses...');
    $.ajax({
          url             : me.attr('action'),
          type            : 'post',
          data            :  new FormData(this),
          contentType     : false,
          cache           : false,
          dataType        : 'JSON',
          processData     :false,
          success:function(json){
            if (json.success==true) {
                $('.form-group').removeClass('.has-error')
                                .removeClass('.has');
                $.toast({
                  text: json.alert,
                  showHideTransition: 'slide',
                  icon: 'success',
                  loaderBg: '#f96868',
                  position: 'bottom-right',
                  afterHidden: function () {
                      location.reload();
                  }
                });

            }else {
              $("#submit").prop('disabled',false)
                          .html('Registrasi');
              $.each(json.alert, function(key, value) {
                var element = $('#' + key);
                $(element)
                .closest('.form-group')
                .find('.text-danger').remove();
                $(element).after(value);
              });
            }
          }
    });
  });


  function loadKabupaten()
          {
              var provinsi = $("#provinsi").val();
              if (provinsi!="") {
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>member-register/jsonkabupaten",
                    data:"id=" + provinsi,
                    success: function(html)
                    {
                       $("#kabupaten").html(html);
                    }
                });
              }else {
                $("#kabupaten").html('<option value="">-- Pilih Kabupaten/Kota --</option>');
                $("#kecamatan").html('<option value="">-- Pilih Kecamatan --</option>');
                $("#kelurahan").html('<option value="">-- Pilih Kelurahan/desa --</option>');
              }
          }

          function loadKecamatan()
            {
                var kabupaten = $("#kabupaten").val();
                if (kabupaten!="") {
                  $.ajax({
                      type:'GET',
                      url:"<?php echo base_url(); ?>member-register/jsonkecamatan",
                      data:"id=" + kabupaten,
                      success: function(html)
                      {
                          $("#kecamatan").html(html);
                      }
                  });
                }else {
                  $("#kecamatan").html('<option value="">-- Pilih Kecamatan --</option>');
                  $("#kelurahan").html('<option value="">-- Pilih Kelurahan/desa --</option>');
                }

            }

            function loadKelurahan()
            {
                var kecamatan = $("#kecamatan").val();
                if (kecamatan!="") {
                  $.ajax({
                      type:'GET',
                      url:"<?php echo base_url(); ?>member-register/jsonkelurahan",
                      data:"id=" + kecamatan,
                      success: function(html)
                      {
                          $("#kelurahan").html(html);
                      }
                  });
                }else {
                  $("#kelurahan").html('<option value="">-- Pilih Kelurahan/Desa --</option>');
                }
            }


  </script>
</body>


<!-- Mirrored from www.urbanui.com/justdo/template/demo/vertical-default-light/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 23:08:25 GMT -->
</html>
