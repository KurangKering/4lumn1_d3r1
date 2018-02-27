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
            <div class="dropdown profile-element"> <span>
              <img alt="image" class="img-circle" src="<?php echo site_url() . 'assets/template/inspinia_271/' ?>img/profile_small.jpg" />
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>#">
              <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Administrator</strong>
            </span>  </span> </a>
            
          </div>
          <div class="logo-element">
            IN+
          </div>
        </li>
        
        <li>
         <a href="<?php echo site_url() . 'admin/' ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
       </li>

       <li>
        <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Berita</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="<?php echo site_url() . 'berita/daftar_berita' ?>">Lihat Berita</a></li>
          <li><a href="<?php echo site_url() . 'berita/berita_saya' ?>">Berita Saya</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Gallery</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html">Lihat Gallery</a></li>
          <li><a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html">Gallery Saya</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Alumni</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="<?php echo site_url() . 'administrator/daftar_alumni'?>">Daftar Alumni</a></li>
          <li><a href="<?php echo site_url() . 'administrator/list_persetujuan_alumni' ?>">Persetujuan Alumni</a></li>
        </ul>
      </li>



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
        <a href="<?php echo site_url() . 'users/logout' ?>">
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
