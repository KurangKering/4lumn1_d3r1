
<div class="wrapper wrapper-content  animated fadeInRight blog">

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">

        <div class="ibox-content">

          <div class="table-responsive">
            <table class="table table-hover issue-tracker">
              <tbody>
                <?php if (isset($daftar_informasi)): ?>
                  <?php foreach ($daftar_informasi as $key => $informasi): ?>
                    
                    <tr>
                      <td class="project-people">
                        <a href=""><img  class="img-circle" src="<?php echo isset($informasi['gambar']) ? site_url() . 'assets/files/informasi/' . $informasi['gambar'] :'' ?>"></a>
                      </td>
                      <td class="issue-info">
                        <a href="<?php echo site_url() . 'informasi/lihat_informasi/' . $informasi['id'] ?>">
                          <?php echo $informasi['judul'] ?>
                        </a>

                        <small></small>
                      </td>
                      <td>
                        <?php echo !empty($informasi['nama'])  ? $informasi['nama'] : $informasi['nama_role'];  ?>
                      </td>
                      <td>
                        <?php $date = date('Y-m-d',strtotime($informasi['date_created'])); ?>
                        <?php echo tanggal_indo($date, true); ?>
                      </td>
                      <td>
                        <?php if ($informasi['id_fakultas'] === '0'): ?>
                          <span class="label label-primary">Umum</span>
                        <?php else: ?>
                          <span class="label label-info">Fakultas <?php echo $informasi['nama_fakultas'] ?></span>

                        <?php endif ?>

                      </td>
                      
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="row">

    <?php echo $this->pagination->create_links(); ?>
  </div>

</div>
