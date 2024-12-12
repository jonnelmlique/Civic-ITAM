<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Dashboard</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admincss/dashboard.css">
    <link rel="stylesheet" href="../public/css/admincss/sidebar.css">
    <link rel="stylesheet" href="../public/css/profile.css">

</head>

<body>

    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li>
                <a href="./dashboard.php" class="nav-link text-white active">
                    <i class="bi bi-layout-text-window-reverse"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white dropdown-toggle" href="#" id="assetDropdown" data-bs-toggle="collapse"
                    data-bs-target="#assetMenu" aria-expanded="false" aria-controls="assetMenu">
                    <i class="bi bi-ui-checks-grid"></i> Asset Management
                </a>
                <div class="collapse" id="assetMenu">
                    <ul class="nav flex-column ps-3">
                        <li><a href="./assets.php" class="nav-link text-white">Assets</a></li>
                        <li><a href="./pcassets.php" class="nav-link text-white">PC's</a></li>
                        <li><a href="./assetsrequest.php" class="nav-link text-white">Asset Request</a></li>

                    </ul>
                </div>
            </li>
            <li>
                <a href="./maintenance.php" class="nav-link text-white">
                    <i class="bi bi-tools"></i> Maintenance
                </a>
            </li>
            <li>
                <a href="./consignment.php" class="nav-link text-white">
                    <i class="fas fa-truck"></i> Consignment
                </a>
            </li>
            <li>
                <a href="./tickets.php" class="nav-link text-white">
                    <i class="bi bi-ticket-perforated"></i> Tickets
                </a>
            </li>
            <li>
                <a href="./overdue.php" class="nav-link text-white">
                    <i class="bi bi-exclamation-triangle"></i> Overdue
                </a>
            </li>
            <!-- <li>
                <a href="./reports.php" class="nav-link text-white">
                    <i class="bi bi-file-earmark-text"></i> Reports
                </a>
            </li> -->
            <li>
                <a href="./diagnostichistory.php" class="nav-link text-white">
                    <i class="fas fa-history"></i> Diagnostic History
                </a>
            </li>
            <!-- <li>
                <a href="./users.php" class="nav-link text-white">
                    <i class="bi bi-person"></i> Manage Users
                </a>
            </li> -->
        </ul>
    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <!-- <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li> -->
                                <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">

        <div class="profile-container mb-3">
  <div>
  <div class="name-container">
    <h3><?php echo strtoupper($_SESSION['last_name']) . ', ' . strtoupper($_SESSION['first_name']); ?></h3>
    <span class="role-badge"><?php echo strtoupper($_SESSION['role']); ?></span>
</div>

<p><?php echo strtoupper($_SESSION['username']); ?></p>
<p><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></p>
  </div>
</div>


            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-box-seam card-icon text-primary"></i>
                            <div>
                                <h5 class="card-title">Total Assets</h5>
                                <p id="total_assets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-success"></i>
                            <div>
                                <h5 class="card-title">Resolved Tickets</h5>
                                <p id="resolved_tickets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-hourglass-split card-icon text-warning"></i>
                            <div>
                                <h5 class="card-title">Pending Tickets</h5>
                                <p id="pending_tickets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle card-icon text-danger"></i>
                            <div>
                                <h5 class="card-title">Overdue Tickets</h5>
                                <p id="overdue_tickets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h5 class="card-title">Asset Growth Over Time</h5>
                            <canvas id="assetGrowthChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h5 class="card-title">Asset Distribution</h5>
                            <canvas id="assetPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
        </script>


        <script>
        function updateCountsAndCharts() {
            $.ajax({
                url: './queries/dashboard/asset_dashboard_data.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#total_assets').text(data.total_assets);
                    $('#resolved_tickets').text(data.resolved_tickets);
                    $('#pending_tickets').text(data.pending_tickets);
                    $('#overdue_tickets').text(data.overdue_tickets);

                    var assetGrowthCtx = document.getElementById('assetGrowthChart').getContext('2d');
                    var assetGrowthChart = new Chart(assetGrowthCtx, {
                        type: 'line',
                        data: {
                            labels: data.asset_growth.labels,
                            datasets: [{
                                label: 'Assets Growth',
                                data: data.asset_growth.data,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                tension: 0.1
                            }]
                        }
                    });

                    var assetDistributionCtx = document.getElementById('assetPieChart').getContext('2d');
                    var assetDistributionChart = new Chart(assetDistributionCtx, {
                        type: 'pie',
                        data: {
                            labels: data.asset_distribution.labels,
                            datasets: [{
                                label: 'Asset Distribution',
                                data: data.asset_distribution.data,
                                backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56',
                                    '#4bc0c0'
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                },
                error: function() {
                    console.error("An error occurred while fetching data.");
                }
            });
        }

        $(document).ready(function() {
            updateCountsAndCharts();

            setInterval(updateCountsAndCharts, 10000);
        });
        </script>
</body>

</html>