<?php $source = site_url() . 'assets/files/gallery/'; ?>
<?php $thumb = $source . 'thumb/';?>
<div class="wrapper wrapper-content animated fadeInRight">
    <a id="btn-tambah" class="btn btn-primary m-t">Tambah</a><br/><br> 
    <div id="div-tambah-gallery" style="display: none">
      <div class="ibox float-e-margins">
          <div class="ibox-content">
            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url() . 'gallery/tambah_gallery' ?>">
              <div class="form-group"><label class="col-sm-1 control-label">Judul </label>
              <div class="col-sm-10"><input required type="text" name="judul" class="form-control">
              </div>
          </div>
          <div class="hr-line-dashed"></div>
          <div class="form-group">
              <label class="col-sm-1 control-label">Gambar</label>
              <div class="col-sm-10">
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                  <div class="form-control" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-default btn-file">
                    <span class="fileinput-new">Select file</span>
                    <span class="fileinput-exists">Change</span>
                    <input required type="file" id="gambar" name="gambar" />
                </span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" id="remove" data-dismiss="fileinput">Remove</a>
            </div> 

        </div>
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">Preview</label>
      <div class="col-sm-10">
        <div class="m-b-sm">
          <img  class="" id="photo_gambar" src="">
      </div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-4 col-md-offset-5">
    <button class="btn btn-primary" type="submit">Simpan</button>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="row">
    <?php foreach ($kelola_gallery as $key => $value): ?>

        <div class="col-lg-3">
            <div class="contact-box center-version">

             <a class="image-popup-vertical-fit" href="<?php echo $source . $value['nama_file']; ?>" title="<?php echo $value['judul']; ?>">
                <img src="<?php echo $thumb . $value['nama_file']; ?>" />
                <address class="m-t-md">
                    <?php echo $value['judul']; ?>
                </address>
            </a>

            <div class="contact-box-footer">
                <div class="m-t-md btn-group">
                    <a class="btn btn-md btn-warning" href="<?php echo site_url() . 'gallery/ubah_gallery/' . $value['id_gallery'] ?>"></i> Ubah</a><a class="btn btn-md btn-danger" href="<?php echo site_url() . 'gallery/hapus_gallery/' . $value['id_gallery'] ?>"></i> Hapus</a>
                </div>
            </div>
        </div>

    </div>
<?php endforeach ?>

</div>
<?php echo $this->pagination->create_links(); ?>

</div>



<script type="text/javascript">
$('.image-popup-vertical-fit').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  mainClass: 'mfp-img-mobile',
  image: {
    verticalFit: true
}

});

$('#btn-tambah').click(function(event) {
    event.preventDefault();
    $('#div-tambah-gallery').toggle();  
});

$("#gambar").change(function() {
    var file = this.files[0];
    var imagefile = file.type;
    var fileSize = file.size / 1000 ;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])) ||  fileSize > 1500)
    {
      $('#photo_gambar').attr('src','');
      $("#gambar").val("");
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
   $('#photo_gambar').attr('src', "");
   $('#photo_gambar').attr('width', '');
   $('#photo_gambar').attr('height', '');
});


function imageIsLoaded(e) {
  $('#photo_gambar').attr('src', e.target.result);
  $('#photo_gambar').attr('width', '250px');
  $('#photo_gambar').attr('height', '230px');
};
</script>