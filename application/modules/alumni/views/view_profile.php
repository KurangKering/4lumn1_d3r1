<div class="wrapper wrapper-content  animated fadeInRight ">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<form method="get" class="form-horizontal">
						<div class="row">
							<div class="col-md-3 border-right gray-bg">
								<div class="m-b-xl ">
									<img alt="image" class="" style="width: 100%;" id="previewing" src="<?php echo isset($profile['photo']) ? site_url() . 'assets/files/alumni/' . $profile['photo'] : '' ?>">
								</div>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-6 border-right">
										<div class="form-group">
											<label class="col-lg-4 control-label">NPM</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="npm"><?php echo isset($profile['npm']) ? $profile['npm'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Nama</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="nama"><?php echo isset($profile['nama']) ? $profile['nama'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">JK</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="jenis_kelamin"><?php echo isset($profile['jenis_kelamin']) ? $profile['jenis_kelamin'] === 'LK' ? 'Laki-Laki'  : 'Perempuan' : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">TTL</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="ttl"><?php echo isset($profile['ttl']) ? $profile['ttl'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Alamat</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="alamat"><?php echo isset($profile['alamat']) ? $profile['alamat'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">No HP</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="no_hp"><?php echo isset($profile['no_hp']) ? $profile['no_hp'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Email</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="email"><?php echo isset($profile['email']) ? $profile['email'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Tahun Lulus</label>
											<div class="col-lg-1">
												<p class="form-control-static" id="tahun_lulus"><?php echo isset($profile['tahun_lulus']) ? $profile['tahun_lulus'] : '' ?></p>
											</div>
											<label class="col-lg-2 control-label">Periode</label>
											<div class="col-lg-3">
												<p class="form-control-static" id="periode_lulus"><?php echo isset($profile['periode_lulus']) ? $profile['periode_lulus'] : '' ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-lg-4 control-label">Jurusan</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="jurusan"><?php echo isset($profile['nama_jurusan']) ? $profile['nama_jurusan'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Angkatan</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="angkatan"><?php echo isset($profile['angkatan']) ? $profile['angkatan'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Judul Skripsi</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="judul_skripsi"><?php echo isset($profile['judul_skripsi']) ? $profile['judul_skripsi'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Tanggal Sidang</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="tanggal_sidang"><?php echo isset($profile['tanggal_sidang']) ? $profile['tanggal_sidang'] : '' ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Status Kerja</label>
											<div class="col-lg-8">
												<p class="form-control-static" id="status_kerja"><?php echo isset($profile['keterangan_pekerjaan']) ? $profile['keterangan_pekerjaan'] : '' ?></p>
											</div>
										</div>
										<?php if (isset($profile['id_status_pekerjaan'])): ?>
											<?php if ($profile['id_status_pekerjaan'] === '2'): ?>
												<div class="form-group">
													<label class="col-lg-4 control-label">Nama Instansi</label>
													<div class="col-lg-8">
														<p class="form-control-static" id="nama_instansi"><?php echo isset($profile['nama_instansi']) ? $profile['nama_instansi'] : '' ?></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-4 control-label">Alamat Instansi</label>
													<div class="col-lg-8">
														<p class="form-control-static" id="alamat_instansi"><?php echo isset($profile['alamat_instansi']) ? $profile['alamat_instansi'] : '' ?></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-4 control-label">Waktu Tunggu</label>
													<div class="col-lg-8">
														<p class="form-control-static" id="waktu_tunggu"><?php echo isset($profile['waktu_tunggu']) ? $profile['waktu_tunggu'] : '' ?></p>
													</div>
												</div>
											<?php endif ?>
										<?php endif ?>
										
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<a  href="<?php echo site_url() . 'alumni/ubah_profile' ?>" id="btn-edit" class="btn btn-warning pull-right"   >Ubah</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
