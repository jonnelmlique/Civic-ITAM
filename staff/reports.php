<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Asset</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/staff/management.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">

</head>

<body>

<div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white active"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
            <li><a href="./asset.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> My Asset</a></li>
            <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li>
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i> My Tickets</a></li>
            <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i> My Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a></li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i> My History</a></li>
            <li><a href="./managerequest.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage requests</a></li>
        </ul>
    </div>

<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-orange" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand ms-3" href="#">My Reports</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> TWICE
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

        <div class="container-fluid py-4">

            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-dark">Reports</h3>
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
                            <i class="bi bi-file-earmark-text card-icon text-primary"></i>
                            <div>
                                <h6 class="card-title">Total Assets Report</h6>
                                <p class="card-value">View a detailed list of all assets</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-earmark-ruled card-icon text-success"></i>
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
                            <i class="bi bi-file-earmark-excel card-icon text-warning"></i>
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
                            <i class="bi bi-file-earmark-pdf card-icon text-danger"></i>
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


<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="text-dark">Your Reports</h3>
            <p class="text-muted">Below is a list of your submitted reports. You can also submit new reports or update existing ones.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h5 class="mb-3">Report History</h5>
            <p class="text-muted mb-3">View your past reports. You can submit new reports or update existing ones.</p>
            <table class="table table-hover table-striped shadow-sm">
                <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-11-25</td>
                        <td>Weekly Progress Report</td>
                        <td><span class="badge bg-success">Submitted</span></td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#updateReportModal" onclick="fillReportForm('2024-11-25', 'Weekly Progress Report', 'Submitted', 'This is the progress report for the week...')">Update</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#submitReportModal" onclick="setReportDetails('2024-11-25', 'Weekly Progress Report')">Submit New Report</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="submitReportModal" tabindex="-1" aria-labelledby="submitReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="submitReportModalLabel">Submit New Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="submitReportForm">
                        <div class="mb-3">
                            <label for="reportDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="reportDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="reportTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="reportTitle" placeholder="Enter report title" required>
                        </div>
                        <div class="mb-3">
                            <label for="reportContent" class="form-label">Content</label>
                            <textarea class="form-control" id="reportContent" rows="3" placeholder="Write your report content..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-orange">Submit Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateReportModal" tabindex="-1" aria-labelledby="updateReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="updateReportModalLabel">Update Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateReportForm">
                        <div class="mb-3">
                            <label for="updateReportDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="updateReportDate" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateReportTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="updateReportTitle" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateReportContent" class="form-label">Content</label>
                            <textarea class="form-control" id="updateReportContent" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="updateReportStatus" class="form-label">Status</label>
                            <select class="form-select" id="updateReportStatus">
                                <option value="Submitted">Submitted</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-orange">Update Report</button>
                    </form>
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

    function fillReportForm(date, title, status, content) {
        document.getElementById('updateReportDate').value = date;
        document.getElementById('updateReportTitle').value = title;
        document.getElementById('updateReportContent').value = content;
        document.getElementById('updateReportStatus').value = status;
    }

    function setReportDetails(date, title) {
        document.getElementById('reportDate').value = date;
        document.getElementById('reportTitle').value = title;
        document.getElementById('reportContent').value = '';
    }

    document.getElementById('submitReportForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const date = document.getElementById('reportDate').value;
        const title = document.getElementById('reportTitle').value;
        const content = document.getElementById('reportContent').value;

        console.log('New Report:', date, title, content);

        $('#submitReportModal').modal('hide');
    });

    document.getElementById('updateReportForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const date = document.getElementById('updateReportDate').value;
        const title = document.getElementById('updateReportTitle').value;
        const content = document.getElementById('updateReportContent').value;
        const status = document.getElementById('updateReportStatus').value;

        console.log('Updated Report:', date, title, content, status);

        $('#updateReportModal').modal('hide');

</script>
</body>

</html>
