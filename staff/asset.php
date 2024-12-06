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
    <title>CIVIC | Asset Management</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/staff/management.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>

<body>

    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white"><i class="bi bi-layout-text-window-reverse"></i>
                    Dashboard</a></li>
            <li><a href="./asset.php" class="nav-link text-white active"><i class="bi bi-ui-checks-grid"></i> Asset
                    Request</a>
            </li>
            <!-- <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li> -->
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i>
                    Tickets</a></li>
            <!-- <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i>
                    Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a>
            </li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i>
                    Diagnostic History</a></li>
            <li><a href="./managerequest.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage
                    requests</a></li> -->
        </ul>
    </div>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Asset Request</a>
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
        <!-- <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Asset Management</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> TWICE
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav> -->

        <div class="container-fluid py-4">

            <div class="row mb-4">
                <div class="col-12">
                    <!-- <h3 class="text-dark">My Asset</h3>
                    <p class="text-muted">Submit requests for assets you need to perform your tasks effectively. You can
                        also track the status of your submitted requests below.</p> -->
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
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

                <div class="col-lg-3 col-md-6">
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

                <div class="col-lg-3 col-md-6">
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

                <div class="col-lg-3 col-md-6">
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
            </div>

            <div class="container-fluid py-4">
                <div class="row mb-4">
                    <div class="col-12">
                        <!-- <h3 class="text-dark">My Assets</h3>
                        <p class="text-muted">View your assigned assets, update asset details if required, or report any
                            issues.</p> -->
                    </div>
                </div>
                <!-- //tobechange -->
                <?php
include '../src/config/config.php';

$username = $_SESSION['username'];

$sql = "SELECT requestid, assetname, category, reason, status, createddate 
        FROM assetrequests 
        WHERE requestedby = ? 
        ORDER BY createddate DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

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
                                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['assetname']); ?></td>
                                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                                    <td><?php echo htmlspecialchars($row['reason']); ?></td>
                                    <td>
                                        <span class="badge <?php echo getStatusClass($row['status']); ?>">
                                            <?php echo htmlspecialchars($row['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date("Y-m-d", strtotime($row['createddate'])); ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#viewAssetModal"
                                            data-requestid="<?php echo $row['requestid']; ?>">
                                            View
                                        </button>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#viewAssetModal"
                                            data-assetname="<?php echo htmlspecialchars($row['assetname']); ?>"
                                            data-category="<?php echo htmlspecialchars($row['category']); ?>"
                                            data-reason="<?php echo htmlspecialchars($row['reason']); ?>"
                                            data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                            data-createddate="<?php echo htmlspecialchars($row['createddate']); ?>">
                                            View
                                        </button>
                                        <!-- <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editAssetModal"
                                            data-requestid="<?php echo $row['requestid']; ?>"
                                            data-assetname="<?php echo htmlspecialchars($row['assetname']); ?>"
                                            data-category="<?php echo htmlspecialchars($row['category']); ?>"
                                            data-remarks="<?php echo htmlspecialchars($row['reason']); ?>">
                                            Edit
                                        </button> -->




                                    </td>
                                </tr>
                                <?php
                    }
                } else {
                    ?>
                                <tr>
                                    <td colspan="6" class="text-center">No asset requests found.</td>
                                </tr>
                                <?php
                }
                $stmt->close();
                $conn->close();
                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
function getStatusClass($status)
{
    switch ($status) {
        case 'Pending':
            return 'bg-warning';
        case 'In Use':
            return 'bg-success';
        case 'Under Maintenance':
            return 'bg-danger';
        default:
            return 'bg-secondary';
    }
}
?>


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


            <div class="modal fade" id="editAssetModal" tabindex="-1" aria-labelledby="editAssetModalLabel"
                aria-hidden="true">
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
                                    <input type="text" class="form-control" id="editAssetName">
                                </div>
                                <div class="mb-3">
                                    <label for="editAssetCategory" class="form-label">Category</label>
                                    <select class="form-select" id="editAssetCategory">
                                        <option value="Computers">Computers</option>
                                        <option value="Printers">Printers</option>
                                        <option value="Monitors">Monitors</option>
                                        <option value="Accessories">Accessories</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editAssetRemarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="editAssetRemarks" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-orange">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="modal fade" id="reportIssueModal" tabindex="-1" aria-labelledby="reportIssueModalLabel"
                aria-hidden="true">
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
                                    <input type="text" class="form-control" id="issueAssetName" value="Dell Laptop"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="issueDescription" class="form-label">Issue Description</label>
                                    <textarea class="form-control" id="issueDescription" rows="3"
                                        placeholder="Describe the issue"></textarea>
                                </div>
                                <button type="submit" class="btn btn-orange">Submit Issue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#requestAssetModal">
                        <i class="bi bi-plus-lg"></i> Submit New Request
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="requestAssetModal" tabindex="-1" aria-labelledby="requestAssetModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="requestAssetModalLabel">Submit New Asset Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <input type="hidden" id="sessionUsername"
                                    value="<?php echo htmlspecialchars($_SESSION['username']); ?>">

                                <label for="requestAssetName" class="form-label">Asset Name</label>
                                <input type="text" class="form-control" id="requestAssetName"
                                    placeholder="Enter asset name">
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
                                <textarea class="form-control" id="requestReason" rows="3"
                                    placeholder="Why do you need this asset?"></textarea>
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
        document.addEventListener('DOMContentLoaded', function() {
            const requestForm = document.querySelector('#requestAssetModal form');
            const sessionUsername = document.getElementById('sessionUsername').value;

            function loadTableData() {
                fetch('./queries/assetrequest/queries-get_asset_requests.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `requestedBy=${encodeURIComponent(sessionUsername)}`
                    })
                    .then(response => response.text())
                    .then(data => {
                        const tableBody = document.querySelector('#assetRequestsTable tbody');
                        tableBody.innerHTML = data;
                    })
                    .catch(error => console.error('Error fetching table data:', error));
            }

            requestForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const assetName = document.getElementById('requestAssetName').value.trim();
                const category = document.getElementById('requestCategory').value;
                const reason = document.getElementById('requestReason').value.trim();

                if (!assetName || !category || !reason) {
                    Swal.fire('Error!', 'All fields are required.', 'error');
                    return;
                }

                fetch('./queries/assetrequest/queries-add_asset_request.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `assetName=${encodeURIComponent(assetName)}&category=${encodeURIComponent(category)}&reason=${encodeURIComponent(reason)}&requestedBy=${encodeURIComponent(sessionUsername)}`,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success!', data.message, 'success');
                            requestForm.reset();
                            $('#requestAssetModal').modal('hide');
                            loadTableData();
                        } else {
                            Swal.fire('Error!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                    });
            });

            loadTableData();
        });
        </script>

        <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('assetRequestsTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let match = false;

                for (let j = 0; j < cells.length - 1; j++) {
                    if (cells[j].textContent.toLowerCase().includes(filter)) {
                        match = true;
                        break;
                    }
                }

                rows[i].style.display = match ? '' : 'none';
            }
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