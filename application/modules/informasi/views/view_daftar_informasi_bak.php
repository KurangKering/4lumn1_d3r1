<?php 
$jumlah_informasi = count($daftar_informasi);

$jumlah_col = ceil($jumlah_informasi/3);
$index = 0;
$count_informasi = '';
?>
<div class="wrapper wrapper-content  animated fadeInRight blog">
  <div class="row">
    <?php if (isset($daftar_informasi)): ?>
      <?php for ($i= $jumlah_col; $i > 0 ; $i--) { ?>
      <?php if ($jumlah_col == 1): ?>
       <?php $count_informasi = $jumlah_informasi; ?>
     <?php elseif ($jumlah_col == 2): ?>
       <?php if ($i == 2 || $jumlah_informasi % 3 == 0): ?>
         <?php $count_informasi = 3; ?>
       <?php else: ?>
         <?php $count_informasi = $jumlah_informasi % 3; ?>

       <?php endif ?>
     <?php endif ?>
     <div class="col-lg-6">
      <?php for ($j=0; $j < $count_informasi   ; $j++) { ?>
      <div class="ibox">
        <div class="ibox-content">
          <a href="<?php echo site_url() .  'informasi/lihat_informasi/' . $daftar_informasi[$index]['id'] ?>" class="btn-link">
            <h2>
             <?php echo $daftar_informasi[$index]['judul']; ?>
           </h2>
         </a>
         <div class="small m-b-xs">
          <strong>Adam Novak</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 28th Oct 2015</span>
        </div>
        <p>
          <?php echo word_limiter($daftar_informasi[$index]['isi']) ?>
        </p>

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
