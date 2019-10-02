<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPK Perawat | Login</title>

    <link href="<?= base_url() ?>assets/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/Admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SPK</h1>

            </div>
            <h3>Welcome to Our Website</h3>
            <p>Log in</p>
            <form class="m-t" role="form" action="<?=site_url("login")?>">
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="username" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?=site_url('register')?>">Create an account</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/Admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>

</body>

</html>
