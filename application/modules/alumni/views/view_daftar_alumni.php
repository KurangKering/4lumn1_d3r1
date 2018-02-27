<div class="wrapper wrapper-content  animated fadeInRight ">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <table id="table-dafftar-alumni" class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th>Tahun Lulus/Periode</th>
                <th>Action</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal inmodal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content animated bounceInRight">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       <h4 class="modal-title">Detail Alumni</h4>
       
     </div>
     <div class="modal-body">
       <table width="100%" border="0">
        <tbody><tr>
          <td align="center" width="30%" valign="top"><img id="previewing" style="border:6px solid #fff;  max-height:210px; box-shadow: 0px 1px 1px rgba(50,50,50, 0.4); -webkit-box-shadow: 0px 1px 1px rgba(50,50,50, 0.4); -moz-box-shadow:   0px 1px 1px rgba(50,50,50, 0.4);">
            <div style="font-size:12px; padding-top:3px; font-style:italic;"><!-- (Budiman Trafira) --></div>
          </td>
          <td valign="top">
            <table style="padding-left: 2px; padding-right: 13px;" width="100%" border="0">
              <tbody><tr>
                <td class="font-bold" width="25%" valign="top">NPM</td>
                <td width="2%">:</td>
                <td ><span id="npm"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Nama</td>
                <td>:</td>
                <td style="color: rgb(118, 157, 29); font-weight:bold"><span id="nama"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Jenis Kelamin</td>
                <td>:</td>
                <td><span id="jenis_kelamin"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Tempat/Tanggal Lahir</td>
                <td>:</td>
                <td><span id="ttl"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Alamat</td>
                <td>:</td>
                <td><span id="alamat"></span></td>
              </tr>
              <tr>
                <td class="font-bold">No HP</td>
                <td>:</td>
                <td><span id="no_hp"></span></td>
              </tr>
              <tr>  <tr>
                <td class="font-bold">Email</td>
                <td>:</td>
                <td><span id="email"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Fakultas</td>
                <td>:</td>
                <td><span id="nama_fakultas"></span></td>
              </tr>
              <tr>
                <td class="font-bold" valign="top">Prodi</td>
                <td valign="top">:</td>
                <td><span id="jurusan"></span></td>
              </tr>
              <tr>
                <td class="font-bold" valign="top">Tahun Lulus</td>
                <td valign="top">:</td>
                <td><span id="tahun_lulus"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Tanggal Sidang</td>
                <td>:</td>
                <td><span id="tanggal_sidang"></span></td>
              </tr>
              
              <tr>
                <td class="font-bold" valign="top">Judul Skripsi</td>
                <td valign="top">:</td>
                <td style="font-size: 12px;text-align: justify;line-height: 20px; text-transform: uppercase"><span id="judul_skripsi"></span></td>
              </tr>
              <tr>
                <td class="font-bold">Status Kerja</td>
                <td>:</td>
                <td><span id="status_kerja"></span></td>
              </tr>
              <tr class="kerja">
                <td class="font-bold">Nama Instansi</td>
                <td>:</td>
                <td><span id="nama_instansi"></span></td>
              </tr>
              <tr class="kerja">
                <td class="font-bold">Alamat Instansi</td>
                <td>:</td>
                <td><span id="alamat_instansi"></span></td>
              </tr>
              <tr class="kerja">
                <td class="font-bold">Waktu Tunggu </td>
                <td>:</td>
                <td><span id="waktu_tunggu"></span></td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>  
    </div>
    <div class="modal-footer">
      <button type="button" id="btn-tolak" class="btn btn-info"  data-dismiss="modal" >Close</button>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">

