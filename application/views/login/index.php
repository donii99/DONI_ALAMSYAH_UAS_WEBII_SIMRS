<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SIMRS Sederhana">
    <meta name="author" content="">
    <title>SIMRS - Masuk</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/simplebar.css'); ?>">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/feather.css'); ?>">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app-light.css'); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app-dark.css'); ?>" id="darkTheme" disabled>
</head>
<body class="light">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-lg-3 col-md-4 col-10">
            <div class="form-wrapper border rounded-lg p-4 shadow">
                <form class="text-center" method="post" action="<?php echo base_url('login'); ?>">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?php echo base_url('login'); ?>">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                            </g>
                        </svg>
                    </a>
                    <h1 class="h6 mb-3">Masuk SIMRS</h1>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Kata Sandi" required>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="ingat_saya" value="1"> Ingat Saya
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fe fe-log-in"></i> Masuk</button>
                    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?> SIMRS</p>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>