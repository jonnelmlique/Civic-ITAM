<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Asset Consignment</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admincss/management.css">
    <link rel="stylesheet" href="../public/css/admincss/sidebar.css">
    <style>
    #table .assetTable th {
        white-space: nowrap;
        text-align: center;
    }

    #assetTable tr {
        white-space: nowrap;
        text-align: center;
    }
    </style>
</head>

<body>


    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li>
                <a href="./dashboard.php" class="nav-link text-white">
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
                <a href="./consignment.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">Asset Consignment</a>
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

<div class="row mb-4">
    <div class="col-12">

    </div>
</div>
<?php
include '../src/config/config.php';

$totalQuery = "SELECT COUNT(*) AS total FROM consignment_view";
$totalResult = $conn->query($totalQuery);
$total = $totalResult->fetch_assoc()['total'];

$activeQuery = "SELECT COUNT(*) AS active FROM consignment_view WHERE status = 'Received'";
$activeResult = $conn->query($activeQuery);
$active = $activeResult->fetch_assoc()['active'];

$pendingQuery = "SELECT COUNT(*) AS pending FROM consignment_view WHERE status = 'Pending'";
$pendingResult = $conn->query($pendingQuery);
$pending = $pendingResult->fetch_assoc()['pending'];

$completedQuery = "SELECT COUNT(*) AS completed FROM consignment_view WHERE status = 'Returned'";
$completedResult = $conn->query($completedQuery);
$completed = $completedResult->fetch_assoc()['completed'];
?>

<div class="row g-3">
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-box-seam card-icon text-primary me-3"></i>
                <div>
                    <h6 class="card-title">Total Consignments</h6>
                    <p class="card-value"><?php echo $total; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-check-circle card-icon text-success me-3"></i>
                <div>
                    <h6 class="card-title">Active Consignments</h6>
                    <p class="card-value"><?php echo $active; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-clock card-icon text-warning me-3"></i>
                <div>
                    <h6 class="card-title">Pending Consignments</h6>
                    <p class="card-value"><?php echo $pending; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-check-lg card-icon text-info me-3"></i>
                <div>
                    <h6 class="card-title">Completed Consignments</h6>
                    <p class="card-value"><?php echo $completed; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$sql = "SELECT * FROM consignment_view";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $consignments = [];
    while ($row = $result->fetch_assoc()) {
        $consignments[] = $row;
    }
} else {
    $errorMessage = "No consignments found.";
}
?>

