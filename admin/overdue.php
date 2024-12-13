<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Overdue Asset Management</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admincss/management.css">
    <link rel="stylesheet" href="../public/css/admincss/sidebar.css">
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
                <a href="./overdue.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">Overdue Asset Management</a>
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
                    <!-- Optional Header or Description -->
                </div>
            </div>
            <?php
            include '../src/config/config.php';

// Initialize counts
$totalOverdueAssets = 0;
$underMaintenance = 0;
$awaitingReturn = 0;
$otherIssues = 0;
// Query for Total Overdue Assets
$sqlOverdue = "SELECT COUNT(*) AS total_overdue_assets FROM assetrequests WHERE status = 'Overdue'";
$resultOverdue = $conn->query($sqlOverdue);
if ($resultOverdue) {
    $rowOverdue = $resultOverdue->fetch_assoc();
    $totalOverdueAssets = $rowOverdue['total_overdue_assets'];
} else {
    echo "Error with query: " . $conn->error;  // Debug line
}

// Query for Under Maintenance
$sqlMaintenance = "SELECT COUNT(*) AS under_maintenance FROM assetrequests WHERE status = 'Under Maintenance'";
$resultMaintenance = $conn->query($sqlMaintenance);
if ($resultMaintenance) {
    $rowMaintenance = $resultMaintenance->fetch_assoc();
    $underMaintenance = $rowMaintenance['under_maintenance'];
} else {
    echo "Error with query: " . $conn->error;  // Debug line
}

// Query for Awaiting Return
$sqlAwaitingReturn = "SELECT COUNT(*) AS awaiting_return FROM assetrequests WHERE status = 'Awaiting Return'";
$resultAwaitingReturn = $conn->query($sqlAwaitingReturn);
if ($resultAwaitingReturn) {
    $rowAwaitingReturn = $resultAwaitingReturn->fetch_assoc();
    $awaitingReturn = $rowAwaitingReturn['awaiting_return'];
} else {
    echo "Error with query: " . $conn->error;  // Debug line
}

// Query for Other Issues
$sqlOtherIssues = "SELECT COUNT(*) AS other_issues FROM assetrequests WHERE status NOT IN ('Overdue', 'Under Maintenance', 'Awaiting Return')";
$resultOtherIssues = $conn->query($sqlOtherIssues);
if ($resultOtherIssues) {
    $rowOtherIssues = $resultOtherIssues->fetch_assoc();
    $otherIssues = $rowOtherIssues['other_issues'];
} else {
    echo "Error with query: " . $conn->error;  // Debug line
}


?>

<!-- Update the HTML dynamically with PHP -->
<div class="row g-3">
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-box-seam card-icon text-danger"></i>
                <div>
                    <h6 class="card-title">Total Overdue Assets</h6>
                    <p id="total_overdue_assets" class="card-value"><?php echo $totalOverdueAssets; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-tools card-icon text-warning"></i>
                <div>
                    <h6 class="card-title">Under Maintenance</h6>
                    <p id="under_maintenance" class="card-value"><?php echo $underMaintenance; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-person-check card-icon text-info"></i>
                <div>
                    <h6 class="card-title">Awaiting Return</h6>
                    <p id="awaiting_return" class="card-value"><?php echo $awaitingReturn; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-exclamation-circle card-icon text-secondary"></i>
                <div>
                    <h6 class="card-title">Other Issues</h6>
                    <p id="other_issues" class="card-value"><?php echo $otherIssues; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="row mt-4">
    <div class="col-12">
        <input type="text" id="searchInput" class="form-control" placeholder="Search" onkeyup="searchTable()">
        <table class="table table-hover table-striped shadow-sm">
            <thead class="bg-orange text-white">
                <tr>
                    <th scope="col">Asset ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="overdueTableBody">
            <?php

