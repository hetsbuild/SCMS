<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Dashboard.php';

$database = new Database();
$db = $database->getConnection();
// You can now use your models here

$dashboard = new Dashboard($db);

// Get counts
$newComplaintCount = $dashboard->getNewComplaintCount();
$assignedComplaintCount = $dashboard->getAssignedComplaintCount();
$closeComplaintCount = $dashboard->getCloseComplaintCount();
$activeComplaintCount = $dashboard->getActiveComplaintCount();
$todaysComplaintCount = $dashboard->getTodaysComplaintCount();
$activeTechnicianCount = $dashboard->getActiveTechnicianCount();
$activeDistributorCount = $dashboard->getActiveDistributorCount();
$activeDistributorCredentialsCount = $dashboard->getActiveDistributorCredentialsCount();
$activeCustomerCount = $dashboard->getActiveCustomerCount();

// Get complaints List
$todaysComplaints = $dashboard->getTodaysComplaints();
$activeComplaints = $dashboard->getActiveComplaints();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <?php require_once('../../includes/link.php')  ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php require_once('../../includes/preloder.php') ?>
        <?php require_once('../../includes/navbar.php') ?>
        <?php require_once('../../includes/asidde-st.php') ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Admin Dashbord</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">admin</li>
                                <li class="breadcrumb-item active">dashbord</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $closeComplaintCount ?></h3>

                                    <p>Closed Complaint</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo BASE_URL; ?>pages/complaint/show.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $newComplaintCount ?></h3>

                                    <p>New Complaints</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <a href="<?php echo BASE_URL; ?>pages/complaint/show.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $assignedComplaintCount ?></h3>

                                    <p>Assigned Complaints</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?php echo BASE_URL; ?>pages/complaint/show.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $activeComplaintCount ?></h3>

                                    <p>Active Complaints</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?php echo BASE_URL; ?>pages/complaint/show.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Actice Technicians</span>
                                    <span class="info-box-number">
                                        <?php echo $activeTechnicianCount ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Actice Dealers</span>
                                    <span class="info-box-number"><?php echo $activeDistributorCount ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Actice Dealers Credentials</span>
                                    <span class="info-box-number"><?php echo $activeDistributorCredentialsCount ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Active Customer</span>
                                    <span class="info-box-number"><?php echo $activeCustomerCount ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Today's Complaints <span class="badge badge-primary"> <?php echo $todaysComplaintCount ?> </span>
                                    </h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content p-0 table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Complaint No.</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Mo. No.</th>
                                                    <th>Call Type</th>
                                                    <th>Service Type</th>
                                                    <th style="width: 40px">Status</th>
                                                </tr>
                                            </thead>
                                            <?php if (count($todaysComplaints) > 0): ?>
                                                <?php foreach ($todaysComplaints as $index => $complaint): ?>
                                                    <?php
                                                    // Determine the badge class based on the complaint status
                                                    $statusClass = '';
                                                    switch ($complaint['callstatus']) {
                                                        case 'New':
                                                            $statusClass = 'badge bg-success';
                                                            break;
                                                        case 'Assigned':
                                                            $statusClass = 'badge bg-warning';
                                                            break;
                                                        case 'Close':
                                                            $statusClass = 'badge bg-danger';
                                                            break;
                                                        case 'Cancelled':
                                                            $statusClass = 'badge bg-light text-dark';
                                                            break;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?= $index + 1; ?>.</td>
                                                        <td><?= htmlspecialchars($complaint['callnumber']); ?></td>
                                                        <td><?= htmlspecialchars($complaint['customername']); ?></td>
                                                        <td><?= htmlspecialchars($complaint['customermobileno']); ?></td>
                                                        <td><?= htmlspecialchars($complaint['calltype']); ?></td>
                                                        <td><?= htmlspecialchars($complaint['serviceworktype']); ?></td>
                                                        <td><span class="<?= $statusClass; ?>"><?= strtoupper($complaint['callstatus']); ?></span></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No complaints found for today.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- /.Left col -->

                        <!-- Right col -->
                        <section class="col-lg-5 connectedSortable">
                            <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-chart-pie mr-1"></i>
                                            Active Complaints <span class="badge badge-primary"> <?php echo $activeComplaintCount ?> </span>
                                        </h3>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content p-0 table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Complaint No.</th>
                                                        <th>Customer Name</th>
                                                        <th>Customer Mo. No.</th>
                                                        <th style="width: 40px">Status</th>
                                                    </tr>
                                                </thead>
                                                <?php if (count($activeComplaints) > 0): ?>
                                                    <?php foreach ($activeComplaints as $index => $activeComplaint): ?>
                                                        <?php
                                                        // Determine the badge class based on the complaint status
                                                        $statusClass = '';
                                                        switch ($activeComplaint['callstatus']) {
                                                            case 'New':
                                                                $statusClass = 'badge bg-success';
                                                                break;
                                                            case 'Assigned':
                                                                $statusClass = 'badge bg-warning';
                                                                break;
                                                            case 'Close':
                                                                $statusClass = 'badge bg-danger';
                                                                break;
                                                            case 'Cancelled':
                                                                $statusClass = 'badge bg-light text-dark';
                                                                break;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?= $index + 1; ?>.</td>
                                                            <td><?= htmlspecialchars($activeComplaint['callnumber']); ?></td>
                                                            <td><?= htmlspecialchars($activeComplaint['customername']); ?></td>
                                                            <td><?= htmlspecialchars($activeComplaint['customermobileno']); ?></td>
                                                            <td><span class="<?= $statusClass; ?>"><?= strtoupper($activeComplaint['callstatus']); ?></span></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="5">No complaints found for today.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </table>
                                        </div>
                                    </div><!-- /.card-body -->
                                </div>
                        </section>
                        <!-- /.Right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <?php require_once('../../includes/footer.php') ?>
        <?php require_once('../../includes/asidde-end.php') ?>
    </div>

    <?php require_once('../../includes/script.php')  ?>
</body>

</html>