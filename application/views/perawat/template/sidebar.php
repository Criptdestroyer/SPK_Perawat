<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="<?= base_url() ?>assets/Admin/img/profile_small.jpg"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><?=$username?></span>
                            </a>
                        </div>
                    </li>
                    <li class="<?php if($active == 0) echo "active"?>">
                        <a href="<?=site_url('perawat')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="<?php if($active == 1) echo "active"?>">
                        <a href="<?=site_url('perawat/updatePerawat')?>"><i class="fa fa-diamond"></i> <span class="nav-label">perawat</span></a>
                    </li>
                    <li class="<?php if($active == 2) echo "active"?>">
                        <a href="<?=site_url('perawat/sertifikat')?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Sertifikat</span></span></a>
                    </li>
            </div>
        </nav>
    </div>