<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SIMRS Sederhana">
    <meta name="author" content="">
    <title>SIMRS - <?php echo isset($title) ? $title : 'Dashboard'; ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/simplebar.css'); ?>">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/feather.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.css'); ?>">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css'); ?>">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app-light.css'); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app-dark.css'); ?>" id="darkTheme" disabled>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
</head>
<body class="vertical light d-flex flex-column min-vh-100">
      <div class="wrapper d-flex flex-column flex-grow-1 h-100">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target=".modal-shortcut">
                        <span class="fe fe-grid fe-16"></span>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="<?php echo base_url('assets/images/avatar.jpg'); ?>" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Keluar</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?php echo base_url('dashboard'); ?>">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                            </g>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'receptionis'): ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('pasien'); ?>" class="nav-link">
                                <i class="fe fe-users fe-16"></i>
                                <span class="ml-3 item-text">Pasien</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'dokter'): ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('dokter'); ?>" class="nav-link">
                                <i class="fe fe-user fe-16"></i>
                                <span class="ml-3 item-text">Dokter</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('role') == 'admin'): ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('poli'); ?>" class="nav-link">
                                <i class="fe fe-trello fe-16"></i>
                                <span class="ml-3 item-text">Poli</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('users'); ?>" class="nav-link">
                                <i class="fe fe-user-check fe-16"></i>
                                <span class="ml-3 item-text">User</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('kunjungan'); ?>" class="nav-link">
                            <i class="fe fe-calendar fe-16"></i>
                            <span class="ml-3 item-text">Kunjungan</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
            <main role="main" class="main-content flex-grow-1">
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group list-group-flush my-n3">
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small><strong>Tidak ada notifikasi</strong></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body px-5">
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <a href="<?php echo base_url('dokter'); ?>">
                                        <div class="squircle bg-success justify-content-center">
                                            <i class="fe fe-user fe-32 align-self-center text-white"></i>
                                        </div>
                                        <p>Dokter</p>
                                    </a>
                                </div>
                                <div class="col-6 text-center">
                                    <a href="<?php echo base_url('pasien'); ?>">
                                        <div class="squircle bg-primary justify-content-center">
                                            <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                        </div>
                                        <p>Pasien</p>
                                    </a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <a href="<?php echo base_url('poli'); ?>">
                                        <div class="squircle bg-primary justify-content-center">
                                            <i class="fe fe-trello fe-32 align-self-center text-white"></i>
                                        </div>
                                        <p>Poli</p>
                                    </a>
                                </div>
                                <div class="col-6 text-center">
                                    <a href="<?php echo base_url('kunjungan'); ?>">
                                        <div class="squircle bg-primary justify-content-center">
                                            <i class="fe fe-calendar fe-32 align-self-center text-white"></i>
                                        </div>
                                        <p>Kunjungan</p>
                                    </a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <a href="<?php echo base_url('users'); ?>">
                                        <div class="squircle bg-primary justify-content-center">
                                            <i class="fe fe-user-check fe-32 align-self-center text-white"></i>
                                        </div>
                                        <p>users</p>
                                    </a>
                                </div>
                                <div class="col-6 text-center">
                                    <a href="#">
                                        <div class="squircle bg-primary justify-content-center">
                                            <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                        </div>
                                        <p>Settings</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php endif; ?>
