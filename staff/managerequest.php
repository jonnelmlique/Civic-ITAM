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
            <a class="navbar-brand ms-3" href="#">Manage Request</a>
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
            <h3 class="text-dark">Manage Your Requests</h3>
            <p class="text-muted">Below you can view and manage all your asset requests. You can see the status, edit, or cancel your requests.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped shadow-sm">
                <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">Request Date</th>
                        <th scope="col">Asset</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="manageRequests">

                    <tr>
                        <td>2024-12-01</td>
                        <td>Dell Laptop</td>
                        <td>Computers</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewRequestModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editRequestModal">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="cancelRequest('1')">Cancel</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2024-11-28</td>
                        <td>HP Printer</td>
                        <td>Printers</td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewRequestModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editRequestModal">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="cancelRequest('2')">Cancel</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="viewRequestModal" tabindex="-1" aria-labelledby="viewRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="viewRequestModalLabel">View Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Asset:</strong> Dell Laptop</p>
                <p><strong>Category:</strong> Computers</p>
                <p><strong>Status:</strong> Pending</p>
                <p><strong>Requested On:</strong> 2024-12-01</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editRequestModal" tabindex="-1" aria-labelledby="editRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="editRequestModalLabel">Edit Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editRequestForm">
                    <div class="mb-3">
                        <label for="assetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="assetName" value="Dell Laptop" required>
                    </div>
                    <div class="mb-3">
                        <label for="assetCategory" class="form-label">Category</label>
                        <select class="form-select" id="assetCategory">
                            <option value="Computers">Computers</option>
                            <option value="Printers">Printers</option>
                            <option value="Monitors">Monitors</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="requestStatus" class="form-label">Status</label>
                        <select class="form-select" id="requestStatus">
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Denied">Denied</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-orange">Update Request</button>
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

function cancelRequest(requestId) {
    if (confirm('Are you sure you want to cancel this request?')) {
        alert('Request ID ' + requestId + ' has been canceled.');
        location.reload();
    }
}

document.getElementById('editRequestForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const assetName = document.getElementById('assetName').value;
    const assetCategory = document.getElementById('assetCategory').value;
    const requestStatus = document.getElementById('requestStatus').value;


    alert('Request updated: ' + assetName + ' (' + assetCategory + ') - ' + requestStatus);


    location.reload();
});
</script>
</body>

</html>
