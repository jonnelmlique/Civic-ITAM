<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Reports</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/superadmin/sidebar.css">

</head>

<body>

    <div id="sidebar">
        <div class="sidebar-header text-center">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 30%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="./assetdetails.php"><i class="fas fa-cogs"></i> Asset Details</a></li>
            <li><a href="./pcassets.php"><i class="fas fa-desktop"></i> PC Assets</a></li>
            <li><a href="./status.php"><i class="fas fa-check-circle"></i> Status</a></li>
            <li><a href="./assetconsignment.php"><i class="fas fa-truck"></i> Consignment</a></li>
            <li><a href="./tickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="./reports.php" class="active"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="./maintenance.php"><i class="fas fa-tools"></i> Maintenance Schedule</a></li>
            <li><a href="./diagnostichistory.php"><i class="fas fa-history"></i> Diagnostic History</a>
            </li>
            <li><a href="./manageuser.php"><i class="fas fa-users"></i> Manage Users</a></li>
        </ul>

    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Reports</a>
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

            <div class="row mb-4">
                <div class="col-12">
                    <!-- <h3 class="text-dark">Asset Reports</h3> -->
                    <p class="text-muted">Generate and view detailed reports on your assets. This section allows you to
                        analyze the status of your assets, their usage, and other important metrics.</p>
                    <p class="text-muted">Choose the report type below and filter the data to get the most relevant
                        insights for asset management.</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-earmark-text card-icon text-primary"
                                style="font-size: 30px; margin-right: 10px;"></i>
                            <div>
                                <h6 class="card-title">Total Assets Report</h6>
                                <p class="card-value">View a detailed list of all assets in the system</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-earmark-ruled card-icon text-success"
                                style="font-size: 30px; margin-right: 10px;"></i>
                            <div>
                                <h6 class="card-title">Assigned Assets Report</h6>
                                <p class="card-value">Track assets that are assigned to users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-earmark-excel card-icon text-warning"
                                style="font-size: 30px; margin-right: 10px;"></i>
                            <div>
                                <h6 class="card-title">Maintenance Report</h6>
                                <p class="card-value">Generate reports for assets under maintenance</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-earmark-pdf card-icon text-danger"
                                style="font-size: 30px; margin-right: 10px;"></i>
                            <div>
                                <h6 class="card-title">Overdue Assets Report</h6>
                                <p class="card-value">Generate reports for overdue assets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="mb-3">Generate Custom Report</h5>
                    <p class="text-muted mb-3">Use the filters below to generate custom reports based on asset
                        categories, status, or other criteria. Choose your report format and export it as needed.</p>

                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="categoryFilter" class="form-label">Category</label>
                            <select class="form-select" id="categoryFilter">
                                <option selected>Choose category</option>
                                <option value="computers">Computers</option>
                                <option value="printers">Printers</option>
                                <option value="monitors">Monitors</option>
                                <option value="accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="statusFilter" class="form-label">Status</label>
                            <select class="form-select" id="statusFilter">
                                <option selected>Choose status</option>
                                <option value="available">Available</option>
                                <option value="assigned">Assigned</option>
                                <option value="maintenance">Under Maintenance</option>
                                <option value="overdue">Overdue</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dateFilter" class="form-label">Date Range</label>
                            <input type="date" class="form-control" id="dateFilter">
                        </div>
                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-orange">Generate Report</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="mb-3">Report History</h5>
                    <p class="text-muted mb-3">Here you can view previously generated reports and download them in PDF
                        or Excel format.</p>
                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">Report ID</th>
                                <th scope="col">Report Type</th>
                                <th scope="col">Generated On</th>
                                <th scope="col">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>RPT001</td>
                                <td>Total Assets Report</td>
                                <td>2024-11-30</td>
                                <td><a href="#" class="btn btn-sm btn-success"><i class="bi bi-download"></i> PDF</a>
                                </td>
                            </tr>
                            <tr>
                                <td>RPT002</td>
                                <td>Assigned Assets Report</td>
                                <td>2024-11-28</td>
                                <td><a href="#" class="btn btn-sm btn-success"><i class="bi bi-download"></i> PDF</a>
                                </td>
                            </tr>
                            <tr>
                                <td>RPT003</td>
                                <td>Maintenance Report</td>
                                <td>2024-11-25</td>
                                <td><a href="#" class="btn btn-sm btn-success"><i class="bi bi-download"></i> PDF</a>
                                </td>
                            </tr>
                            <tr>
                                <td>RPT004</td>
                                <td>Overdue Assets Report</td>
                                <td>2024-11-20</td>
                                <td><a href="#" class="btn btn-sm btn-success"><i class="bi bi-download"></i> PDF</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        </script>
</body>

</html>