<div class="row mt-4">
    <div class="col-12">
        <input type="text" id="searchInput" class="form-control" placeholder="Search" onkeyup="searchTable()">
        <table class="table table-hover table-striped shadow-sm">
            <thead class="bg-orange text-white">
                <tr>
                    <th scope="col">Consignment ID</th>
                    <th scope="col">Asset Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Consignee</th>
                    <th scope="col">Date Consigned</th>
                    <th scope="col">Return Due</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($consignments)): ?>
                    <?php foreach ($consignments as $consignment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($consignment['requestid']); ?></td>
                            <td><?php echo htmlspecialchars($consignment['assetname']); ?></td>
                            <td><?php echo htmlspecialchars($consignment['category']); ?></td>
                            <td><?php echo htmlspecialchars($consignment['reason']); ?></td>
                            <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($consignment['createddate']))); ?></td>
                            <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($consignment['createddate'] . ' + 60 days'))); ?></td>
                            <td>
                                <span class="badge 
                                    <?php echo $consignment['status'] === 'Pending' ? 'bg-warning' : 
                                            ($consignment['status'] === 'Returned' ? 'bg-success' : 
                                            ($consignment['status'] === 'Overdue' ? 'bg-danger' : 'bg-secondary')); ?>">
                                    <?php echo htmlspecialchars($consignment['status']); ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#viewConsignmentModal<?php echo $consignment['requestid']; ?>">View</button>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editConsignmentModal<?php echo $consignment['requestid']; ?>">Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No consignments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div><?php foreach ($consignments as $consignment): ?>
    <div class="modal fade" id="viewConsignmentModal<?php echo $consignment['requestid']; ?>" tabindex="-1" aria-labelledby="viewConsignmentModalLabel<?php echo $consignment['requestid']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="viewConsignmentModalLabel<?php echo $consignment['requestid']; ?>">Consignment Details - <?php echo htmlspecialchars($consignment['assetname']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Consignment ID:</th>
                                    <td><?php echo htmlspecialchars($consignment['requestid']); ?></td>
                                </tr>
                                <tr>
                                    <th>Asset Name:</th>
                                    <td><?php echo htmlspecialchars($consignment['assetname']); ?></td>
                                </tr>
                                <tr>
                                    <th>Category:</th>
                                    <td><?php echo htmlspecialchars($consignment['category']); ?></td>
                                </tr>
                                <tr>
                                    <th>Consignee:</th>
                                    <td><?php echo htmlspecialchars($consignment['reason']); ?></td>
                                </tr>
                                <tr>
                                    <th>Date Consigned:</th>
                                    <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($consignment['createddate']))); ?></td>
                                </tr>
                                <tr>
                                    <th>Return Due:</th>
                                    <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($consignment['createddate'] . ' + 60 days'))); ?></td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        <span class="badge 
                                            <?php echo $consignment['status'] === 'Pending' ? 'bg-warning' : 
                                                    ($consignment['status'] === 'Returned' ? 'bg-success' : 
                                                    ($consignment['status'] === 'Overdue' ? 'bg-danger' : 'bg-secondary')); ?>">
                                            <?php echo htmlspecialchars($consignment['status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 text-center">
                        <img src="../images/qr.png" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                        <p class="mt-2">QR code</p>
                        <img src="../images/signature.png" alt="Signature" class="img-fluid mt-3" style="max-width: 100px;">
                            <p class="mt-2">Signature</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($consignments as $consignment): ?>
    <div class="modal fade" id="editConsignmentModal<?php echo $consignment['requestid']; ?>" tabindex="-1" aria-labelledby="editConsignmentModalLabel<?php echo $consignment['requestid']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editConsignmentModalLabel<?php echo $consignment['requestid']; ?>">Edit Consignment - <?php echo htmlspecialchars($consignment['assetname']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="edit_consignment.php" enctype="multipart/form-data">
                        <input type="hidden" name="requestid" value="<?php echo $consignment['requestid']; ?>">
                        
                        <div class="row g-3">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="assetName<?php echo $consignment['requestid']; ?>" class="form-label">Asset Name</label>
                                    <input type="text" class="form-control" id="assetName<?php echo $consignment['requestid']; ?>" name="assetname" value="<?php echo htmlspecialchars($consignment['assetname']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category<?php echo $consignment['requestid']; ?>" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="category<?php echo $consignment['requestid']; ?>" name="category" value="<?php echo htmlspecialchars($consignment['category']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="consignee<?php echo $consignment['requestid']; ?>" class="form-label">Consignee</label>
                                    <input type="text" class="form-control" id="consignee<?php echo $consignment['requestid']; ?>" name="consignee" value="<?php echo htmlspecialchars($consignment['reason']); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status<?php echo $consignment['requestid']; ?>" class="form-label">Status</label>
                                    <select class="form-select" id="status<?php echo $consignment['requestid']; ?>" name="status" required>
                                        <option value="Pending" <?php echo $consignment['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Returned" <?php echo $consignment['status'] === 'Returned' ? 'selected' : ''; ?>>Returned</option>
                                        <option value="Overdue" <?php echo $consignment['status'] === 'Overdue' ? 'selected' : ''; ?>>Overdue</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="returnDate<?php echo $consignment['requestid']; ?>" class="form-label">Return Due Date</label>
                                    <input type="date" class="form-control" id="returnDate<?php echo $consignment['requestid']; ?>" name="return_due" value="<?php echo htmlspecialchars(date('Y-m-d', strtotime($consignment['createddate'] . ' + 60 days'))); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="signatureUpload<?php echo $consignment['requestid']; ?>" class="form-label">MRI Signature</label>
                                    <input type="file" class="form-control" id="signatureUpload<?php echo $consignment['requestid']; ?>" name="mri_signature" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<div class="modal fade" id="addMaintenanceModal" tabindex="-1" aria-labelledby="addMaintenanceModalLabel"
aria-hidden="true">


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
<script>
    function searchTable() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toLowerCase();
        var table = document.querySelector("table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var rowText = "";
            
            for (var j = 0; j < cells.length; j++) {
                rowText += cells[j].textContent || cells[j].innerText;
            }

            if (rowText.toLowerCase().includes(filter)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
</script>
</body>

</html>