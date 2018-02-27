<div class="wrapper wrapper-content  animated fadeInRight ">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <form method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group"><label class="col-sm-1 control-label">Judul </label>
            <div class="col-sm-10"><input type="text" name="judul" class="form-control">
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
                  <input type="file" id="gambar" name="gambar" />
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
          <div class="hr-line-dashed"></div>
          <div class="form-group"><label class="col-sm-1 control-label">Isi</label>
          <div class="col-sm-10">
            <textarea id="ckeditor" name="isi" class="form-control" required></textarea>

          </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group"><label class="col-sm-1 control-label">Publikasi </label>
        <div class="col-sm-10"><select name="aktif" class="form-control">
          <option value="1">Ya</option>
          <option value="0">Tidak</option>
          option
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
        <a class="btn btn-white" href="<?php echo base_url() . 'berita/berita_saya' ?>">Cancel</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {


  var ckeditor = CKEDITOR.replace('isi', {
    height: '600px'
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


});

function imageIsLoaded(e) {
  $('#photo_gambar').attr('src', e.target.result);
  $('#photo_gambar').attr('width', '250px');
  $('#photo_gambar').attr('height', '230px');
};
</script>