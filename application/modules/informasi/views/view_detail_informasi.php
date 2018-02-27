
<style type="text/css" media="screen">
.article-title {

  text-align: center;
  margin: 40px 0 40px 0;
}
</style>

<div class="wrapper wrapper-content  animated fadeInRight article">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="ibox">
        <div class="ibox-content">
          <?php if (isset($informasi)): ?>
           <div class="text-center article-title">
            <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $informasi['date_created'] ?></span>
            <h1>
             <?php echo $informasi['judul']; ?>
           </h1>
           <span class="text-muted"><?php echo !empty($informasi['nama']) ? $informasi['nama'] : $informasi['user_deskripsi'] ?></span>
         </div>
         <?php if (!empty($informasi['gambar'])): ?>
           <div class="ibox-content  border-left-right " >
            <img class="img-responsive" style="width:500px; height: 400px; margin: 0 auto;" src="<?php echo site_url(). 'assets/files/informasi/' . $informasi['gambar']; ?>">
          </div>
        <?php endif ?>

        <div class="ibox-content">
          <?php echo $informasi['isi'];?>

        </div>

        <hr>
      <?php endif ?>







    </div>
  </div>
</div>
</div>


</div>