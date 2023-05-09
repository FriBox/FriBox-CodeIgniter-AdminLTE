<!DOCTYPE html>
<html lang="<?=$xFWLang?>" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | <?=lang('default.txt_Appname')?></title>
    <!-- Google Font: Source Sans Pro --><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-pro@4.5.11/400.css">
    <!-- Font Awesome Icons --><link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons --><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@2.0.1/css/ionicons.min.css">
    <!-- Theme style --><link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
    <!-- jQuery --><script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap --><script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE --><script src="AdminLTE/dist/js/adminlte.min.js"></script>
    <?php include('Admin-Header.php'); ?>
    <?php include('Admin-Memu.php'); ?>

    <script type="text/javascript">localStorage.setItem('AdminLTE:Demo:MessageShowed', (Date.now()) + (15 * 60 * 1000)); //不显示Demo提示</script>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 1080px;">
        <!-- Brand Logo -->
        <a href="#" class="brand-link"><img src="AdminLTE/dist/img/AdminLTELogo.png" alt="FriBox CI-AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"><span class="brand-text font-weight-light">FriBox CI-AdminLTE</span></a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex"><div class="image"><img src="AdminLTE/dist/img/User1-160x160.jpg" class="img-circle elevation-2" alt="User Image"></div><div class="info"><a href="#" class="d-block">Nikola Tesla</a></div></div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>Demo<span class="right badge badge-danger">New</span></p></a></li>
                    <li class="nav-header">EXAMPLES</li><li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon far fa-calendar-alt"></i><p>Calendar<span class="badge badge-info right">2</span></p></a></li>
                    <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-circle nav-icon"></i><p>Level 1-1</p></a></li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-circle"></i><p>Level 1-2<i class="right fas fa-angle-left"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="padding-left: 10px;"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Level 2-1</p></a></li>
                            <li class="nav-item" style="padding-left: 10px;">
                                <a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Level 2-2<i class="right fas fa-angle-left"></i></p></a>
                                <ul class="nav nav-treeview"><li class="nav-item" style="padding-left: 20px;"><a href="#" class="nav-link"><i class="far fa-dot-circle nav-icon"></i><p>Level 3-1</p></a></li><li class="nav-item" style="padding-left: 20px;"><a href="#" class="nav-link"><i class="far fa-dot-circle nav-icon"></i><p>Level 3-2</p></a></li></ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1 class="m-0">Dashboard</h1></div><!-- /.col -->
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">Dashboard</li></ol></div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0"><div class="d-flex justify-content-between"><h3 class="card-title">Online Store Visitors</h3><a href="javascript:void(0);">View Report</a></div></div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column"><span class="text-bold text-lg">820</span><span>Visitors Over Time</span></p>
                                    <p class="ml-auto d-flex flex-column text-right"><span class="text-success"><i class="fas fa-arrow-up"></i> 12.5%</span><span class="text-muted">Since last week</span></p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="position-relative mb-4"><canvas id="visitors-chart" height="200"></canvas></div>
                                <div class="d-flex flex-row justify-content-end"><span class="mr-2"><i class="fas fa-square text-primary"></i> This Week</span><span><i class="fas fa-square text-gray"></i> Last Week</span></div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0"><div class="d-flex justify-content-between"><h3 class="card-title">Sales</h3><a href="javascript:void(0);">View Report</a></div></div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column"><span class="text-bold text-lg">$18,230.00</span><span>Sales Over Time</span></p>
                                    <p class="ml-auto d-flex flex-column text-right"><span class="text-success"><i class="fas fa-arrow-up"></i> 33.1%</span><span class="text-muted">Since last month</span></p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="position-relative mb-4"><canvas id="sales-chart" height="200"></canvas></div>
                                <div class="d-flex flex-row justify-content-end"><span class="mr-2"><i class="fas fa-square text-primary"></i> This year</span><span><i class="fas fa-square text-gray"></i> Last year</span></div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <style type="text/css"> .mb-4, .my-4 {margin-bottom: 0.9rem!important; } input[type=checkbox], input[type=radio] { vertical-align: middle; } </style>
    <aside class="control-sidebar control-sidebar-dark" style="font-size: 14px;line-height: 16px;"><!-- Control sidebar content goes here --></aside>
    <!-- /.control-sidebar -->

    <!-- OPTIONAL SCRIPTS --><script src="AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes --><script src="AdminLTE/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) --><script src="AdminLTE/dist/js/pages/dashboard.js"></script>

    <?php include('Admin-Footer.php'); ?>
    </div>
</body>
</html>