$(document).ready(function() {
 $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
 {
  return {
    "iStart": oSettings._iDisplayStart,
    "iEnd": oSettings.fnDisplayEnd(),
    "iLength": oSettings._iDisplayLength,
    "iTotal": oSettings.fnRecordsTotal(),
    "iFilteredTotal": oSettings.fnRecordsDisplay(),
    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
  };
};

var table_daftar_alumni = $('#table-dafftar-alumni').DataTable({ 
 "bAutoWidth": false ,
 "processing": true, 
 "serverSide": true, 
 "order": [], 

 "ajax": {
  "url": '<?php echo site_url('alumni/json_get_daftar_alumni'); ?>',
  "type": "POST"
},
"columns": [
{"data" : "nomor" ,
"orderable": false},
{"data": "npm"},
{"data": "nama"},
{"data": "nama_jurusan"},
{"data": "nama_fakultas"},
{"data": "tahun_lulus_periode"},
{"data": "detail",
"orderable": false}
],
'columnDefs': [
{
  "targets": 0,
  "className": "text-center",
},
{
  "targets": 5,
  "className": "text-center",
},
{
  "targets": 6,
  "className": "text-center",
  "width": "5%"
}
],
order: [[1, 'desc']],
rowCallback: function(row, data, iDisplayIndex) {
  var info = this.fnPagingInfo();
  var page = info.iPage;
  var length = info.iLength;
  var index = page * length + (iDisplayIndex + 1);
  $('td:eq(0)', row).html(index);
}

});



});

function show_detail(id)
{
  $('#modal-detail').modal('show');
}


function showPleaseWait() {
  var modalLoading = '<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false role="dialog">\
  <div class="modal-dialog" id="modal-dialog">\
  <div class="modal-content">\
  <div class="modal-header">\
  <h4 class="modal-title">Mohon Tunggu...</h4>\
  </div>\
  <div class="modal-body">\
  <div class="progress">\
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"\
  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; height: 40px">\
  </div>\
  </div>\
  </div>\
  </div>\
  </div>\
  </div>';
  $(document.body).append(modalLoading);
  $("#pleaseWaitDialog").modal("show");
}


function hidePleaseWait() {
  $("#pleaseWaitDialog").modal("hide");
}

function showModals( npm )
{
  showPleaseWait();
  clearModals();

  $.ajax({
    type: "POST",
    url: "<?php echo base_url('alumni/json_get_detail_alumni'); ?>",
    dataType: 'json',
    data: {npm:npm},
    success: function(res) {
      hidePleaseWait();
      setModalData(res);
      console.log(res);
    }
  });


}function setModalData( data )
{
  $("#npm").text(data.npm);
  $("#nama").text(data.nama);
  $("#email").text(data.email);
  $("#jenis_kelamin").text(data.jenis_kelamin);
  $("#jurusan").text(data.nama_jurusan);
  $("#angkatan").text(data.angkatan);
  $("#tahun_lulus").text(data.tahun_lulus);
  $("#periode_lulus").text(data.periode_lulus);
  $("#ttl").text(data.ttl);
  $("#previewing").attr('src', '<?php echo site_url() . 'assets/files/alumni/' ?>' + data.photo);
  $("#nama_fakultas").text(data.nama_fakultas);

  $("#no_hp").text(data.no_hp);
  $("#alamat").text(data.alamat);
  $("#judul_skripsi").text(data.judul_skripsi);
  $("#tanggal_sidang").text(data.tanggal_sidang);
  $("#btn-tolak").data("npm",data.npm);
  $("#btn-setuju").data("npm",data.npm);

  $("#status_kerja").text(data.keterangan_pekerjaan);
  if (data.id_status_pekerjaan != '2') 
  {
    $('.kerja').css('visibility', 'hidden');
  } else 
  if (data.id_status_pekerjaan == '2') 
  {
    $('.kerja').css('visibility', 'visible');

  }

  $("#nama_instansi").text(data.nama_instansi);
  $("#alamat_instansi").text(data.alamat_instansi);
  $("#waktu_tunggu").text(data.waktu_tunggu);

  $("#modal-detail").modal("show");
}
function clearModals()
{
  $("#npm").text("");
  $("#nama").text("");
  $("#email").text("");
  $("#jenis_kelamin").text("");
  $("#jurusan").text("");
  $("#angkatan").text("");
  $("#tahun_lulus").text("");
  $("#periode_lulus").text("");
  $("#ttl").text("");
  $("#previewing").attr('src', '');

  $("#no_hp").text("");
  $("#alamat").text("");
  $("#judul_skripsi").text("");
  $("#nama_fakultas").text("");

  $("#tanggal_sidang").text("");
  $("#status_pekerjaan").text("");
  $("#nama_instansi").text("");
  $("#alamat_instansi").text("");
  $("#waktu_tunggu").text("");
  $("#btn-tolak").data("npm","");
  $("#btn-setuju").data("npm","");

}

</script>
