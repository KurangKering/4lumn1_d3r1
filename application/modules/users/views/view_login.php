<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Alumni UIR</title>

    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo site_url() . 'assets/template/inspinia_271/' ?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">

        <div class="col-md-6 col-md-offset-3">
            <div class="ibox-content">
                <table>
                  <tr>
                    <td width="20%" rowspan="2"><img src="<?php echo site_url(). 'assets/files/images/logo.png' ?>" style="width: 90%;"></td>
                    <td><strong class="intitution" style="font-size: 120%;"> UNIVERSITAS ISLAM RIAU</strong></td>
                </tr>
                <tr valign="top" style="line-height: 75%;">
                    <td><span style="font-size: 10px;">Jl. Kaharuddin Nst No.113, Simpang Tiga, Bukit Raya, Kota Pekanbaru, Riau</span></td>
                </tr>
            </table>
             <hr>
            <?php if (!empty($error)): ?>

                <div class="alert alert-warning alert-dismissible" role="alert">
                  <?php echo $error;?>
                </div>
            <?php endif ?>
            <form class="m-t" role="form" method="post">


                <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                    </span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-lock">
                      </span>
                  </span>
                  <input type="password" name="password" class="form-control" placeholder="Password" required="">
              </div>
          </div>

          <button type="submit" class="btn btn-primary block full-width m-b">Login</button>



          <p class="text-muted text-center">
            <small>Anda Alumni UIR Tapi Belum Punya Akun ?</small>
        </p>
        <a class="btn btn-sm  btn-block" href="<?php echo site_url() . 'register' ?>">Registrasi Disini</a>
    </form>

</div>
</div>
</div>
<hr/>

</div>

</body>

</html>
