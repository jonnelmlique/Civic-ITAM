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
    <title>CIVIC | Asset Details</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../public/css/superadmin/management.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                        <li><a href="./assetrequest.php" class="nav-link text-white active">Asset Requests</a></li>
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
            <li>
                <a href="./reports.php" class="nav-link text-white">
                    <i class="bi bi-file-earmark-text"></i> Reports
                </a>
            </li>
            <li>
                <a href="./diagnostichistory.php" class="nav-link text-white">
                    <i class="fas fa-history"></i> Diagnostic History
                </a>
            </li>
            <li>
                <a href="./users.php" class="nav-link text-white">
                    <i class="bi bi-person"></i> Manage Users
                </a>
            </li>
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
            <div class="row g-3">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-send-check card-icon text-primary"></i>
                <div>
                    <h6 class="card-title">Total Requests</h6>
                    <p class="card-value" id="totalRequests">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-check-circle card-icon text-success"></i>
                <div>
                    <h6 class="card-title">Approved Requests</h6>
                    <p class="card-value" id="approvedRequests">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-hourglass-split card-icon text-warning"></i>
                <div>
                    <h6 class="card-title">Pending Requests</h6>
                    <p class="card-value" id="pendingRequests">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-x-circle card-icon text-danger"></i>
                <div>
                    <h6 class="card-title">Declined Requests</h6>
                    <p class="card-value" id="declinedRequests">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-card-checklist card-icon text-primary"></i>
                <div>
                    <h6 class="card-title">Received Requests</h6>
                    <p class="card-value" id="receivedRequests">0</p>
                </div>
            </div>
        </div>
    </div>
</div>

            <?php
include '../src/config/config.php';

$itemsPerPage = 5;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

$totalRequests = 0;
$sqlTotal = "SELECT COUNT(*) AS total FROM assetrequests";
$stmtTotal = $conn->prepare($sqlTotal);
if ($stmtTotal) {
    $stmtTotal->execute();
    $resultTotal = $stmtTotal->get_result();
    if ($resultTotal) {
        $totalRequests = $resultTotal->fetch_assoc()['total'];
    }
    $stmtTotal->close();
}

$assetRequests = [];
$sql = "SELECT requestid, assetname, category, reason, status, createddate 
        FROM assetrequests 
        ORDER BY createddate DESC 
        LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ii", $itemsPerPage, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $assetRequests[] = $row;
        }
    } else {
        $errorMessage = "No requests found.";
    }
    $stmt->close();
} else {
    $errorMessage = "Error preparing the SQL statement: " . $conn->error;
}
$totalPages = ceil($totalRequests / $itemsPerPage);
?>

            <div class="row mt-4">
                <div class="col-12">
                    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search"
                        onkeyup="searchTable()">
                    <table class="table table-hover table-striped shadow-sm" id="assetRequestsTable">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($assetRequests)): ?>
                            <?php foreach ($assetRequests as $request): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($request['assetname']); ?></td>
                                <td><?php echo htmlspecialchars($request['category']); ?></td>
                                <td><?php echo htmlspecialchars($request['reason']); ?></td>
                                <td>
                                <span class="badge 
                                <?php 
                                    echo $request['status'] === 'Pending' ? 'bg-warning' : 
                                        ($request['status'] === 'Received' ? 'bg-success' : 
                                        ($request['status'] === 'Approved' ? 'bg-primary' : 
                                        ($request['status'] === 'Declined' ? 'bg-secondary' : 'bg-danger'))); 
                                ?>">
                                <?php echo htmlspecialchars($request['status']); ?>
                            </span>

                                </td>
                                <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($request['createddate']))); ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button"
                                            id="actionDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>

                                                <a href="viewAsset.php?requestid=<?php echo $request['requestid']; ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>"
                                                    class="dropdown-item text-primary"> <i class="bi bi-eye"></i> View
                                            </li>
                                  
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No asset requests found for you.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php if ($currentPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">Previous</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo $i === $currentPage ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>

                            <?php if ($currentPage < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal fade" id="viewAssetModal" tabindex="-1" aria-labelledby="viewAssetModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-orange text-white">
                            <h5 class="modal-title" id="viewAssetModalLabel">Asset Requst Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Asset Name:</strong> <span id="assetName"></span></p>
                            <p><strong>Category:</strong> <span id="assetCategory"></span></p>
                            <p><strong>Status:</strong> <span id="assetStatus"></span></p>
                            <p><strong>Reason:</strong> <span id="assetReason"></span></p>
                            <p><strong>Created Date:</strong> <span id="assetCreatedDate"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <script src="../node_modules/jquery/dist/jquery.min.js"></script>
            <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
            <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            function searchTable() {
                const input = document.getElementById('searchInput');
                const filter = input.value.toLowerCase();
                
                const urlParams = new URLSearchParams(window.location.search);
                const currentPage = urlParams.get('page') || 1;

                window.location.href = `?page=${currentPage}&search=${filter}`;
            }
        </script>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const viewAssetModal = document.getElementById('viewAssetModal');

                viewAssetModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;

                    const assetName = button.getAttribute('data-assetname');
                    const category = button.getAttribute('data-category');
                    const reason = button.getAttribute('data-reason');
                    const status = button.getAttribute('data-status');
                    const createdDate = button.getAttribute('data-createddate');

                    document.getElementById('assetName').textContent = assetName;
                    document.getElementById('assetCategory').textContent = category;
                    document.getElementById('assetReason').textContent = reason;
                    document.getElementById('assetStatus').textContent = status;
                    document.getElementById('assetCreatedDate').textContent = createdDate;
                });
            });
            </script>
            <script>
            function fetchRequestData() {
                $.ajax({
                    url: './queries/assetrequest/queries-get-requests-data.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#totalRequests').text(response.totalRequests);
                        $('#approvedRequests').text(response.approvedRequests);
                        $('#pendingRequests').text(response.pendingRequests);
                        $('#declinedRequests').text(response.declinedRequests);
                        $('#receivedRequests').text(response.receivedRequests);

                    },
                    error: function() {
                        console.error("Error fetching request data.");
                    }
                });
            }

            $(document).ready(function() {
                fetchRequestData();

                setInterval(fetchRequestData, 100);
            });
            </script>

     

</body>

</html>