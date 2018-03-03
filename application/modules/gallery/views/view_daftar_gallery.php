<?php $source = site_url() . 'assets/files/gallery/'; ?>
<?php $thumb = $source . 'thumb/'; ?> 
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">

				<div class="ibox-content">
					<?php if (isset($gallery)): ?>
						<div class="lightBoxGallery">
							<?php foreach ($gallery as $key => $gall): ?>
								<a href="<?php echo $source . $gall['nama_file'] ?>" title="<?php echo $gall['judul'] ?> By <?php echo $gall['nama'] ?>" data-gallery=""><img src="<?php echo $thumb . $gall['nama_file']?>"></a>
							<?php endforeach ?>
							
							
							<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
								<div class="slides"></div>
								<h3 class="title"></h3>

								<a class="prev">‹</a>
								<a class="next">›</a>
								<a class="close">×</a>
								<a class="play-pause"></a>
								<ol class="indicator"></ol>
							</div>

						</div>
					<?php endif ?>
					


				</div>

			</div>

		</div>

	</div>
	<?php echo $this->pagination->create_links(); ?>
	

</div>
