<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-logo" src="<?= base_url() ?>assets/Admin/img/logo.png"/>
                        </div>
                    </li>
                    <li class="<?php if($active == 0) echo "active"?>">
                        <a href="<?=site_url('admin')?>"><i class="fa fa-th-large"></i> <span class="nav-label">User</span></a>
                    </li>
                    <li class="<?php if($active == 1) echo "active"?>">
                        <a href="<?=site_url('admin/perawat')?>"><i class="fa fa-diamond"></i> <span class="nav-label">perawat</span></a>
                    </li>
                    <li class="<?php if($active == 2) echo "active"?>">
                        <a href="<?=site_url('admin/nilaiMengaji')?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Nilai Mengaji</span></span></a>
                    </li>
                    <li class="<?php if($active == 3) echo "active"?>">
                        <a href="<?=site_url('admin/nilaiSholat')?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Nilai Praktik Sholat</span></a>
                    </li>
                    <li class="<?php if($active == 4) echo "active"?>">
                        <a href="<?=site_url('admin/nilaiTertulis')?>"><i class="fa fa-flask"></i> <span class="nav-label">Nilai Tertulis</span></a>
                    </li>
                    <li class="<?php if($active == 5) echo "active"?>">
                        <a href="<?=site_url('admin/hasilPerhitungan')?>"><i class="fa fa-edit"></i> <span class="nav-label">Perhitungan</span></a>
                    </li>
                    <li class="<?php if($active == 7) echo "active"?>">
                        <a href="<?=site_url('admin/rangking')?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Rangking</span></a>
                    </li>
                    <li class="<?php if($active == 6) echo "active"?>">
                        <a href="<?=site_url('admin/timeline')?>"><i class="fa fa-user"></i> <span class="nav-label">Timeline</span></a>
                    </li>
            </div>
        </nav>
    </div>