<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Dashboard</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/staff/dashboard.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">

</head>

<body>

    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white active"><i
                        class="bi bi-layout-text-window-reverse"></i>
                    Dashboard</a></li>
            <li><a href="./asset.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> Asset
                    Management</a>
            </li>
            <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li>
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i>
                    Tickets</a></li>
            <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i>
                    Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a>
            </li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i>
                    Diagnostic History</a></li>
            <li><a href="./managerequest.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage
                    requests</a></li>
        </ul>
    </div>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Asset Management</a>
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
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row g-3">

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-ui-checks-grid card-icon text-primary"></i>
                            <div>
                                <h5 class="card-title">My Assets</h5>
                                <p class="card-value">10</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-ticket-perforated card-icon text-success"></i>
                            <div>
                                <h5 class="card-title">My Tickets</h5>
                                <p class="card-value">5</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-receipt-cutoff card-icon text-danger"></i>
                            <div>
                                <h5 class="card-title">Schedule</h5>
                                <p class="card-value">2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-bell text-primary"></i> Notifications</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Laptop (#12345) is scheduled for maintenance on Dec 5.</li>
                                <li class="list-group-item">New ticket assigned: "Monitor Replacement".</li>
                                <li class="list-group-item">Asset #78901 has been marked overdue.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow border-0 c">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-list-task text-success"></i> My Tickets</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Resolve ticket "PC not booting".</li>
                                <li class="list-group-item">Submit report for Asset #45678.</li>
                                <li class="list-group-item">Inspect printer #12234 by Dec 6.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">My Asset</h5>
                            <canvas id="myAssetChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">My Ticket Update</h5>
                            <canvas id="ticketTrendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Logs Section -->
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-clock-history text-info"></i> Activity Logs</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dec 1</td>
                                        <td>Resolved ticket "Monitor Flickering".</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nov 30</td>
                                        <td>Checked-in Laptop #54321.</td>
                                        <td><span class="badge bg-info">In Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nov 29</td>
                                        <td>Assigned ticket "Printer Paper Jam".</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('collapsed');
    });

    var ctx1 = document.getElementById('myAssetChart').getContext('2d');
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Laptops', 'Monitors', 'Printers', 'Accessories'],
            datasets: [{
                label: 'My Assets',
                data: [5, 2, 1, 2],
                backgroundColor: ['#36a2eb', '#ffcd56', '#4bc0c0', '#ff6384']
            }]
        }
    });

    var ctx2 = document.getElementById('ticketTrendChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Nov 25', 'Nov 26', 'Nov 27', 'Nov 28', 'Nov 29', 'Nov 30', 'Dec 1'],
            datasets: [{
                label: 'Resolved Tickets',
                data: [2, 3, 4, 3, 5, 4, 6],
                borderColor: '#36a2eb',
                fill: false
            }, {
                label: 'Pending Tickets',
                data: [3, 2, 1, 2, 2, 1, 0],
                borderColor: '#ff6384',
                fill: false
            }]
        }
    });
    </script>
</body>

</html>