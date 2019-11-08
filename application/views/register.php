<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="<?= base_url() ?>assets/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg" style="background-image: url('<?= base_url() ?>assets/Admin/img/rs.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-size: 100% 100%;">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">SPK</h1>
            </div>
            <h3>Register</h3>
            <form class="m-t" role="form" method="post" action="<?=site_url('register')?>">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?=site_url('login')?>">Login</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/Admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>assets/Admin/js/plugins/iCheck/icheck.min.js"></script>
</body>

</html>
