
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register Alumni</title>

    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/style.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <!-- Mainly scripts -->
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/bootstrap.min.js"></script>
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/inspinia.js"></script>
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/pace/pace.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>



</head>

<body class="gray-bg">
 <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12 text-center">
        <h2 class="font-bold">Register Alumni Universitas Islam Riau</h2>
        
    </div>

</div>
<div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <form method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="col-md-6">
                <div class="ibox-content">


                    <div class="form-group">
                        <label class="col-sm-3 control-label">NPM</label>
                        <div class="col-sm-9">
                            <input required type="text" name="npm" data-mask="99999999999" class="form-control"> <span class="help-block m-b-none gray-bg">Digunakan sebagai username ketika login</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <div class="input-group">
                                <input required type="password"  name="password" class="form-control">
                                <span class="input-group-btn"> <button type="button" onclick="if(password.type=='text')password.type='password'; else password.type='text';" class="btn btn-empty"><i class="fa fa-eye"></i>
                                </button> </span>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input required type="email"  name="email" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Lengkap</label>

                        <div class="col-sm-9">
                            <input required type="text"  name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>

                        <div class="col-sm-9">
                            <select name="jenis_kelamin" class="form-control">
                                <option value="LK">Laki-Laki</option>
                                <option value="PR">Perempuan</option>
                                option
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">TTL</label>

                        <div class="col-sm-5"><input required type="text"  name="tempat_lahir" class="form-control">
                        </div>

                        <div class="col-sm-4"><input required type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>

                        <div class="col-sm-9"><textarea required name="alamat" class="form-control"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nomor HP</label>

                        <div class="col-sm-9">
                            <input required name="no_hp" type="text" class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Photo</label>
                            <div class="col-sm-9">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" id="file_photo" name="file_photo" required/>
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" id="remove" data-dismiss="fileinput">Remove</a>
                                </div> 

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Preview</label>
                            <div class="col-sm-9">
                                <div class="m-b-sm">
                                    <img  class="" id="pas_photo" src="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox-content">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fakulas</label>

                            <div class="col-sm-9">
                                <select name="fakultas" required id="fakultas" class="form-control">
                                    <option value="" disabled selected>-</option>
                                    <?php foreach ($list_fakultas as $key => $fakultas): ?>
                                        <option value="<?php echo $fakultas['id_fakultas'] ?>" ><?php echo $fakultas['nama_fakultas'] ?></option>

                                    <?php endforeach ?>
                                </select>

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jurusan</label>

                            <div class="col-sm-9">
                                <select name="id_jurusan" id="id_jurusan" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Angkatan</label>

                            <div class="col-sm-2">
                                <input required type="text" name="angkatan"  data-mask="9999" class="form-control">
                            </div>
                            <label class="col-sm-1 control-label">Lulus</label>
                            <div class="col-sm-2"><input required type="text"  data-mask="9999" name="tahun_lulus" class="form-control">
                            </div>


                            <label class="col-sm-2 control-label">Periode</label>

                            <div class="col-md-2">
                                <select name="periode_lulus"  class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judul Skripsi</label>

                            <div class="col-sm-9">
                                <textarea name="judul_skripsi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Sidang</label>

                            <div class="col-sm-9">

                                <input required type="date" name="tanggal_sidang" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Kerja</label>

                            <div class="col-sm-9">

                                <select name="id_status_pekerjaan" required id="status_kerja" class="form-control">
                                    <option value="" disabled selected>-</option>
                                    <?php foreach ($status_pekerjaan as $key => $status): ?>
                                        <option value="<?php echo $status['id'] ?>"><?php echo $status['keterangan'] ?></option>}
                                        option
                                    <?php endforeach ?>

                                </select>
                            </div>
                        </div>
                        <div id="div-kerja"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <a href="<?php echo site_url(); ?>" class="btn btn-white" >Kembali</a>
                                <button class="btn btn-primary" type="submit">Daftar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <hr/>

        </div>
    </div>

    <script>
    $(document).ready(function() {

     $("#file_photo").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var fileSize = file.size / 1000 ;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])) ||  fileSize > 1500)
        {
            $('#pas_photo').attr('src','');
            $("#file_photo").val("");
            return false;
        }
        else
        {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
     $('#remove').click(function() {
       $('#pas_photo').attr('src', "");
       $('#pas_photo').attr('width', '250px');
       $('#pas_photo').attr('height', '230px');
   });
     $('#id_status_pekerjaan').change(function(event) {
        var v = $(this).val();
        var html = '<div class="form-group"><label class="col-sm-3 control-label">Nama Instansi</label>' +
        '<div class="col-sm-9">' +
        '<input required type="text" name="nama_instansi" id="nama_instansi"  class="form-control">' +
        '</div>' +
        '</div>' +
        '<div class="form-group"><label class="col-sm-3 control-label">Alamat Instansi</label>' +
        '<div class="col-sm-9">' +
        '<textarea name="alamat_instansi" id="alamat_instansi" class="form-control"></textarea>' +
        '</div>' +
        '</div>' +
        '<div class="form-group"><label class="col-sm-3 control-label">Waktu Tunggu</label>' +
        '<div class="col-sm-9">' +
        '<div class="i-checks"><label> <input type="radio" value="1" name="id_waktu_tunggu"> <i></i> < 1 Tahun </label></div>'+
        '<div class="i-checks"><label> <input type="radio" value="2" name="id_waktu_tunggu"> <i></i> > 1 Tahun</label></div>'+
        '<div class="i-checks"><label> <input type="radio" value="3" name="id_waktu_tunggu"> <i></i> > 2 Tahun </label></div>'+
        '</div>' +
        '</div>';
        if (v === '2') 
        {
            $('#div-kerja').html(html);
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        } else 
        {
            $('#div-kerja').html("");

        }
    });

     $('#fakultas').change(function(event) {
        var id_fakultas = $(this).val();
        $.ajax({
            url: '<?php echo site_url() . 'alumni/set_option_register' ?>',
            type: 'POST',
            dataType: 'html',
            data: {id_fakultas: id_fakultas},
        })
        .done(function(result) {
            console.log("success");
            $('#id_jurusan').html(result);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    });
     $('#status_kerja').change(function(event) {
        var v = $(this).val();
        var html = '<div class="form-group"><label class="col-sm-3 control-label">Nama Instansi</label>' +
        '<div class="col-sm-9">' +
        '<input required type="text" name="nama_instansi" id="nama_instansi"  class="form-control">' +
        '</div>' +
        '</div>' +
        '<div class="form-group"><label class="col-sm-3 control-label">Alamat Instansi</label>' +
        '<div class="col-sm-9">' +
        '<textarea name="alamat_instansi" id="alamat_instansi" class="form-control"></textarea>' +
        '</div>' +
        '</div>' +
        '<div class="form-group"><label class="col-sm-3 control-label">Waktu Tunggu</label>' +
        '<div class="col-sm-9">' +
        '<div class="i-checks"><label> <input type="radio" value="1" name="id_waktu_tunggu"> <i></i> < 1 Tahun </label></div>'+
        '<div class="i-checks"><label> <input type="radio" value="2" name="id_waktu_tunggu"> <i></i> > 1 Tahun</label></div>'+
        '<div class="i-checks"><label> <input type="radio" value="3" name="id_waktu_tunggu"> <i></i> > 2 Tahun </label></div>'+
        '</div>' +
        '</div>';
        if (v === '2') 
        {

            $('#div-kerja').html(html);
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        } else 
        {
            $('#div-kerja').html('');

        }
    });
 });
function imageIsLoaded(e) {
    $('#pas_photo').attr('src', e.target.result);
    $('#pas_photo').attr('width', '250px');
    $('#pas_photo').attr('height', '230px');
};

</script>
</body>

</html>
