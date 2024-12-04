
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
            <li><a href="./managerequests.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage requests</a></li>
        </ul>
    </div>

<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-orange" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand ms-3" href="#">Staff Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> John Doe
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
            <h3 class="text-dark">My Asset</h3>
            <p class="text-muted">Submit requests for assets you need to perform your tasks effectively. You can also track the status of your submitted requests below.</p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-send-check card-icon text-primary"></i>
                    <div>
                        <h6 class="card-title">Total Requests</h6>
                        <p class="card-value">15</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-check-circle card-icon text-success"></i>
                    <div>
                        <h6 class="card-title">Approved Requests</h6>
                        <p class="card-value">10</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-hourglass-split card-icon text-warning"></i>
                    <div>
                        <h6 class="card-title">Pending Requests</h6>
                        <p class="card-value">3</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-x-circle card-icon text-danger"></i>
                    <div>
                        <h6 class="card-title">Declined Requests</h6>
                        <p class="card-value">2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="text-dark">My Assets</h3>
            <p class="text-muted">View your assigned assets, update asset details if required, or report any issues.</p>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-12">
            <h5 class="mb-3">Assigned Assets</h5>
            <p class="text-muted mb-3">Below is the list of assets currently assigned to you.</p>
            <table class="table table-hover table-striped shadow-sm">
                <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">Asset ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ASSET001</td>
                        <td>Dell Laptop</td>
                        <td>Computers</td>
                        <td><span class="badge bg-success">In Use</span></td>
                        <td>2024-12-01</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewAssetModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editAssetModal">Edit</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#reportIssueModal">Report Issue</button>
                        </td>
                    </tr>
                    <tr>
                        <td>ASSET002</td>
                        <td>HP Printer</td>
                        <td>Printers</td>
                        <td><span class="badge bg-warning">Under Maintenance</span></td>
                        <td>2024-11-30</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewAssetModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editAssetModal">Edit</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#reportIssueModal">Report Issue</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="viewAssetModal" tabindex="-1" aria-labelledby="viewAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="viewAssetModalLabel">Asset Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Asset Name:</strong> Dell Laptop</p>
                <p><strong>Category:</strong> Computers</p>
                <p><strong>Status:</strong> In Use</p>
                <p><strong>Assigned On:</strong> 2024-11-01</p>
                <p><strong>Remarks:</strong> No issues reported.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editAssetModal" tabindex="-1" aria-labelledby="editAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="editAssetModalLabel">Edit Asset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editAssetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="editAssetName" value="Dell Laptop">
                    </div>
                    <div class="mb-3">
                        <label for="editAssetCategory" class="form-label">Category</label>
                        <select class="form-select" id="editAssetCategory">
                            <option value="Computers" selected>Computers</option>
                            <option value="Printers">Printers</option>
                            <option value="Monitors">Monitors</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editAssetRemarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="editAssetRemarks" rows="3">No issues reported.</textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reportIssueModal" tabindex="-1" aria-labelledby="reportIssueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="reportIssueModalLabel">Report Issue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="issueAssetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="issueAssetName" value="Dell Laptop" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="issueDescription" class="form-label">Issue Description</label>
                        <textarea class="form-control" id="issueDescription" rows="3" placeholder="Describe the issue"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Submit Issue</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
        <div class="col-12 text-end">
            <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#requestAssetModal">
                <i class="bi bi-plus-lg"></i> Submit New Request
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="requestAssetModal" tabindex="-1" aria-labelledby="requestAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="requestAssetModalLabel">Submit New Asset Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="requestAssetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="requestAssetName" placeholder="Enter asset name">
                    </div>
                    <div class="mb-3">
                        <label for="requestCategory" class="form-label">Category</label>
                        <select class="form-select" id="requestCategory">
                            <option value="">Select Category</option>
                            <option value="Computers">Computers</option>
                            <option value="Printers">Printers</option>
                            <option value="Monitors">Monitors</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="requestReason" class="form-label">Reason</label>
                        <textarea class="form-control" id="requestReason" rows="3" placeholder="Why do you need this asset?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Submit Request</button>
                </form>
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
</script>
</body>

</html>