<?php 
$username = $this->session->userdata('username');
$id_role = $this->session->userdata('id_role');
$user = '';
if (isset($username) && isset($id_role)) {
  if ($id_role == '11') {
    $this->db->select('alumni.nama as nama_user, role.nama as nama_role, alumni.photo');
    $this->db->from('alumni');
    $this->db->join('users', 'alumni.npm=users.username');
    $this->db->join('role', 'users.id_role = role.id_role');
    $this->db->where('users.id_role = role.id_role');
    $this->db->where('npm', $username);
    $user = $this->db->get()->row_array();

    $user['photo'] = site_url() . 'assets/files/alumni/'. $user['photo'];

  } else
  if (in_array($id_role, range(0,10))) {
    $this->db->select('role.nama as nama_role');
    $this->db->where('role.id_role', $id_role);
    $user = $this->db->get('role')->row_array();
    $user['nama_user'] = null;
    $user['photo'] = site_url() . 'assets/files/images/User Role Administrator.png' ;
  }
  

}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> - </title>

  <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>font-awesome/css/font-awesome.css" rel="stylesheet">

  <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/animate.css" rel="stylesheet">
  <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/style.css" rel="stylesheet">

  <?php echo $css; ?>
  <!-- Mainly scripts -->
  <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/bootstrap.min.js"></script>
  <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/inspinia.js"></script>
  <script src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>js/plugins/pace/pace.min.js"></script>

  <?php echo $js; ?>
</head>

<body class="">

  <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class=" profile-element"> <span>
              <?php if (isset($user['photo'])): ?>
                <img alt="image" class="img-circle" style="width: 48px; height: 48px;" src="<?php echo $user['photo']; ?>" />
              <?php endif ?>
              
            </span>
            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo isset($user['nama_user']) ? $user['nama_user'] : '' ?></strong>
          </span> <span class="text-muted text-xs block"><?php echo isset($user['nama_role']) ? $user['nama_role'] : '' ?></span> </span> </a>

        </div>
        <div class="logo-element">
          IN+
        </div>
      </li>
      <!--  Struktur Menu Alumni-->
      <?php if ($id_role == '10'): ?>

        <li>
          <a href="<?php echo site_url() . 'dashboard' ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
        </li>
        <li>
          <a href="<?php echo site_url() . 'alumni/daftar_alumni' ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Daftar Alumni</span></a>
        </li>
        <li>
          <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Gallery</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="<?php echo site_url() . 'gallery/daftar_gallery' ?>">Lihat Gallery</a></li>
            <li><a href="<?php echo site_url() . 'gallery/kelola_gallery' ?>">Kelola Gallery</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Seputar Kampus</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="<?php echo site_url() . 'berita/daftar_berita' ?>">Lihat Seputar Kampus</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Informasi</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="<?php echo site_url() . 'informasi/daftar_informasi' ?>">Lihat Informasi</a></li>
            <li><a href="<?php echo site_url() . 'informasi/kelola_informasi' ?>">Kelola Informasi</a></li>
          </ul>
        </li>
        
        <li>
          <a href="<?php echo site_url() . 'alumni/profile' ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Profile</span></a>
        </li>
        <!-- administrator -->
      <?php elseif ($id_role == '0') : ?>
        <li>
          <a href="<?php echo site_url() . 'dashboard' ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
        </li>
        <li>
          <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Informasi</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="<?php echo site_url() . 'informasi/daftar_informasi' ?>">Lihat Informasi</a></li>
            <li><a href="<?php echo site_url() . 'informasi/kelola_informasi' ?>">Kelola Informasi</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Berita</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="<?php echo site_url() . 'berita/daftar_berita' ?>">Lihat Berita</a></li>
            <li><a href="<?php echo site_url() . 'berita/kelola_berita' ?>">Kelola Berita</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Alumni</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="<?php echo site_url() . 'alumni/daftar_alumni'?>">Daftar Alumni</a></li>
            <li><a href="<?php echo site_url() . 'alumni/menu_cetak_data_alumni'?>">Cetak Data Alumni</a></li>
            <li><a href="<?php echo site_url() . 'administrator/grafik' ?>">Grafik Pekerjaan Alumni</a></li>
            <li><a href="<?php echo site_url() . 'administrator/list_persetujuan_alumni' ?>">Persetujuan Alumni</a></li>
          </ul>
        </li>
      <?php else: ?>

      <?php endif ?>
      
      

      




    </ul>

  </div>
</nav>

<div id="page-wrapper" class="gray-bg">
  <div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>#"><i class="fa fa-bars"></i> </a>

      </div>
      <ul class="nav navbar-top-links navbar-right">


       <li>
        <a href="<?php echo site_url() . 'users/logout/' ?> ">
          <i class="fa fa-sign-out"></i> Log out
        </a>
      </li>
    </ul>

  </nav>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2><?php echo isset($title) ? $title  : '' ?></h2>

  </div>

</div>

<?php echo $content; ?>
<div class="footer">
  <div>
    <strong></strong>  &copy; 2017
  </div>
</div>

</div>
</div>



</body>

</html>
