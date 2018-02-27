<style type="text/css" media="screen">
#photo_gambar {
  width: 250px;
  height: 230px;
}
</style>
<div class="wrapper wrapper-content  animated fadeInRight ">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<input type="hidden" name="id_gallery" value="<?php echo $gallery['id_gallery'] ?>">
						<input type="hidden" name="nama_file" value="<?php echo $gallery['nama_file'] ?>">
						<div class="form-group"><label class="col-sm-1 control-label">Judul </label>
						<div class="col-sm-10"><input type="text" name="judul" class="form-control" value="<?php echo $gallery['judul'] ?>">
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
									<input type="file" id="nama_file" name="nama_file" />
								</span>
								<a href="#" class="input-group-addon btn btn-default fileinput-exists" id="remove" data-dismiss="fileinput">Remove</a>
							</div> 

						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">Preview</label>
						<div class="col-sm-10">
							<div class="m-b-sm">
								<img  class="" id="photo_gambar" src="<?php echo isset($gallery['nama_file']) ? site_url() . 'assets/files/gallery/' . $gallery['nama_file'] : '' ?> ">
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<a class="btn btn-white" href="<?php echo base_url() . 'gallery/daftar_gallery' ?>">Cancel</a>
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

	var image_original = "<?php echo isset($gallery['nama_file']) ? site_url() . 'assets/files/gallery/' . $gallery['nama_file'] : '' ?>";
	$("#nama_file").change(function() {
		var file = this.files[0];
		var imagefile = file.type;
		var fileSize = file.size / 1000 ;
		var match= ["image/jpeg","image/png","image/jpg"];
		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])) ||  fileSize > 1500)
		{
			$('#photo_gambar').attr('src','');
			$("#nama_file").val("");
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
		$('#photo_gambar').attr('src', image_original);
		if (image_original != '') {
			$('#photo_gambar').attr('width', '250px');
			$('#photo_gambar').attr('height', '230px');
		} else 
		if (image_original == '') {
			$('#photo_gambar').attr('width', '');
			$('#photo_gambar').attr('height', '');
		}
	});

});

function imageIsLoaded(e) {
	$('#photo_gambar').attr('src', e.target.result);
	$('#photo_gambar').attr('width', '250px');
	$('#photo_gambar').attr('height', '230px');
};
</script>