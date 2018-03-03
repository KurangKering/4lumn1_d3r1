<div class="wrapper wrapper-content  animated fadeInRight ">
  <a href="<?php echo site_url() . 'informasi/tambah_informasi' ?>" class="btn btn-primary m-t">Tambah</a><br/><br> 
  <?php if (isset($kelola_informasi)): ?>


    <?php foreach ($kelola_informasi as $index => $value): ?>
     <div class="faq-item">
      <div class="row">
        <div class="col-md-12">

          <div class="table-responsive">
            <table class="table table-hover issue-tracker" width="100%">
              <tbody>
                <tr>
                  <td class="project-people">
                    <a href=""><img  class="img-circle" src="<?php echo isset($value['gambar']) ? site_url() . 'assets/files/informasi/' . $value['gambar'] :'' ?>"></a>
                  </td>
                  <td class="issue-info">
                    <a data-toggle="collapse" href="#<?php echo $value['id'] ?>" class="faq-question" >

                      <?php echo $value['judul'] ?>


                    </a>
                  </td>
                  <td>

                  <?php if (!isset($value['id_fakultas'])): ?>
                      <span class="label label-primary">Umum</span>
                    <?php else: ?>
                      <span class="label label-info">Fakultas <?php echo $value['nama_fakultas'] ?></span>

                    <?php endif ?>

                  </td>

                  <td>
                    <?php $date = date('Y-m-d',strtotime($value['date_created'])); ?>
                    <?php echo tanggal_indo($date, true); ?>
                  </td>
                  <td width="2%">
                    <?php if ($value['aktif'] === 'Y'): ?>
                      <span class="label label-primary">Aktif</span>
                    <?php else: ?>
                      <span class="label label-danger">Tidak Aktif</span>

                    <?php endif ?>
                  </td>
                  <td width="2%">


                    <a href="<?php echo site_url() . 'informasi/ubah_informasi/' . $value['id'] ?>" title="" class="btn btn-lg block"><i class="fa fa-edit"></i></a>

                  </td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="<?php echo $value['id'] ?>" class="panel-collapse collapse ">
            <div class="faq-answer">
              <p>
              <?php if (!empty($value['gambar'])): ?>
                  <div class="ibox-content  border-left-right " >
                    <img alt="image" class="img-responsive" style="width:250px; height: 230px; margin: 0 auto;" src="<?php echo site_url() . 'assets/files/informasi/' . $value['gambar'] ?>">

                  </div>
                <?php endif ?>

                <div class="ibox-content">
                  <?php echo $value['isi']; ?>

                </div>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  <?php endforeach ?>
  <?php echo $this->pagination->create_links(); ?>

<?php endif ?>

</div>