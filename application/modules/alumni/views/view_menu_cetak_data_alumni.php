<div class="wrapper wrapper-content animated fadeInDown">
	<div class="row">
		<?php if (isset($select)): ?>
			<form method="post" class="form-horizontal" enctype="multipart/form-data" action="alumni/cetak_data_alumni" target="_blank">
				<div class="col-md-6 col-md-offset-3">
					<div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-3 control-label">Fakulas</label>
							<div class="col-sm-9">
								<select name="fakultas"  class="form-control">
									<option value="">Semua Fakultas</option>
									<?php foreach ($select['fakultas'] as $key => $fakultas): ?>
										<option value="<?= $fakultas['id_fakultas'] ?>"><?= $fakultas['nama_fakultas']?></option>

									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="hr-line-dashed">
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jurusan</label>
							<div class="col-sm-9">
								<select name="jurusan" class="form-control">
									<option value="">Semua Jurusan</option>
								</select>
							</div>
						</div>
						<div class="hr-line-dashed">
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Angkatan</label>
							<div class="col-sm-9">
								<select name="angkatan" class="form-control">
									<option value="">Semua Angkatan</option>
									<?php foreach ($select['angkatan'] as $key => $angkatan): ?>
										<option value="<?= $angkatan['angkatan'] ?>"><?= $angkatan['angkatan']?></option>

									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="hr-line-dashed">
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tahun Lulus</label>
							<div class="col-sm-9">
								<select name="tahun_lulus" class="form-control">
									<option value="">Semua Tahun Lulus</option>
									<?php foreach ($select['tahun_lulus'] as $key => $tahun_lulus): ?>
										<option value="<?= $tahun_lulus['tahun_lulus'] ?>"><?= $tahun_lulus['tahun_lulus']?></option>

									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="hr-line-dashed">
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Periode</label>
							<div class="col-sm-9">
								<select name="periode_lulus" class="form-control">
									<option value="">Semua Periode</option>
									<?php foreach ($select['periode_lulus'] as $key => $periode_lulus): ?>
										<option value="<?= $periode_lulus['periode_lulus'] ?>"><?= $periode_lulus['periode_lulus']?></option>

									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="hr-line-dashed">
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Status Kerja</label>
							<div class="col-sm-9">
								<select name="status_pekerjaan" class="form-control">
									<option value="">Semua Status Kerja</option>
									<?php foreach ($select['status_pekerjaan'] as $key => $status_pekerjaan): ?>
										<option value="<?= $status_pekerjaan['id'] ?>"><?= $status_pekerjaan['keterangan_pekerjaan']?></option>

									<?php endforeach ?>

								</select>
							</div>
						</div>
						<div class="hr-line-dashed">

						</div>

						<div id="div-kerja" style="display: none">
							<div class="form-group">
								<label class="col-sm-3 control-label">Waktu Tunggu</label>
								<div class="col-sm-9">
									<div class="i-checks">
										<label> <input  type="radio" value="" checked name="id_waktu_tunggu"> <i></i> Semua Waktu Tunggu</label>
									</div>
									<?php foreach ($select['waktu_tunggu'] as $key => $waktu_tunggu): ?>
										<div class="i-checks">
											<label> <input  type="radio" value="<?= $waktu_tunggu['id']?>"  name="id_waktu_tunggu"> <i></i><?= $waktu_tunggu['keterangan_waktu_tunggu']?></label>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12 col-sm-offset-3 ">
								<button class="btn btn-info " type="reset">Reset</button>
								<button class="btn btn-primary " type="submit">Cetak Data</button>
							</div>
						</div>
					</div>
					
				</div>

				
			</form>
		<?php endif ?>
	</div>
</div>

<script type="text/javascript">

var jurusan = <?php echo json_encode($select['jurusan']) ?>;

$('select[name="fakultas"]').change(function() {
	$('select[name="jurusan"]').html('');

	$('select[name="jurusan"]').append($('<option>', {
		value : 0,
		text : 'Semua Jurusan',
	}));

	var id_fakultas = $(this).val();
	var jurusan_container = new Array();
	var index = 0;
	for (var i = 0; i < jurusan.length; i++) {
		if (jurusan[i].id_fakultas == id_fakultas) {

			$('select[name="jurusan"]').append($('<option>', {
				value : jurusan[i].id_jurusan,
				text : jurusan[i].nama_jurusan
			}));
		}
	};
});


$('select[name="status_pekerjaan"').change(function() {
	if ($(this).val() == 2 ) 
	{
		$('input[name="id_waktu_tunggu"]').filter('[value=""]').prop('checked', true);
		$('#div-kerja').show();
	}
	else 
	{
		$('input[name="id_waktu_tunggu"]').prop('checked', false);
		$('#div-kerja').hide();
	}
})
</script>
