<form action="<?=site_url("backend/pohon_jaringan/tambah_action")?>" id="form" autocomplete="off">
    <div class="row">

      <div class="col-sm-12">
        <div class="form-group">
          <label for="">Nik</label>
          <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <label for="">Telepon</label>
          <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        </div>
      </div>


      <div class="col-sm-12">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <div class="form-check form-check-primary">
            <label class="form-check-label">
              <input type="checkbox"id="showpwd" class="form-check-input">
              Lihat Password
            <i class="input-helper"></i></label>
          </div>
        </div>
      </div>


      <input type="hidden" name="id_parent" value="<?=$id_parent?>">
      <input type="hidden" name="posisi" value="<?=$posisi?>">

      <div id="posisi"></div>
      <div id="parent"></div>

      <div class="col-sm-12">
        <button type='button' class='btn btn-danger btn-sm text-white' data-dismiss='modal'>Batal</button>
        <button type="submit" name="submit" id="submit" class="btn btn-info btn-sm text-white"> Tambahkan</button>
      </div>

  </div>
</form>


<script type="text/javascript">

$(document).ready(function(){
    $('#showpwd').click(function(){
      $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
    });
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
            $("#modalGue").modal('hide');
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
                        .html('Tambah');
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




</script>
