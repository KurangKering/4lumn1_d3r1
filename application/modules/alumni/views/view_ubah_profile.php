<style type="text/css" media="screen">
#pas_photo {
    width: 250px;
    height: 230px;
}
</style>
<div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="hidden_npm" value="<?php echo isset($profile['npm']) ? $profile['npm'] : '' ?>">
            <div class="col-md-6">
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">NPM</label>
                        <div class="col-sm-9">
                            <input required type="text" name="npm" class="form-control" disabled value="<?php echo isset($profile['npm']) ? $profile['npm'] : '' ?>"> <span class="help-block m-b-none gray-bg">Digunakan sebagai username ketika login</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input required type="password"  name="password" class="form-control">
                                <span class="input-group-btn"> <button type="button" onclick="if(password.type=='text')password.type='password'; else password.type='text';" class="btn btn-empty"><i class="fa fa-eye"></i>
                            </button> </span>

                        </div>
                            <span class="help-block m-b-none gray-bg">Kosongkan Jika Tidak Ingin Merubah Password</span>
                        
                    </div>
                </div>
                <div class="hr-line-dashed">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input required type="email"  name="email" class="form-control" value="<?php echo isset($profile['email']) ? $profile['email'] : '' ?>">
                    </div>
                </div>
                <div class="hr-line-dashed">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input required type="text"  name="nama" class="form-control" value="<?php echo isset($profile['nama']) ? $profile['nama'] : '' ?>">
                    </div>
                </div>
                <div class="hr-line-dashed">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <select name="jenis_kelamin" class="form-control">
                            <option value="LK" <?php echo isset($profile['jenis_kelamin']) && $profile['jenis_kelamin'] == 'LK' ? 'selected' : '' ?> >Laki-Laki</option>
                            <option value="PR" <?php echo isset($profile['jenis_kelamin']) && $profile['jenis_kelamin'] == 'PR' ? 'selected' : '' ?> >Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">TTL</label>
                    <div class="col-sm-5"><input required type="text"  name="tempat_lahir" class="form-control" value="<?php echo isset($profile['tempat_lahir']) ? $profile['tempat_lahir'] : '' ?>">
                    </div>
                    <div class="col-sm-4"><input required type="date"  name="tanggal_lahir" class="form-control" value="<?php echo isset($profile['tanggal_lahir']) ? $profile['tanggal_lahir'] : '' ?>">
                    </div>
                </div>
                <div class="hr-line-dashed">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                        <textarea required name="alamat" class="form-control"><?php echo isset($profile['alamat']) ? $profile['alamat'] : '' ?></textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nomor HP</label>
                        <div class="col-sm-9">
                            <input required name="no_hp" type="text" class="form-control" value="<?php echo isset($profile['no_hp']) ? $profile['no_hp'] : '' ?>"/></div>
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
                                        <input type="file" id="file_photo" name="file_photo"/>
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" id="remove" data-dismiss="fileinput">Remove</a>
                                </div> 
                                <span class="help-block m-b-none gray-bg">Kosongkan Jika Tidak Ingin Merubah Photo</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Preview</label>
                            <div class="col-sm-9">
                                <div class="m-b-sm">
                                    <img  class="" id="pas_photo" src="<?php echo site_url() . 'assets/files/alumni/' . $profile['photo'] ?>">
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
                                <input name="fakultas"  disabled type="text" class="form-control" value="<?php echo isset($profile['fakultas']) ? $profile['fakultas'] : '' ?>"/>                               
                            </div>
                        </div>
                        <div class="hr-line-dashed">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jurusan</label>
                            <div class="col-sm-9">
                                <input name="jurusan"  disabled type="text" class="form-control" value="<?php echo isset($profile['jurusan']) ? $profile['jurusan'] : '' ?>"/>                               
                            </div>
                        </div>
                        <div class="hr-line-dashed">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Angkatan</label>
                            <div class="col-sm-2">
                                <input required  disabled type="text" name="angkatan" class="form-control" value="<?php echo isset($profile['angkatan']) ? $profile['angkatan'] : '' ?>">
                            </div>
                            <label class="col-sm-1 control-label">Lulus</label>
                            <div class="col-sm-2"><input required  disabled type="text"  name="tahun_lulus" class="form-control" value="<?php echo isset($profile['tahun_lulus']) ? $profile['tahun_lulus'] : '' ?>">
                            </div>
                            <label class="col-sm-2 control-label">Periode</label>
                            <div class="col-md-2"><input required  disabled type="text"  name="periode_lulus" class="form-control" value="<?php echo isset($profile['periode_lulus']) ? $profile['periode_lulus'] : '' ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judul Skripsi</label>
                            <div class="col-sm-9">
                                <input required disabled type="text" name="judul_skripsi" class="form-control" value="<?php echo isset($profile['judul_skripsi']) ? $profile['judul_skripsi'] : '' ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Sidang</label>
                            <div class="col-sm-9">
                                <input required disabled type="date" name="tanggal_sidang" class="form-control" value="<?php echo isset($profile['tanggal_sidang']) ? $profile['tanggal_sidang'] : '' ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Kerja</label>
                            <div class="col-sm-9">
                                <select name="id_status_pekerjaan" id="id_status_pekerjaan" required class="form-control">
                                    <?php if (isset($profile['id_status_pekerjaan'])): ?>
                                       <?php if (isset($status_pekerjaan)): ?>
                                        <?php foreach ($status_pekerjaan as $key => $status): ?>
                                            <?php if ($status['id'] === $profile['id_status_pekerjaan']): ?>
                                                <option selected value="<?php echo $status['id'] ?>"><?php echo $status['keterangan'] ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo $status['id'] ?>"><?php echo $status['keterangan'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                    <div id="div-kerja">
                        <?php if (isset($profile['id_status_pekerjaan'])): ?>
                            <?php if ($profile['id_status_pekerjaan'] === '2'): ?>
                                <div class="form-group"><label class="col-sm-3 control-label">Nama Instansi</label> 
                                <div class="col-sm-9"> 
                                    <input required type="text" name="nama_instansi" id="nama_instansi"  class="form-control"  value="<?php echo isset($profile['nama_instansi']) ? $profile['nama_instansi'] : ''; ?>"> 
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Alamat Instansi</label> 
                                <div class="col-sm-9"> 
                                    <textarea name ="alamat_instansi" id="alamat_instansi" class="form-control"><?php echo isset($profile['alamat_instansi']) ? $profile['alamat_instansi'] : '' ?></textarea>
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Waktu Tunggu</label> 
                                <div class="col-sm-9"> 
                                    <div class="i-checks">
                                        <label> <input required type="radio" value="1" <?php echo isset($profile['id_waktu_tunggu']) && $profile['id_waktu_tunggu'] === '1' ? 'checked' : ""; ?> name="id_waktu_tunggu"> <i></i> < 1 Tahun </label>
                                    </div>
                                    <div class="i-checks">
                                        <label> <input type="radio" <?php echo isset($profile['id_waktu_tunggu']) && $profile['id_waktu_tunggu'] === '2' ? 'checked' : ""; ?> value="2" name="id_waktu_tunggu"> <i></i> > 1 Tahun</label>
                                    </div>
                                    <div class="i-checks">
                                        <label> <input type="radio" value="3" <?php echo isset($profile['id_waktu_tunggu']) && $profile['id_waktu_tunggu'] === '3' ? 'checked' : ""; ?> name="id_waktu_tunggu"> <i></i> > 2 Tahun </label>
                                    </div>
                                </div> 
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 ">
                        <button class="btn btn-primary pull-right" type="submit">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr/>
</div>
</div>
<script>
// Function to preview image after validation
$(function() {
 var image_original = "<?php echo site_url() . 'assets/files/alumni/' . $profile['photo'] ?>";
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
   $('#pas_photo').attr('src', image_original);
   $('#pas_photo').attr('width', '250px');
   $('#pas_photo').attr('height', '230px');
})
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
});
function imageIsLoaded(e) {
    $('#pas_photo').attr('src', e.target.result);
    $('#pas_photo').attr('width', '250px');
    $('#pas_photo').attr('height', '230px');
};
</script>