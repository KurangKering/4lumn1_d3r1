<?php 

$jumlah_berita = count($daftar_berita);

$jumlah_col = ceil($jumlah_berita/2);
$index = 0;
$count_berita = '';
?>
<div class="wrapper wrapper-content  animated fadeInRight blog">
  <div class="row">
    <?php if (isset($daftar_berita)): ?>
      <?php for ($i= $jumlah_col; $i > 0 ; $i--) { ?>

      <?php if ($jumlah_col == 1): ?>
       <?php $count_berita = $jumlah_berita; ?>

     <?php elseif ($jumlah_col > 1 ): ?>
      <?php if ($i == 3  || $i == 2 || $i ==  1 && $jumlah_berita % 2 == 0): ?>
       <?php $count_berita = 2; ?>
     <?php else: ?>
       <?php $count_berita = $jumlah_berita % 2; ?>
     <?php endif ?>

   <?php endif ?>
   <div class="col-lg-4">
    <?php for ($j=0; $j < $count_berita   ; $j++) { ?>
    <div class="ibox">
      <div class="ibox-content">
        <a href="<?php echo site_url() .  'berita/lihat_berita/' . $daftar_berita[$index]['id'] ?>" class="btn-link">
          <h2>
           <?php echo $daftar_berita[$index]['judul']; ?>
         </h2>
         <div class="small m-b-xs">
          <strong><?php echo $daftar_berita[$index]['nama_role'] ?></strong> , <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo tanggal_indo(date('Y-m-d', strtotime($daftar_berita[$index]['date_created'])), true) ?></span>
        </div>
        <div class="ibox-content no-padding border-left-right">
          <?php if (!empty($daftar_berita[$index]['gambar'])): ?>
            <img alt="image" class="img-responsive" width="100%" height="50%" src="<?php echo isset($daftar_berita[$index]['gambar']) ? site_url() . 'assets/files/berita/'. $daftar_berita[$index]['gambar'] : '' ?>">
          <?php else: ?>
            <img alt="image" class="img-responsive" width="100%" height="50%" src="<?php echo site_url() . 'assets/files/images/Empty.png' ?>">
          <?php endif ?>
        </div>
        <p>
          <?php echo word_limiter($daftar_berita[$index]['isi']) ?>
        </p>
      </a>

    </div>
  </div>
  <?php $index++; ?>
  <?php } ?>
</div>
<?php } ?>
<?php endif ?>
</div>


<div class="row">

  <?php echo $this->pagination->create_links(); ?>
</div>

</div>
