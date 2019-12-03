<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$title?></title>

    <link href="<?= base_url() ?>assets/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Admin/font-awesome/css/font-awesome.css" rel="stylesheet">

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
            <h2>Log in</h2>
            <form class="m-t" role="form" method="post" action="<?=site_url("login")?>">
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary block full-width m-b">Login</button>

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