$sql = "SELECT * FROM overdue_asset_requests ORDER BY createddate ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add the status styling for the badge
        $badgeClass = 'bg-danger'; // Since all of these are overdue, we can use bg-danger directly

        // Assume the due date is based on createddate (or you can adjust the logic if needed)
        $dueDate = date('Y-m-d', strtotime($row['createddate']));  // Format the due date

        echo "
        <tr>
            <td>ASSET{$row['assetid']}</td>
            <td>{$row['assetname']}</td>
            <td>{$row['category']}</td>
            <td><span class='badge {$badgeClass}'>Overdue</span></td>
            <td>{$row['assigned_to']}</td>
            <td>{$dueDate}</td>  <!-- Display formatted due date -->
            <td>
            <button class='btn btn-info btn-sm view-btn' data-bs-toggle='modal' data-bs-target='#viewOverdueAssetModal' 
data-id='{$row['requestid']}'
data-name='{$row['assetname']}'
data-category='{$row['category']}'
data-assignedto='{$row['assigned_to']}'
data-duedate='{$dueDate}'
data-status='Overdue'>View</button>



            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No overdue assets found.</td></tr>";
}

$conn->close();
?>
</tbody>
</table>
</div>
</div><!-- View Modal -->
<div class="modal fade" id="viewOverdueAssetModal" tabindex="-1" aria-labelledby="viewOverdueAssetModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header bg-orange text-white">
<h5 class="modal-title" id="viewOverdueAssetModalLabel">Overdue Asset Details</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<!-- Modal Content -->
<div class="row">
    <div class="col-md-6">
        <strong>Asset ID:</strong>
        <p id="view-asset-id"></p>
    </div>
    <div class="col-md-6">
        <strong>Asset Name:</strong>
        <p id="view-asset-name"></p>
    </div>
    <div class="col-md-6">
        <strong>Category:</strong>
        <p id="view-category"></p>
    </div>
    <div class="col-md-6">
        <strong>Status:</strong>
        <p id="view-status"></p>
    </div>
    <div class="col-md-6">
        <strong>Assigned To:</strong>
        <p id="view-assigned-to"></p>
    </div>
    <div class="col-md-6">
        <strong>Due Date:</strong>
        <p id="view-due-date"></p>
    </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<!-- Resolve Button -->
<button type="button" class="btn btn-success" id="resolveBtn">Resolve</button>
</div>
</div>
</div>
</div>
<script>
const viewButtons = document.querySelectorAll('.view-btn');

viewButtons.forEach(button => {
button.addEventListener('click', function() {
const assetId = this.getAttribute('data-id');
const assetName = this.getAttribute('data-name');
const category = this.getAttribute('data-category');
const assignedTo = this.getAttribute('data-assignedto');
const dueDate = this.getAttribute('data-duedate');
const status = this.getAttribute('data-status');

// Set the modal content
document.getElementById('view-asset-id').textContent = 'ASSET' + assetId;
document.getElementById('view-asset-name').textContent = assetName;
document.getElementById('view-category').textContent = category;
document.getElementById('view-assigned-to').textContent = assignedTo;
document.getElementById('view-due-date').textContent = dueDate;
document.getElementById('view-status').textContent = status;
});
});
</script>


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
    document.getElementById('addOverdueAssetForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        fetch('./queries/overdue/add_overdue_asset.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: result.message,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred. Please try again.',
                    confirmButtonText: 'OK'
                });
            });
    });
    </script>
 
    <script>
    function searchTable() {
        const searchInput = document.getElementById("searchInput").value.toLowerCase();

        const rows = document.querySelectorAll("#overdueTableBody tr");

        rows.forEach(function(row) {
            const cells = row.getElementsByTagName("td");
            let matchFound = false;

            for (let i = 0; i < cells.length; i++) {
                if (cells[i].textContent.toLowerCase().includes(searchInput)) {
                    matchFound = true;
                    break;
                }
            }

            if (matchFound) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
    </script>
    
</body>

</html>